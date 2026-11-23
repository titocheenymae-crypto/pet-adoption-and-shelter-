@extends('layouts.base')

@section('body')
<div class="photo">
    <header class="topbar">
        <a href="{{ route('home') }}" class="logo">Animal Shelter</a>
        <a href="{{ route('login') }}" class="btn btn-small">Donate Now</a>
    </header>
    <main class="auth-wrap">
        <div class="auth-card">
            @yield('card')
        </div>
    </main>
</div>
@endsection
