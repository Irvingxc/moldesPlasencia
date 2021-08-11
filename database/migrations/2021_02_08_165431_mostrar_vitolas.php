<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MostrarVitolas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `mostrar_vitolas`');
       DB::unprepared('  
       CREATE PROCEDURE `mostrar_vitolas`(IN `pa_id_planta` INT )
        
        BEGIN
             SELECT vitolas.id_vitola, vitolas.vitola as nombre_vitola FROM vitolas WHERE vitolas.id_planta = pa_id_planta;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {  DB::unprepared('DROP procedure if exists `mostrar_vitolas`');
      
    }
}
