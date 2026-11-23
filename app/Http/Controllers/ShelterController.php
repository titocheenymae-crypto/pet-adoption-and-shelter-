<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShelterController extends Controller
{
    public function index(): View
    {
        return view('shelters.index', [
            'shelters' => Shelter::withCount('pets')->latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Shelter::create($request->validate([
            'shelter_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]));

        // Redirect after POST: refreshing now only reloads the list, it never re-sends the form.
        return redirect()->route('shelters.index')->with('status', 'Shelter added.');
    }
}
