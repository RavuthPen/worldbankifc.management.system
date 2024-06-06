<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class BankTransfer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'noted',
        'app_bankid',
        'app_swiftcode',
        'code',
        'phone_sent',
        'account_holder',
        'account_receiver',
        'member_name',
        'amounts',
        'swift_code',
        'address',
        'country',
        'charge',
        'currency',
        'caddress',
        'company',
        'app_name',
        'bank_phone',
        'bank_address',
        'transfer_date',
        'txtno',
        'reper',
        'mt_sent'
    ];

    protected $table = 'bank_transfer';    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    
}
