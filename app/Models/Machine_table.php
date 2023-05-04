<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine_table extends Model
{
    public $table = 'machine';
    public $primaryKey = 'id';
    // timestamps is FALSE as to defer the Laravel's need for
    // UPDATED_AT where we already have updated_on in our database
    public $timestamps = FALSE;

    public function logsheet(){
        return $this->hasMany(Logsheet::class);
    }

    public function subject(){
        return $this->belongsTo(Subject_table::class, 'room', 'room');
    }
}
