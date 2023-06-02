<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'section';
    public $timestamps = FALSE;

    public function subject(){
        return $this->hasMany(Subject_table::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'adviser_id');
    }
}
