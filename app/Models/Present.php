<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    use HasFactory;

    protected $table = 'present';

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'user_id');
    }

    public function subject(){
        return $this->belongsTo(Subject_list::class);
    }
}
