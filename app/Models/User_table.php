<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_table extends Model
{
    public $table = 'user';
    public $primaryKey = 'id';
    public $timestamps = TRUE;

}
