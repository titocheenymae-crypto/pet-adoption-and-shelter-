@extends('layouts.app')

@section('title', 'Pets · Animal Shelter')
@section('heading', 'Pets')
@section('lead', 'Every animal currently in your care.')

@section('content')
<div class="split">
    <section class="panel">
        <h2>Add a pet</h2>
        @if ($shelters->isEmpty())
            <p class="empty">Pets live in a shelter. <a href="{{ route('shelters.index') }}">Add a shelter</a> first.</p>
        @else
        <form method="POST" action="{{ route('pets.store') }}" novalidate>
            @csrf
            <x-submit-token />
            <div class="field @error('name') invalid @enderror">
                <label for="name">Name</label>
                <input id="name" name="name" value="{{ old('name') }}" required>
                @error('name')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field @error('species') invalid @enderror">
                <label for="species">Species</label>
                <select id="species" name="species" required>
                    @foreach ($species as $s)<option value="{{ $s }}" @selected(old('species') === $s)>{{ $s }}</option>@endforeach
                </select>
                @error('species')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field @error('shelter_id') invalid @enderror">
                <label for="shelter_id">Shelter</label>
                <select id="shelter_id" name="shelter_id" required>
                    @foreach ($shelters as $shelter)<option value="{{ $shelter->id }}" @selected(old('shelter_id') == $shelter->id)>{{ $shelter->shelter_name }}</option>@endforeach
                </select>
                @error('shelter_id')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field @error('status') invalid @enderror">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    @foreach ($statuses as $s)<option value="{{ $s }}" @selected(old('status', 'available') === $s)>{{ ucfirst($s) }}</option>@endforeach
                </select>
                @error('status')<span class="error">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-block" data-busy="Saving…">Save pet</button>
        </form>
        @endif
    </section>

    <section class="panel">
        <h2>All pets</h2>
        @if ($pets->isEmpty())
            <p class="empty">No pets yet.</p>
        @else
            <div class="table-scroll"><table>
                <thead><tr><th>Name</th><th>Species</th><th>Shelter</th><th>Status</th></tr></thead>
                <tbody>
                @foreach ($pets as $pet)
                    <tr>
                        <td>{{ $pet->name }}</td><td>{{ $pet->species }}</td><td>{{ $pet->shelter->shelter_name }}</td>
                        <td><span class="status {{ $pet->status }}">{{ ucfirst($pet->status) }}</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table></div>
        @endif
    </section>
</div>
@endsection
