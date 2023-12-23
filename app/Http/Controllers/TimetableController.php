<?php

namespace App\Http\Controllers;

use App\Events\EventProcessed;
use App\Http\Requests\TimetableRequest;
use App\Models\User;
use App\Models\Subject;
use App\Models\Timetable;
use Illuminate\Support\Facades\Auth;

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
    public function store(TimetableRequest $request)
    {
        $validatedData = $request->validated();
        $timetable = Timetable::create($validatedData);
        $test = event(new EventProcessed($timetable));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $auth = Auth::user();
        $timetable = Timetable::where('tutorID', $id)->get();
        $tutor = User::where('id', $id)->first();
        $users = User::get();
        $subjects = Subject::get();
        return $auth->role != null
            ? view('timetable', compact('auth','timetable', 'tutor', 'users','subjects'))
            : abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Timetable $event,int $id)
    {
        Timetable::where('id', $id)->update(['isAccept'=>1]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->role == 'admin' ||
            Auth::user()->id == Timetable::findOrFail($id)->userID ||
            Auth::user()->id == Timetable::findOrFail($id)->tutorID) {
            Timetable::findOrFail($id)->delete();
            return redirect()->back();
        } else {
            return abort(403);
        }
    }
}
