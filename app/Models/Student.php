<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';
    public $timestamps = FALSE;

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function absent(){
        return $this->hasMany(Absent::class, 'student_id', 'user_id');
    }

    public function present(){
        return $this->hasMany(Present::class, 'student_id', 'user_id');
    }

    public function late(){
        return $this->hasMany(Late::class, 'student_id', 'user_id');
    }

    public function logsheet(){
        return $this->hasMany(Logsheet::class, 'rfid_number', 'rfid_number');
    }
}