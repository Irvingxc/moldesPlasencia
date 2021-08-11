<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizarNotificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('DROP procedure if exists `actualizar_notificaciones`');
    
        DB::unprepared('
        CREATE  PROCEDURE `actualizar_notificaciones`(
            IN `id_notificacion` INT
        )
        
        BEGIN
          
          UPDATE notificaciones SET notificaciones.activo = 1 WHERE notificaciones.id_notificacion = id_notificacion;
          
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
