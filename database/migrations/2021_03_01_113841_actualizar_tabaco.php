<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizarTabaco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `actualizar_tabaco`');
    
        DB::unprepared('
       
        CREATE  PROCEDURE `actualizar_tabaco`(
            IN `pa_id_tabaco` INT,
            IN `pa_nombre_tabaco` VARCHAR(100)
        )
       
        BEGIN
            if EXISTS (SELECT * FROM clase_tabaco WHERE clase_tabaco.id_tabaco = pa_id_tabaco AND clase_tabaco.nombre_tabaco = pa_nombre_tabaco)
            then
                UPDATE clase_tabaco SET
                    clase_tabaco.nombre_tabaco = pa_nombre_tabaco
        
                WHERE clase_tabaco.id_tabaco = pa_id_tabaco;
                SELECT "Actualizado correctamente",1;
            ELSE
                if EXISTS (SELECT * FROM clase_tabaco WHERE clase_tabaco.id_tabaco != pa_id_tabaco AND clase_tabaco.nombre_tabaco = pa_nombre_tabaco)
                then
                    SELECT "Nombre ya existe",0;
        
                ELSE
                    UPDATE clase_tabaco SET
                        clase_tabaco.nombre_tabaco = pa_nombre_tabaco
        
                    WHERE clase_tabaco.id_tabaco = pa_id_tabaco;
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
