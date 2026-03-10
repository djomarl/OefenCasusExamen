<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginSessionController;

// ---------------------------- LOGIN & REGISTREREN ROUTES ---------------------------
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [LoginSessionController::class, 'show'])->name('login');
Route::post('/login', [LoginSessionController::class, 'store']);
Route::post('/logout', [LoginSessionController::class, 'destroy'])->name('logout');

// --------------------------- DEFAULT ROUTES ---------------------------
Route::get('/', function () {
    return view('welcome');
});

//--------------------------- ROLE GEBASEERDE ROUTES ---------------------------
// Beheerder sectie
Route::middleware(['auth', 'role:Beheerder'])->prefix('beheerder')->group(function () {
    Route::get('/dashboard', function () { 
        return view('beheerder.dashboard'); 
    });
});

// Gebruiker sectie 
Route::middleware(['auth', 'role:Gebruiker'])->prefix('gebruiker')->group(function () {
    Route::get('/dashboard', function () { 
        return view('gebruiker.dashboard'); 
    });
});