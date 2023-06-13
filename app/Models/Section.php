<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'section';
    public $timestamps = FALSE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'grade_level',
        'adviser_id',
        'schoolyear_id',
        'is_deleted',
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['sy'] ?? false)
            $query->where('schoolyear_id', request('sy'));
    }

    public function subject(){
        return $this->hasMany(Subject_table::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'adviser_id');
    }

    public function schoolyear(){
        return $this->belongsTo(Schoolyear::class);
    }
}
