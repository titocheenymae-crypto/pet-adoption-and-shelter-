@extends('layouts.app')

@section('title', 'Adoption events · Animal Shelter')
@section('heading', 'Adoption events')
@section('lead', 'Plan events and choose which pets attend.')

@section('content')
<div class="split">
    <div>
        <section class="panel">
            <h2>New event</h2>
            <form method="POST" action="{{ route('events.store') }}" novalidate>
                @csrf
                <x-submit-token />
                <div class="field @error('event_name') invalid @enderror">
                    <label for="event_name">Event name</label>
                    <input id="event_name" name="event_name" value="{{ old('event_name') }}" required>
                    @error('event_name')<span class="error">{{ $message }}</span>@enderror
                </div>
                <div class="field @error('event_date') invalid @enderror">
                    <label for="event_date">Date</label>
                    <input id="event_date" type="date" name="event_date" value="{{ old('event_date') }}" required>
                    @error('event_date')<span class="error">{{ $message }}</span>@enderror
                </div>
                <div class="field @error('location') invalid @enderror">
                    <label for="location">Location</label>
                    <input id="location" name="location" value="{{ old('location') }}" required>
                    @error('location')<span class="error">{{ $message }}</span>@enderror
                </div>
                <button type="submit" class="btn btn-block" data-busy="Saving…">Save event</button>
            </form>
        </section>

        <section class="panel">
            <h2>Add a pet to an event</h2>
            @if ($events->isEmpty() || $pets->isEmpty())
                <p class="empty">You need at least one event and one pet that is not yet adopted.</p>
            @else
            <form method="POST" action="{{ route('events.attach') }}" novalidate>
                @csrf
                <x-submit-token />
                <div class="field @error('adoption_event_id') invalid @enderror">
                    <label for="adoption_event_id">Event</label>
                    <select id="adoption_event_id" name="adoption_event_id" required>
                        @foreach ($events as $event)<option value="{{ $event->id }}">{{ $event->event_name }} ({{ $event->event_date->format('M j') }})</option>@endforeach
                    </select>
                    @error('adoption_event_id')<span class="error">{{ $message }}</span>@enderror
                </div>
                <div class="field @error('pet_id') invalid @enderror">
                    <label for="pet_id">Pet</label>
                    <select id="pet_id" name="pet_id" required>
                        @foreach ($pets as $pet)<option value="{{ $pet->id }}">{{ $pet->name }} ({{ $pet->species }})</option>@endforeach
                    </select>
                    @error('pet_id')<span class="error">{{ $message }}</span>@enderror
                </div>
                <button type="submit" class="btn btn-block btn-ghost" data-busy="Adding…">Add pet</button>
            </form>
            @endif
        </section>
    </div>

    <section class="panel">
        <h2>All events</h2>
        @if ($events->isEmpty())
            <p class="empty">No events yet. Create one using the form.</p>
        @else
            <div class="table-scroll"><table>
                <thead><tr><th>Event</th><th>Date</th><th>Location</th><th>Pets attending</th></tr></thead>
                <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->event_name }}</td>
                        <td>{{ $event->event_date->format('M j, Y') }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->pets->isEmpty() ? 'None yet' : $event->pets->pluck('name')->join(', ') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table></div>
        @endif
    </section>
</div>
@endsection
