<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sangkat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'sangkat';

    protected $fillable = [
        'sangkat_kh',
        'sangkat_en',
        'khan_id'
    ];

}
