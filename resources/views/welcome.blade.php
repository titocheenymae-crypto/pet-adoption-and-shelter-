@extends('layouts.base')

@section('title', 'Animal Shelter')

@section('body')
<div class="photo">
    <header class="topbar">
        <a href="{{ route('home') }}" class="logo">Animal Shelter</a>
        <a href="{{ route('login') }}" class="btn btn-small">Donate Now</a>
    </header>

    <section class="hero">
        <h1>Making new best friends since 1994.</h1>
        <p>Bring home a new fully trained and vaccinated family member.</p>
        <a href="{{ route('login') }}" class="btn">Sign in</a>
        <div class="alt">New here? <a href="{{ route('register') }}">Create an account</a></div>
    </section>
</div>
@endsection
