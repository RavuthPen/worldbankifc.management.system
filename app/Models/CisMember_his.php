<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CisMember_his extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'account_number',
        'user_id',
        'passport_number',
        'dateof_issue',
        'dateof_expi',
        'passport_image',
        'bank_id',
        'version'
    ];

    protected $table = 'cis_member_his';

}