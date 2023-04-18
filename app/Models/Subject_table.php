<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_table extends Model
{
    //Needs more than one primary key
    public $table = 'subject';
    public $primaryKey = 'id';


    // timestamps is FALSE as to defer the Laravel's need for
    // UPDATED_AT where we already have updated_on in our database
    public $timestamps = FALSE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'grade_level',
        'id',
        'name',
        'instructor_id',
        'room',
        'year_start',
        'year_end',
        'is_deleted',
    ];

    public function scopeFilter($query, array $filters){
        if($filters['grlvl'] ?? false)
            $query->where('grade_level', '=', request('grlvl'));
    }
}
