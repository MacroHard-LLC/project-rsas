<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule_table extends Model
{
    public $table = 'schedule';
    public $primary = 'subject_id';
    // timestamps is FALSE as to defer the Laravel's need for
    // UPDATED_AT where we already have updated_on in our database
    public $timestamps = FALSE;

    public function subject(){
        return $this->belongsTo(Subject_table::class);
    }
}
