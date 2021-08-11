<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moldes extends Model
{
    use HasFactory;

    public function scopeVitolabuscars($query, $vitolabuscars) {
    	if ($vitolabuscars) {
    		return $query->where('vitola','like',"%$vitolabuscars%");
    	}
    }



    public function scopeFigurabuscars($query, $figurabuscars) {
    	if ($figurabuscars) {
    		return $query->where('nombre_figura','like',"%$figurabuscars%");
    	}
    }
}
