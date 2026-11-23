@extends('layouts.app')

@section('title', 'Owners · Animal Shelter')
@section('heading', 'Owners')
@section('lead', 'Each owner has one pet profile.')

@section('content')
<div class="split">
    <section class="panel">
        <h2>Add an owner</h2>
        <form method="POST" action="{{ route('owners.store') }}" novalidate>
            @csrf
            <x-submit-token />
            <div class="field @error('name') invalid @enderror">
                <label for="name">Owner name</label>
                <input id="name" name="name" value="{{ old('name') }}" required>
                @error('name')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field @error('email') invalid @enderror">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field @error('pet_name') invalid @enderror">
                <label for="pet_name">Pet name</label>
                <input id="pet_name" name="pet_name" value="{{ old('pet_name') }}" required>
                @error('pet_name')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field @error('species') invalid @enderror">
                <label for="species">Species</label>
                <select id="species" name="species" required>
                    @foreach ($species as $s)<option value="{{ $s }}" @selected(old('species') === $s)>{{ $s }}</option>@endforeach
                </select>
                @error('species')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="field @error('description') invalid @enderror">
                <label for="description">About the pet <span class="muted">(optional)</span></label>
                <textarea id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')<span class="error">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-block" data-busy="Saving…">Save owner</button>
        </form>
    </section>

    <section class="panel">
        <h2>All owners</h2>
        @if ($owners->isEmpty())
            <p class="empty">No owners yet.</p>
        @else
            <div class="table-scroll"><table>
                <thead><tr><th>Owner</th><th>Email</th><th>Pet</th></tr></thead>
                <tbody>
                @foreach ($owners as $owner)
                    <tr>
                        <td>{{ $owner->name }}</td>
                        <td>{{ $owner->email }}</td>
                        <td>{{ $owner->petProfile?->pet_name }} <span class="muted">({{ $owner->petProfile?->species }})</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table></div>
        @endif
    </section>
</div>
@endsection
