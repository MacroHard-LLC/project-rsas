<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory,Notifiable;

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
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'is_enrolled',
        'is_deleted',
    ];

    public function scopeFilter($query, array $filters){
        if($filters['role'] ?? false){
            $query->where('role', 'like', '%' . request('role') . '%');
        }
    }

    public function section(){
        return $this->hasOne(Section::class, 'adviser_id', 'id');
    }

    public function student(){
        return $this->hasOne(Student::class, 'user_id', 'id');
    }
}
