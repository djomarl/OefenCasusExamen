<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
        return redirect('/login');
        }

         // Als de gebruiker Beheerder is, mag hij ALTIJD door
        if (Auth::user()->role === 'Beheerder') {
            return $next($request);
        }

         // Anders controleren we of de specifieke rol matcht
         if (Auth::user()->role === $role) {
            return $next($request);
        }   

        return redirect('/')->with('error', 'Geen toegang.');
}
}