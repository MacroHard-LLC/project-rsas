<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_table extends Model
{
    //Needs more than one primary key
    public $table = 'subject';
    public $primaryKey = 'id';

    // this is the thing for the unit testing
    protected $fillable = ['id', 'name', 'grade_level','instructor_id','room','year_start',
                            'year_end','added_on','added_by','is_deleted'];

    // timestamps is FALSE as to defer the Laravel's need for
    // UPDATED_AT where we already have updated_on in our database
    public $timestamps = FALSE;
}
