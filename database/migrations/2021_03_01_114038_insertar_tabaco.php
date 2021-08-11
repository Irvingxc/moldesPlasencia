<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarTabaco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_tabaco`');
    
        DB::unprepared('

        CREATE  PROCEDURE `insertar_tabaco`(
            IN `pa_nombre` VARCHAR(100)
        )
        
        BEGIN
        
            if EXISTS (SELECT * from clase_tabaco WHERE nombre_tabaco = pa_nombre) then
                SELECT "No se puede repetir el nombre/n de la clase de tabaco",0;
            else
                INSERT INTO clase_tabaco (nombre_tabaco) VALUES(pa_nombre);
                SELECT "Guardado correctamente",1;
            end IF;
        
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
