<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolyear extends Model
{
    use HasFactory;

    public $table = 'schoolyear';
    public $primaryKey = 'id';
    public $timestamps = FALSE;
}
