<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_list extends Model
{
    use HasFactory;

    public $table = 'subject_list';

    public function section(){
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function subject(){
        return $this->belongsTo(Subject_table::class, 'subject_id', 'id');
    }
}
