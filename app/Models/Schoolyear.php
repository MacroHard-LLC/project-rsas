<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolyear extends Model
{
    use HasFactory;

    protected $table = 'schoolyear';
    public $timestamps = FALSE;

    public function subject(){
        return $this->hasMany(Subject_table::class);
    }
}
