<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarControlTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_control_temp`');
    
        DB::unprepared('
        CREATE  PROCEDURE `insertar_control_temp`(
            IN `pa_id_pilones` INT,
            IN `pa_temperatura` INT,
            IN `pa_fecha_revision` DATE,
            IN `pa_mantenimiento` VARCHAR(30)
        )
        
        BEGIN
            if EXISTS(SELECT * FROM control_temperatura WHERE control_temperatura.id_pilones = pa_id_pilones and
                    control_temperatura.fecha_revision = pa_fecha_revision) then
                SELECT "Temperatura del pión ya registrada",0;
            ELSE
        
                INSERT INTO control_temperatura ( id_pilones, temperatura, fecha_revision, mantenimiento) VALUES (pa_id_pilones,
                                                                                                                  pa_temperatura, pa_fecha_revision, pa_mantenimiento);
                SELECT "Guardado correctamente",1;
            END if;
        
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
        
    }
}
