<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AppUser_his extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
   
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'gender',
        'nationality',
        'id_card',
        'phone_number',
        'dob',
        'username',
        'created_at',
        'email',
        'ho_st_id',
        'village_id',
        'songkat_id',
        'khan_id',
        'city_id',
        'status',
        'reason',
        'auth_id',
        'act_date'
    ];

    protected $table = 'users_his';
}
