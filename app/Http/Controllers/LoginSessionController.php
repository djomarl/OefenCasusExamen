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

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}