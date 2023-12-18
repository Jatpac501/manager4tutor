<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $table = 'subject';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date',
        'tutorID',
        'subjectID',
        'userID',
        'isAccept'
    ];
    public function user() {
        return $this->belongsTo(Users::class, 'userID');
    }
    public function subject() {
        return $this->belongsTo(Subject::class, 'subjectID');
    }

}
