<?php

namespace App\Http\Controllers;

use App\Models\AdoptionEvent;
use App\Models\Pet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        return view('events.index', [
            'events' => AdoptionEvent::with('pets')->orderByDesc('event_date')->get(),
            'pets' => Pet::where('status', '!=', 'adopted')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        AdoptionEvent::create($request->validate([
            'event_name' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
        ]));

        return redirect()->route('events.index')->with('status', 'Event added.');
    }

    public function attachPet(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'adoption_event_id' => ['required', 'exists:adoption_events,id'],
            'pet_id' => ['required', 'exists:pets,id'],
        ]);

        // syncWithoutDetaching never inserts the same pet twice for one event.
        AdoptionEvent::findOrFail($data['adoption_event_id'])
            ->pets()
            ->syncWithoutDetaching([$data['pet_id']]);

        return redirect()->route('events.index')->with('status', 'Pet added to the event.');
    }
}
