<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

/**
 * One-time form tokens.
 *
 * Every form renders <x-submit-token />, which stores a fresh token in the
 * session. The first request that presents the token consumes it. Any second
 * request with the same token (double click, slow network retry, re-sent
 * form) is rejected before it can create another record.
 */
class PreventDoubleSubmit
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = (string) $request->input('_submit_token');

        if ($token === '') {
            return $this->reject();
        }

        // Atomic lock: two requests arriving at the same moment cannot both pass.
        // It is left to expire on its own so the session is saved before it frees up.
        if (! Cache::lock('form-submit:'.$token, 15)->get()) {
            return $this->reject();
        }

        if (! $request->session()->pull('submit_tokens.'.$token)) {
            return $this->reject();
        }

        return $next($request);
    }

    private function reject(): Response
    {
        return back()->with('notice', 'That form was already sent or has expired. Check the list before trying again.');
    }
}
