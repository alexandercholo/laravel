<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes with email verification enabled
Auth::routes([
    'verify' => true
]);

// Home route that requires authentication and email verification
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Profile routes that require authentication and email verification
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profiles.update');
});


