<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logsheet extends Model
{
    use HasFactory;

    protected $table = 'logsheet';

    public function student(){
        return $this->belongsTo(Student::class, 'rfid_number', 'rfid_number');
    }

    public function machine(){
        return $this->belongsTo(Machine_table::class);
    }

    public function instructor(){
        return $this->belongsTo(Instructor::class, 'rfid_number', 'rfid_number');
    }
}
