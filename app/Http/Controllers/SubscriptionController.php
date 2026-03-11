<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'subscription_type' => 'required|string|in:Maand,Jaar',
        'start_date' => 'required|date',
    ]);

    $start = Carbon::parse($request->start_date);
    
    if ($request->subscription_type === 'Jaar') {
        $end = $start->copy()->addYear();
    } else {
        $end = $start->copy()->addMonth();
    }

    Subscription::create([
        'user_id' => $validated['user_id'],
        'subscription_type' => $validated['subscription_type'],
        'start_date' => $start,
        'end_date' => $end,
    ]);

    return redirect()->back()->with('success', 'Abonnement is succesvol aangemaakt!');
}

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}