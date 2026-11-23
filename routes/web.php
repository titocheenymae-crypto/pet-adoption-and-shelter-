<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ShelterController;
use Illuminate\Support\Facades\Route;

/*
| Guests only: a signed-in user is redirected to the dashboard
| (see redirectUsersTo in bootstrap/app.php).
*/
Route::middleware('guest')->group(function () {
    Route::view('/', 'welcome')->name('home');

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('single.submit');
});

/*
| Signed-in users only: guests are redirected to /login.
| Every POST that creates data goes through the "single.submit" middleware.
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/shelters', [ShelterController::class, 'index'])->name('shelters.index');
    Route::post('/shelters', [ShelterController::class, 'store'])->name('shelters.store')->middleware('single.submit');

    Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
    Route::post('/pets', [PetController::class, 'store'])->name('pets.store')->middleware('single.submit');

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::post('/events', [EventController::class, 'store'])->name('events.store')->middleware('single.submit');
    Route::post('/events/pets', [EventController::class, 'attachPet'])->name('events.attach')->middleware('single.submit');

    Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');
    Route::post('/owners', [OwnerController::class, 'store'])->name('owners.store')->middleware('single.submit');
});