<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $table = 'timetable';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tutorID',
        'subjectID',
        'week',
        'day',
        'userID',
        'isAccept'
    ];
    public function user() {
        return $this->belongsTo(User::class, 'userID');
    }
    public function subject() {
        return $this->belongsTo(Subject::class, 'subjectID');
    }

}
