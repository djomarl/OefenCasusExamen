<?php

namespace App\Http\Controllers;

use App\Models\users_notes;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersNotesController extends Controller
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
            if (Auth::user()->role !== 'Trainer') {
            return abort(403, 'Alleen trainers mogen voortgangsnotities maken.');
        }

         users_notes::create([
        'user_id' => $request->user_id, 
        'trainer_id' => Auth::user()->id,
        'note' => $request->note,
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(users_notes $users_notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(users_notes $users_notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, users_notes $users_notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(users_notes $users_notes)
    {
        //
    }
}