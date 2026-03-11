<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::where('trainer_id', Auth::id())->get();
        return view('lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Alleen trainers of beheerders mogen lessen aanmaken
        if (!(Auth::user()->role === 'Trainer' || Auth::user()->role === 'Beheerder')) {
            return abort(403, 'Alleen trainers of beheerders mogen lessen aanmaken.');
        }

        Lesson::create([
            'trainer_id' => Auth::user()->id,
            'lesson_type' => $request->lesson_type,
        ]);

        return redirect()->route('lessons.index')->with('success', 'Les succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
            // Alleen trainers of beheerders mogen lessen verwijderen
            if (!(Auth::user()->role === 'Trainer' || Auth::user()->role === 'Beheerder')) {
                return abort(403, 'Alleen trainers of beheerders mogen lessen verwijderen.');
            }
    
            Lesson::destroy($lesson->id);
            return redirect()->route('lessons.index')->with('success', 'Les succesvol verwijderd.');
    }
}