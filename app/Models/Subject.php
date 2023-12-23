<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subject';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'password',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'subjectID');
    }
    public function timetable() {
        return $this->belongsTo(Timetable::class, 'subjectID');
    }
}
