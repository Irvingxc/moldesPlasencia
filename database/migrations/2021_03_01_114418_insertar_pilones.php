<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarPilones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_pilones`');
    
        DB::unprepared('
       
        CREATE  PROCEDURE `insertar_pilones`(
            IN `pa_nombre_pilon` VARCHAR(50)
        )
        
        BEGIN
            if EXISTS(SELECT * FROM pilones WHERE pilones.numero_pilon = pa_nombre_pilon) then
                SELECT "No se puede Guardar",1;
            ELSE
                INSERT INTO pilones(numero_pilon) VALUES(pa_nombre_pilon);
                SELECT "Guardado correctamente",1;
        
        
                INSERT INTO  `1-pilon_actividad`(id_pilon,activo,cantidad_libras,finca,variedad,us_cre,fecha_activo,fecha_inactivo)
                VALUES(pa_nombre_pilon,0,0, "", "", NOW(),NOW(),NOW());
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
