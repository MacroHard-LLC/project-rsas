<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_table extends Model
{
    //Needs more than one primary key
    public $table = 'subject';
    public $primaryKey = 'id';

    // this is the thing for the unit testing
    protected $fillable = ['id', 'name', 'grade_level', 'section_id','instructor_rfid','room',
                            'schoolyear_id','semester','machine_id','is_deleted'];

    // timestamps is FALSE as to defer the Laravel's need for
    // UPDATED_AT where we already have updated_on in our database
    public $timestamps = FALSE;


    public function scopeFilter($query, array $filters){
        if($filters['grlvl'] ?? false)
            $query->where('grade_level', '=', request('grlvl'));
    }

    public function schoolyear(){
        return $this->belongsTo(Schoolyear::class, 'schoolyear_id', 'id');
    }

    public function instructor(){
        return $this->belongsTo(Instructor::class, 'instructor_rfid', 'rfid_number');
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function machine(){
        return $this->belongsTo(Machine_table::class);
    }

    public function subject_list(){
        return $this->hasOne(Subject_list::class);
    }

    public function absent(){
        return $this->hasMany(Absent::class);
    }

    public function present(){
        return $this->hasMany(Present::class);
    }

    public function late(){
        return $this->hasMany(Late::class);
    }

    public function instructor_logsheet(): HasManyThrough
    {
        return $this->hasManyThrough(Instructor_logsheet::class, Machine::class);
    }

    public function student_logsheet(): HasManyThrough
    {
        return $this->hasManyThrough(Student_logsheet::class, Machine::class);
    }

    public function schedule(){
        return $this->hasMany(Schedule_table::class, 'subject_id');
    }
}
