<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';
    protected $primaryKey = 'rfid_number';
    public $timestamps = FALSE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rfid_number',
        'user_id',
        'section_id',
        'status',
        'added_by',
        'updated_by',
        'is_deleted',
    ];

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

    public function student_logsheet(){
        return $this->hasMany(Student_logsheet::class, 'rfid_number', 'rfid_number');
    }
}
