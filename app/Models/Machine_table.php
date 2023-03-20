<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine_table extends Model
{
    public $table = 'machine';
    public $primaryKey = 'id';
    public $timestamps = TRUE;
}
