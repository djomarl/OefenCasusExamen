<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginSessionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\UsersNotesController;
use App\Http\Controllers\LessonController;

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

// Lid sectie
Route::middleware(['auth', 'role:Lid'])->prefix('lid')->group(function () {
    Route::get('/dashboard', function () { 
        return view('lid.dashboard'); 
    });
        Route::get('/mijngegevens', function () { 
            return view('lid.mijngegevens'); 
        });
});

// Balie sectie
Route::middleware(['auth', 'role:Balie'])->prefix('balie')->group(function () {
    Route::get('/dashboard', function () { 
        return view('balie.dashboard'); 
    });
});

// Trainer sectie
Route::middleware(['auth', 'role:Trainer'])->prefix('trainer')->group(function () {
    Route::get('/dashboard', function () { 
        return view('trainer.dashboard'); 
    });
    Route::get('/mijngegevens', function () { 
        return view('trainer.mijngegevens'); 
    });
});

//--------------------------- Action Routes Enzo ---------------------------
// Subscription routes
Route::middleware(['auth'])->group(function () {
    Route::resource('subscriptions', SubscriptionController::class)->only(['store']);
});

// Check-in routes
Route::middleware(['auth'])->group(function () {
    Route::resource('check-ins', CheckInController::class)->only(['store']);
});

// Lessons
Route::middleware(['auth'])->group(function () {
    Route::resource('lessons', LessonController::class);
});