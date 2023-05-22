<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructor';

    public $timestamps = FALSE;
    public function subject(){
        return $this->hasMany(Subject_table::class, 'instructor_rfid', 'rfid_number');
    }
}
