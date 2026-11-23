<?php

namespace App\Http\Controllers;

use App\Models\AdoptionEvent;
use App\Models\Pet;
use App\Models\Shelter;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'stats' => [
                'Shelters' => Shelter::count(),
                'Pets' => Pet::count(),
                'Available pets' => Pet::where('status', 'available')->count(),
                'Upcoming events' => AdoptionEvent::whereDate('event_date', '>=', today())->count(),
            ],
            'recentPets' => Pet::with('shelter')->latest()->take(6)->get(),
            'events' => AdoptionEvent::withCount('pets')
                ->whereDate('event_date', '>=', today())
                ->orderBy('event_date')
                ->take(5)
                ->get(),
        ]);
    }
}
