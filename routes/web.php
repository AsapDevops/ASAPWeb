<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ClientController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/services', function () {
    return view('services');
})->middleware(['auth'])->name('services');

Route::get('/chat', function () {
    return view('chat');
})->middleware(['auth'])->name('chat');

Route::get('/events', function () {
    return view('events');
})->middleware(['auth'])->name('events');

Route::get('/create', function () {
    return view('create-event');
})->middleware(['auth'])->name('create-event');

Route::get('/new-ad', function () {
    return view('new-ad');
})->middleware(['auth'])->name('new-ad');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/payments', function () {
    return view('payments');
})->name('payments');

Route::get('/{provider}/redirect', [SocialiteController::class, 'redirectToProvider']);
Route::get('{provider}/callback', [SocialiteController::class, 'handleProviderCallback'])
    ->where('provider', 'google');

Route::get('facebook/redirect', [SocialiteController::class, 'redirectToProvider']);
Route::get('facebook/callback', [SocialiteController::class, 'handleProviderCallback'])
    ->where('provider', 'facebook');

Route::middleware('auth')->group(function () {
    Route::get('/chat', [ProfileController::class, 'chat'])->name('chat');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/wallet', [ProfileController::class, 'wallet'])->name('profile.wallet');
    Route::get('/profile/advertisements', [ProfileController::class, 'advertisements'])->name('profile.advertisements');
    Route::post('/profile/advertisements', [ProfileController::class, 'store'])->name('profile.advertisements.index');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile/organizer', function () {
        return view('profile.partials.update-profile-information-form');
    })->name('profile.organizer');

    Route::get('/profile/client', function () {
        return view('profile.partials.update-profile-info-client');
    })->name('profile.client');
});

require __DIR__ . '/auth.php';
