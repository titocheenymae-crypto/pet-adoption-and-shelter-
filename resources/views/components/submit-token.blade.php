@php
    // One-time token: consumed by the "once" middleware on the first submit.
    $token = (string) \Illuminate\Support\Str::uuid();
    $tokens = array_slice((array) session('submit_tokens', []), -20, null, true); // keep the session small
    $tokens[$token] = true;
    session()->put('submit_tokens', $tokens);
@endphp
<input type="hidden" name="_submit_token" value="{{ $token }}">
