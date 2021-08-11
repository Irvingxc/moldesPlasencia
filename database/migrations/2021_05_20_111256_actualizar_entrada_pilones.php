<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizarEntradaPilones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `actualizar_entrada_pilones`');
    
        DB::unprepared('
        CREATE  PROCEDURE `actualizar_entrada_pilones`(
            IN `pa_id_entrada_pilones` INT,
            IN `pa_nombre_tabaco` VARCHAR(50),
            IN `pa_variedad` VARCHAR(50),
            IN `pa_finca` VARCHAR(50),
            IN `pa_numero_pilon` VARCHAR(50),
            IN `pa_fecha_entrada_pilon` DATE,
            IN `pa_tiempo_adelanto_pilon` VARCHAR(50),
            IN `pa_fecha_estimada_salida` DATE,
            IN `pa_cantidad_lbs` DECIMAL(10,2)
        )
        
        BEGIN
            if EXISTS (SELECT * FROM entrada_pilones WHERE entrada_pilones.id_entrada_pilones = pa_id_entrada_pilones
                                                       AND entrada_pilones.nombre_tabaco = pa_nombre_tabaco)
            then
                UPDATE entrada_pilones SET nombre_tabaco = pa_nombre_tabaco, variedad = pa_variedad, finca = pa_finca,numero_pilon = pa_numero_pilon,fecha_entrada_pilon = pa_fecha_entrada_pilon,
                                           tiempo_adelanto_pilon = pa_tiempo_adelanto_pilon,fecha_estimada_salida = pa_fecha_estimada_salida,cantidad_lbs = pa_cantidad_lbs
        
                WHERE entrada_pilones.id_entrada_pilones = pa_id_entrada_pilones;
                SELECT "Actualizado correctamente",1;
            ELSE
                if EXISTS (SELECT * FROM entrada_pilones WHERE entrada_pilones.id_entrada_pilones != pa_id_entrada_pilones
                                                           AND entrada_pilones.nombre_tabaco = pa_nombre_tabaco)
                then
                    SELECT "Entrada de pilón ya existe",0;
        
                ELSE
                    UPDATE entrada_pilones SET nombre_tabaco = pa_nombre_tabaco,numero_pilon = pa_numero_pilon,fecha_entrada_pilon = pa_fecha_entrada_pilon,
                                               tiempo_adelanto_pilon = pa_tiempo_adelanto_pilon,fecha_estimada_salida = pa_fecha_estimada_salida,cantidad_lbs = pa_cantidad_lbs
        
                    WHERE entrada_pilones.id_entrada_pilones = pa_id_entrada_pilones;
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
