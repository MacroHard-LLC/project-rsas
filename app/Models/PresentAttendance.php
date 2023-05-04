<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentAttendance extends Model
{
    use HasFactory;

    public $table = 'present';
    public $primaryKey = 'id';
    public $timestamps = FALSE;
}
