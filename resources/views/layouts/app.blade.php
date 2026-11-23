@extends('layouts.base')

@section('body')
<div class="shell">
    <aside class="side">
        <a href="{{ route('dashboard') }}" class="logo">Animal Shelter</a>
        <nav>
            <a href="{{ route('dashboard') }}" @class(['active' => request()->routeIs('dashboard')])>Overview</a>
            <a href="{{ route('pets.index') }}" @class(['active' => request()->routeIs('pets.*')])>Pets</a>
            <a href="{{ route('shelters.index') }}" @class(['active' => request()->routeIs('shelters.*')])>Shelters</a>
            <a href="{{ route('events.index') }}" @class(['active' => request()->routeIs('events.*')])>Adoption events</a>
            <a href="{{ route('owners.index') }}" @class(['active' => request()->routeIs('owners.*')])>Owners</a>
        </nav>
        <div class="me">
            {{ auth()->user()->name }}
            <span>{{ auth()->user()->email }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Log out</button>
            </form>
        </div>
    </aside>

    <main class="main">
        <div class="page-head">
            <h1>@yield('heading')</h1>
            @hasSection('lead')<p>@yield('lead')</p>@endif
        </div>

        @if (session('status'))<div class="notice ok" role="status">{{ session('status') }}</div>@endif
        @if (session('notice'))<div class="notice warn" role="status">{{ session('notice') }}</div>@endif

        @yield('content')
    </main>
</div>
@endsection
