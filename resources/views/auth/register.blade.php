@extends('layouts.guest')

@section('title', 'Create account · Animal Shelter')

@section('card')
    <h1>Create your account</h1>
    <p class="sub">It takes less than a minute.</p>

    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf
        <x-submit-token />

        <div class="field @error('name') invalid @enderror">
            <label for="name">Full name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>
            @error('name')<span class="error" role="alert">{{ $message }}</span>@enderror
        </div>

        <div class="field @error('email') invalid @enderror">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username" required>
            @error('email')<span class="error" role="alert">{{ $message }}</span>@enderror
        </div>

        <div class="field @error('password') invalid @enderror">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="new-password" required>
            @error('password')<span class="error" role="alert">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
        </div>

        <button type="submit" class="btn btn-block" data-busy="Creating account…">Create account</button>
    </form>

    <p class="foot">Already registered? <a href="{{ route('login') }}">Sign in</a></p>
@endsection
