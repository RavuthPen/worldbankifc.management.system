<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'khan';

    protected $fillable = [
        'khan_kh',
        'khan_en',
        'city_id'
    ];

}
