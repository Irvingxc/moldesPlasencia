<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarRemisionProceso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_remision_proceso`');
    
        DB::unprepared('
       
        CREATE  PROCEDURE `insertar_remision_proceso`(
            IN `pa_id_remision` INT,
            IN `pa_fecha_remision` DATE,
            IN `pa_destino_remision` VARCHAR(50),
            IN `pa_origen_remision` VARCHAR(50),
            IN `pa_descripcion1_remision` VARCHAR(100),
            IN `pa_cant_lbs_des_1` TEXT,
            IN `pa_descripcion2_remision` VARCHAR(100),
            IN `pa_cant_lbs_des_2` TEXT,
            IN `pa_descripcion3_remision` VARCHAR(100),
            IN `pa_cant_lbs_des_3` TEXT,
            IN `pa_descripcion4_remision` VARCHAR(100),
            IN `pa_cant_lbs_des_4` TEXT,
            IN `pa_descripcion5_remision` VARCHAR(100),
            IN `pa_cant_lbs_des_5` TEXT,
            IN `pa_total_remision` DECIMAL(10,2)
        )
       
        BEGIN
            if EXISTS ( SELECT * FROM remision_proceso WHERE id_remision = pa_id_remision) then
                SELECT "no se puede guardar",0;
        
            else
                INSERT INTO remision_proceso ( id_remision,fecha_remision, destino_remision, origen_remision, descripcion1_remision,
                                               cant_lbs_des_1,descripcion2_remision,cant_lbs_des_2, descripcion3_remision,cant_lbs_des_3,descripcion4_remision,cant_lbs_des_4,
                                               descripcion5_remision,cant_lbs_des_5, total_remision)
                VALUES (pa_id_remision,pa_fecha_remision,pa_destino_remision,pa_origen_remision,pa_descripcion1_remision,
                        pa_cant_lbs_des_1,pa_descripcion2_remision,pa_cant_lbs_des_2,pa_descripcion3_remision,pa_cant_lbs_des_3,pa_descripcion4_remision,
                        pa_cant_lbs_des_4,pa_descripcion5_remision,pa_cant_lbs_des_5,pa_total_remision);
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
        //
    }
}
