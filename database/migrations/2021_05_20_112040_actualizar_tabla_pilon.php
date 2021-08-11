<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizarTablaPilon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `actualizar_tabla_pilon`');
    
        DB::unprepared('
        
        CREATE  PROCEDURE `actualizar_tabla_pilon`(
            IN `pa_id_tabla_pilon` BIGINT,
            IN `pa_fecha_proceso` DATE,
            IN `pa_id_remision` INT,
            IN `pa_entradas_salidas` VARCHAR(50),
            IN `pa_nombre_tabaco` VARCHAR(50),
            IN `pa_subtotal` DECIMAL(10,2),
            IN `pa_total_libras` DECIMAL(10,2),
            IN `pa_total_remision` DECIMAL(10,2)
        )
        
        BEGIN
            if EXISTS (SELECT * FROM tabla_pilon WHERE tabla_pilon.id_tabla_pilon = pa_id_tabla_pilon
                                                   AND tabla_pilon.nombre_tabaco = pa_nombre_tabaco )
            then
                UPDATE tabla_pilon SET fecha_proceso = pa_fecha_proceso, id_remision = pa_id_remision, entradas_salidas = pa_entradas_salidas,
                                       nombre_tabaco = pa_nombre_tabaco,  subtotal = pa_subtotal, total_libras = pa_total_libras,
                                       total_remision=pa_total_remision WHERE tabla_pilon.id_tabla_pilon = pa_id_tabla_pilon;
                SELECT "Actualizado correctamente",1;
            ELSE
                if EXISTS (SELECT * FROM tabla_pilon WHERE tabla_pilon.id_tabla_pilon != pa_id_tabla_pilon
                                                       AND tabla_pilon.nombre_tabaco = pa_nombre_tabaco )
                then
                    SELECT "Registro de proceso ya existe",0;
        
                ELSE
                    UPDATE tabla_pilon SET fecha_proceso = pa_fecha_proceso, id_remision = pa_id_remision, entradas_salidas = pa_entradas_salidas,
                                           nombre_tabaco = pa_nombre_tabaco, subtotal = pa_subtotal, total_libras = pa_total_libras,
                                           total_remision=pa_total_remision WHERE tabla_pilon.id_tabla_pilon = pa_id_tabla_pilon;
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
