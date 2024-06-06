<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class BankSwift extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'banks_phones',
        'banks_swift',
        'banks_address',
        'banks_email',
        'banks_name'
    ];

    protected $table = 'banks_swift_name';    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    
}
