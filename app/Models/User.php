<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public $table = 'user';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'password',
        'role',
        'first',
        'middle',
        'last',
        'gender',
        'is_deleted',
    ];

    public function scopeFilter($query, array $filters){
        if($filters['role'] ?? false){
            if (request('role') == 'admin')
                $user_role = 0;
            else if (request('role') == 'student')
                $user_role = 1;
            else
                $user_role = 2;
            $query->where('role', '=', $user_role);
        }
    }
}
