<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminarControlTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `eliminar_control_temp`');
    
        DB::unprepared('
        
        CREATE  PROCEDURE `eliminar_control_temp`(
            IN `Pa_id_control_temp` INT
        )
       
        BEGIN
        
            DELETE FROM control_temperatura WHERE id_temperatura = pa_id_control_temp;
            SELECT "Eliminado correctamente",1;
        
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
