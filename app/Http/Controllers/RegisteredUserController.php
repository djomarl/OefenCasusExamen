<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the intended page
        switch (Auth::user()->role) {
            case 'Beheerder':
                return redirect('/beheerder/dashboard');
            case 'Lid':
                return redirect('/lid/dashboard');
            case 'Balie':
                return redirect('/balie/dashboard');
            case 'Trainer':
                return redirect('/trainer/dashboard');
            default:
                return redirect('/');
        }
    }
}