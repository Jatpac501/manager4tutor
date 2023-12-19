<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimetableRequest;
use App\Models\User;
use App\Models\Subject;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('timetable');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Timetable $timetable)
    {
        return view('timetable', [
            'timetable' => Timetable::where('tutorID', $timetable->id)->get(),
            'tutor' => User::find($timetable->id)->first(),
            'users' => User::get(),
            'subjects' => Subject::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TimetableRequest $request, Timetable $timetable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timetable $timetable)
    {
        //
    }
}
