<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructor';
    public $timestamps = FALSE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rfid_number',
        'first_name',
        'middle_name',
        'last_name',
        'added_by',
        'updated_by',
        'is_deleted',
    ];

    public function subject(){
        return $this->hasMany(Subject_table::class, 'instructor_rfid', 'rfid_number');
    }

    public function instructor_logsheet(){
        return $this->hasMany(Instructor_logsheet::class, 'rfid_number', 'rfid_number');
    }
}
