<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    private const EMAIL_MAX_ATTEMPTS = 5;   // wrong passwords per email + IP
    private const IP_MAX_ATTEMPTS = 20;     // wrong passwords per IP (stops rotating emails)
    private const LOCKOUT_SECONDS = 900;    // 15 minutes

    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $emailKey = 'login:email:'.Str::transliterate(Str::lower($credentials['email'])).'|'.$request->ip();
        $ipKey = 'login:ip:'.$request->ip();

        $this->ensureNotLocked($emailKey, self::EMAIL_MAX_ATTEMPTS);
        $this->ensureNotLocked($ipKey, self::IP_MAX_ATTEMPTS);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::hit($emailKey, self::LOCKOUT_SECONDS);
            RateLimiter::hit($ipKey, self::LOCKOUT_SECONDS);

            throw ValidationException::withMessages([
                'email' => 'The email or password is incorrect.',
            ]);
        }

        RateLimiter::clear($emailKey);
        $request->session()->regenerate(); // prevents session fixation

        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    private function ensureNotLocked(string $key, int $max): void
    {
        if (! RateLimiter::tooManyAttempts($key, $max)) {
            return;
        }

        $minutes = (int) ceil(RateLimiter::availableIn($key) / 60);

        throw ValidationException::withMessages([
            'email' => "Too many sign-in attempts. Try again in {$minutes} ".Str::plural('minute', $minutes).'.',
        ])->status(429);
    }
}
