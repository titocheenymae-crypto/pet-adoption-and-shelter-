@extends('layouts.app')

@section('title', 'Shelters · Animal Shelter')
@section('heading', 'Shelters')
@section('lead', 'Locations that look after the pets.')

@section('content')
<div class="split">
    <section class="panel">
        <h2>Add a shelter</h2>
        <form method="POST" action="{{ route('shelters.store') }}" novalidate>
            @csrf
            <x-submit-token />
            <div class="field @error('shelter_name') invalid @enderror">
                <label for="shelter_name">Shelter name</label>
                <input id="shelter_name" name="shelter_name" value="{{ old('shelter_name') }}" required>
                @error('shelter_name')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field @error('address') invalid @enderror">
                <label for="address">Address</label>
                <input id="address" name="address" value="{{ old('address') }}" required>
                @error('address')<span class="error">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-block" data-busy="Saving…">Save shelter</button>
        </form>
    </section>

    <section class="panel">
        <h2>All shelters</h2>
        @if ($shelters->isEmpty())
            <p class="empty">No shelters yet. Add one using the form.</p>
        @else
            <div class="table-scroll"><table>
                <thead><tr><th>Name</th><th>Address</th><th>Pets</th></tr></thead>
                <tbody>
                @foreach ($shelters as $shelter)
                    <tr><td>{{ $shelter->shelter_name }}</td><td>{{ $shelter->address }}</td><td>{{ $shelter->pets_count }}</td></tr>
                @endforeach
                </tbody>
            </table></div>
        @endif
    </section>
</div>
@endsection
