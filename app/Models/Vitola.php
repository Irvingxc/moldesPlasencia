<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitola extends Model
{
    protected $table = 'vitolas';
    protected $fillable =[

        'id_vitola',
        'vitola',
        'id_planta'

    ];
}
