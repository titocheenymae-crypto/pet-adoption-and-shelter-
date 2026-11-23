<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Shelter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PetController extends Controller
{
    public const SPECIES = ['Dog', 'Cat', 'Rabbit', 'Bird', 'Other'];
    public const STATUSES = ['available', 'pending', 'adopted'];

    public function index(): View
    {
        return view('pets.index', [
            'pets' => Pet::with('shelter')->latest()->take(50)->get(),
            'shelters' => Shelter::orderBy('shelter_name')->get(),
            'species' => self::SPECIES,
            'statuses' => self::STATUSES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Pet::create($request->validate([
            'shelter_id' => ['required', 'exists:shelters,id'],
            'name' => ['required', 'string', 'max:255'],
            'species' => ['required', Rule::in(self::SPECIES)],
            'status' => ['required', Rule::in(self::STATUSES)],
        ]));

        return redirect()->route('pets.index')->with('status', 'Pet added.');
    }
}
