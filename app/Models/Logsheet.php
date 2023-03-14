<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logsheet extends Model
{
    protected $table = 'logsheet';
    protected $primaryKey = 'log_number';
    protected $allowedFields = ['time', 'user_id', 'machine_id', 'room'];

    // use HasApiTokens, HasFactory, Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
