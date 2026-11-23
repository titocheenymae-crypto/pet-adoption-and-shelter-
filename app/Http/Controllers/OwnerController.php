<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class OwnerController extends Controller
{
    public function index(): View
    {
        return view('owners.index', [
            'owners' => Owner::with('petProfile')->latest()->get(),
            'species' => PetController::SPECIES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:owners,email'],
            'pet_name' => ['required', 'string', 'max:255'],
            'species' => ['required', Rule::in(PetController::SPECIES)],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        // Owner and PetProfile are saved together or not at all.
        DB::transaction(function () use ($data) {
            $owner = Owner::create(['name' => $data['name'], 'email' => $data['email']]);
            $owner->petProfile()->create([
                'pet_name' => $data['pet_name'],
                'species' => $data['species'],
                'description' => $data['description'] ?? null,
            ]);
        });

        return redirect()->route('owners.index')->with('status', 'Owner added.');
    }
}
