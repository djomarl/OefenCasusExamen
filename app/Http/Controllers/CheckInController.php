<?php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use App\Models\User;
use Illuminate\Http\Request;

class CheckInController extends Controller
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
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'check_in_time' => 'required|date',
            'checked_in' => 'required|boolean',
        ]);

        $lastCheckIn = CheckIn::where('user_id', $request->user_id)
            ->orderBy('check_in_time', 'desc')
            ->first();

        if ($lastCheckIn && $lastCheckIn->check_in_time > now()->subHours(24)) {
            return redirect()->back()->withErrors(['check_in' => 'Je kunt slechts één keer per 24 uur inchecken.']);
        }

        User::find($request->user_id)->increment('points', 10);
        CheckIn::create($request->all());
        return redirect()->back()->with('success', 'Check-in succesvol geregistreerd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CheckIn $checkIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CheckIn $checkIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CheckIn $checkIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CheckIn $checkIn)
    {
        //
    }
}