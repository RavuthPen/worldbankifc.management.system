<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'village';

    protected $fillable = [
        'village_kh',
        'village_en',
        'sangkat_id'
    ];

}
