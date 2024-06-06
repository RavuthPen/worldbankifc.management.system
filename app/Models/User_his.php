<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User_his extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'name',
        'status',
        'reason',
        'auth_id',
        'auth_name',
        'date_at'
    ];

    protected $table = 'adm_users_his';

}