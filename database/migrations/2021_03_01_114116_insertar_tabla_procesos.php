<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarTablaProcesos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_tabla_procesos`');
    
        DB::unprepared('
       
        CREATE  PROCEDURE `insertar_tabla_procesos`(
            IN `pa_fecha_proceso` DATE,
            IN `pa_id_remision` INT,
            IN `pa_entradas_salidas` VARCHAR(30),
            IN `pa_nombre_tabaco` VARCHAR(50),
            IN `pa_subtotal` DECIMAL(10,2),
            IN `pa_total_libras` DECIMAL(10,2),
            IN `pa_total_remision` DECIMAL(10,2)
        )
       
        BEGIN
            if EXISTS ( SELECT * FROM tabla_procesos WHERE id_remision = pa_id_remision AND nombre_tabaco = pa_nombre_tabaco)
                                                        then
                SELECT "no se puede repetir el numero de remisión",0;
        
            else
                INSERT INTO tabla_procesos (fecha_proceso,id_remision, entradas_salidas, nombre_tabaco,  subtotal, total_libras,total_remision)
                VALUES (pa_fecha_proceso,pa_id_remision,pa_entradas_salidas,pa_nombre_tabaco,pa_subtotal,pa_total_libras,pa_total_remision );
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
