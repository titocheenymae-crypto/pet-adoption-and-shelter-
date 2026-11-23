@extends('layouts.guest')

@section('title', 'Sign in · Animal Shelter')

@section('card')
    <h1>Welcome back</h1>
    <p class="sub">Sign in to manage pets, shelters and adoption events.</p>

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <div class="field @error('email') invalid @enderror">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username" autofocus required>
            @error('email')<span class="error" role="alert">{{ $message }}</span>@enderror
        </div>

        <div class="field @error('password') invalid @enderror">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="current-password" required>
            @error('password')<span class="error" role="alert">{{ $message }}</span>@enderror
        </div>

        <label class="check"><input type="checkbox" name="remember" value="1"> Keep me signed in</label>

        <button type="submit" class="btn btn-block" data-busy="Signing in…">Sign in</button>
    </form>

    <p class="foot">No account yet? <a href="{{ route('register') }}">Create one</a></p>
@endsection
