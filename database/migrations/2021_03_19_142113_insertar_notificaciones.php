<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarNotificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('DROP procedure if exists `insertar_notificaciones`');
    
        DB::unprepared('
        CREATE  PROCEDURE `insertar_notificaciones`(
            IN `pa_tipo` VARCHAR(50),
            IN `pa_descripcion` TEXT,
            IN `pa_activo` INT,
            IN `pa_id_planta` INT,
            IN `pa_planta` VARCHAR(50)
        )
        
        BEGIN
         INSERT INTO notificaciones(notificaciones.tipo, notificaciones.descripcion, notificaciones.activo,notificaciones.para, notificaciones.id_planta)
          VALUES(pa_tipo,pa_descripcion,pa_activo,pa_planta, pa_id_planta);
        END

        '
        );

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
