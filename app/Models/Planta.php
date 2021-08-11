<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
   protected $table ='plantas';
   protected $fillable = [ 

    'id_planta',
    'nombre_planta'
   ];

  
}
