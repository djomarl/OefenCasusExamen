<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginSessionController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (! Auth::attempt($attributes)) {
            return back()
                ->withErrors(['username' => 'Je gegevens kloppen niet.'])
                ->withInput(); // Onthoudt de ingevulde username
        }

        session()->regenerate();

        // Redirect op basis van de rol van de gebruiker
        if (Auth::user()->role === 'Beheerder') {
            return redirect('/beheerder/dashboard');
        }

        if (Auth::user()->role === 'Gebruiker') {
            return redirect('/gebruiker/dashboard');
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}