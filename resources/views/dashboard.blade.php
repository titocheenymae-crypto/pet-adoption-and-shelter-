@extends('layouts.app')

@section('title', 'Overview · Animal Shelter')
@section('heading', 'Hello, '.Str::before(auth()->user()->name, ' '))
@section('lead', 'Here is what is happening across your shelters.')

@section('content')
    <div class="stats">
        @foreach ($stats as $label => $value)
            <div><strong>{{ $value }}</strong><span>{{ $label }}</span></div>
        @endforeach
    </div>

    <div class="cols">
        <section class="panel">
            <h2>Recently added pets</h2>
            @forelse ($recentPets as $pet)
                @if ($loop->first)
                <div class="table-scroll"><table>
                    <thead><tr><th>Name</th><th>Species</th><th>Shelter</th><th>Status</th></tr></thead><tbody>
                @endif
                <tr>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->species }}</td>
                    <td>{{ $pet->shelter->shelter_name }}</td>
                    <td><span class="status {{ $pet->status }}">{{ ucfirst($pet->status) }}</span></td>
                </tr>
                @if ($loop->last)</tbody></table></div>@endif
            @empty
                <p class="empty">No pets yet. <a href="{{ route('pets.index') }}">Add the first one</a>.</p>
            @endforelse
        </section>

        <section class="panel">
            <h2>Upcoming events</h2>
            @forelse ($events as $event)
                <p style="margin:0 0 14px">
                    <strong>{{ $event->event_name }}</strong><br>
                    <span class="muted">{{ $event->event_date->format('M j, Y') }} · {{ $event->location }} · {{ $event->pets_count }} {{ Str::plural('pet', $event->pets_count) }}</span>
                </p>
            @empty
                <p class="empty">Nothing scheduled. <a href="{{ route('events.index') }}">Plan an event</a>.</p>
            @endforelse
        </section>
    </div>
@endsection
