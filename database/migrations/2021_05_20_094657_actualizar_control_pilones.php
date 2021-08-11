<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizarControlPilones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `actualizar_control_pilones`');
    
        DB::unprepared('
        CREATE  PROCEDURE `actualizar_control_pilones`(
            IN `pa_id_control_pilones` BIGINT,
            IN `pa_nombre_tabaco` VARCHAR(50),
            IN `pa_fecha_entrada_pilon` DATE,
            IN `pa_numero_pilon` VARCHAR(50),
            IN `pa_entrada_tabaco_pilon` VARCHAR(50),
            IN `pa_salida_tabaco_pilon` VARCHAR(50),
            IN `pa_total_actual` DECIMAL(10,2),
            IN `pa_Total` DECIMAL(10,2)
        )
       
        BEGIN
        
            if EXISTS (SELECT * FROM control_pilones WHERE control_pilones.id_control_pilones = pa_id_control_pilones
                                                       AND control_pilones.nombre_tabaco = pa_nombre_tabaco AND control_pilones.numero_pilon = pa_numero_pilon)
            then
                UPDATE control_pilones SET nombre_tabaco = pa_nombre_tabaco,
                                           fecha_entrada_pilon = pa_fecha_entrada_pilon, numero_pilon = pa_numero_pilon, entrada_tabaco_pilon = pa_entrada_tabaco_pilon,
                                           salida_tabaco_pilon = pa_salida_tabaco_pilon,total_actual = pa_total_actual, Total = pa_Total
                WHERE control_pilones.id_control_pilones = pa_id_control_pilones;
                SELECT "Actualizado correctamente",1;
            ELSE
                if EXISTS (SELECT * FROM control_pilones WHERE control_pilones.id_control_pilones = pa_id_control_pilones
                                                           AND control_pilones.nombre_tabaco = pa_nombre_tabaco AND control_pilones.numero_pilon = pa_numero_pilon)
                then
                    SELECT "Registro de proceso ya existe",0;
        
                ELSE
                    UPDATE control_pilones SET nombre_tabaco = pa_nombre_tabaco,
                                               fecha_entrada_pilon = pa_fecha_entrada_pilon, numero_pilon = pa_numero_pilon, entrada_tabaco_pilon = pa_entrada_tabaco_pilon,
                                               salida_tabaco_pilon = pa_salida_tabaco_pilon,total_actual = pa_total_actual, Total = pa_Total
                    WHERE control_pilones.id_control_pilones = pa_id_control_pilones;
                    SELECT "Actualizado correctamente",1;
                END if;
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
