<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_logsheet extends Model
{
    use HasFactory;

    protected $table = 'student_logsheet';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'time',
        'role',
        'rfid_number',
        'machine_id',
        'is_deleted',
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'rfid_number', 'rfid_number');
    }

    public function machine(){
        return $this->belongsTo(Machine_table::class);
    }
}
