<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolyear extends Model
{
    use HasFactory;

    protected $table = 'schoolyear';
    public $timestamps = FALSE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'start_year',
        'end_year'
    ];

    public function subject(){
        return $this->hasMany(Subject_table::class);
    }
}
