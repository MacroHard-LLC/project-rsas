<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_table extends Model
{
    //Needs more than one primary key
    public $table = 'subject';
    public $primaryKey = 'grade_level';

    // timestamps is FALSE as to defer the Laravel's need for
    // UPDATED_AT where we already have updated_on in our database
    public $timestamps = FALSE;

    public function scopeFilter($query, array $filters){
        if($filters['grlvl'] ?? false){
            // if (request('grlvl') == 'admin')
            //     $user_role = 0;
            // else if (request('grlvl') == 'student')
            //     $user_role = 1;
            // else
            //     $user_role = 2;
            $query->where('grade_level', '=', request('grlvl'));
        }
    }
}
