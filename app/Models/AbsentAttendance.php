<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsentAttendance extends Model
{
    use HasFactory;

    public $table = 'absent';
    public $primaryKey = 'id';
    public $timestamps = FALSE;
}
