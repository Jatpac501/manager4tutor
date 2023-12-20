<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimetableRequest;
use App\Models\User;
use App\Models\Subject;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        Timetable::create($request->validated());
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
        return $auth->role == 'user'
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
        Timetable::findOrFail($id)->delete();
        return redirect()->back();
    }
}
