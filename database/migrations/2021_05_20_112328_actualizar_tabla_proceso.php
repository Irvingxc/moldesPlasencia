<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizarTablaProceso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `actualizar_tabla_proceso`');
    
        DB::unprepared('
        
        CREATE  PROCEDURE `actualizar_tabla_proceso`(
            IN `pa_id_tabla_proceso` BIGINT,
            IN `pa_fecha_proceso` DATE,
            IN `pa_id_remision` INT,
            IN `pa_entradas_salidas` VARCHAR(50),
            IN `pa_nombre_tabaco` VARCHAR(50),
            IN `pa_subtotal` DECIMAL(10,2),
            IN `pa_total_libras` DECIMAL(10,2),
            IN `pa_total_remision` DECIMAL(10,2)
        )
        
        BEGIN
            if EXISTS (SELECT * FROM tabla_procesos WHERE tabla_procesos.id_tabla_proceso = pa_id_tabla_proceso
                                                      AND tabla_procesos.nombre_tabaco = pa_nombre_tabaco )
            then
                UPDATE tabla_procesos SET fecha_proceso = pa_fecha_proceso, id_remision = pa_id_remision, entradas_salidas = pa_entradas_salidas,
                                          nombre_tabaco = pa_nombre_tabaco, subtotal = pa_subtotal, total_libras = pa_total_libras,
                                          total_remision=pa_total_remision WHERE tabla_procesos.id_tabla_proceso = pa_id_tabla_proceso;
                SELECT "Actualizado correctamente",1;
            ELSE
                if EXISTS (SELECT * FROM tabla_procesos WHERE tabla_procesos.id_tabla_proceso != pa_id_tabla_proceso
                                                          AND tabla_procesos.nombre_tabaco = pa_nombre_tabaco )
                then
                    SELECT "Registro de proceso ya existe",0;
        
                ELSE
                    UPDATE tabla_procesos SET fecha_proceso = pa_fecha_proceso, id_remision = pa_id_remision, entradas_salidas = pa_entradas_salidas,
                                              nombre_tabaco = pa_nombre_tabaco,  subtotal = pa_subtotal, total_libras = pa_total_libras,
                                              total_remision=pa_total_remision WHERE tabla_procesos.id_tabla_proceso = pa_id_tabla_proceso;
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
