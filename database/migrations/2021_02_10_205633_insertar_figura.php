<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarFigura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_figura`');
    
        DB::unprepared('

        CREATE PROCEDURE `insertar_figura`(
            IN `pa_id_planta` INT,
            IN `pa_nombre_figura` VARCHAR(50)
        )
       
        BEGIN
        
        if EXISTS(SELECT * FROM figura_tipos WHERE figura_tipos.nombre_figura = pa_nombre_figura and figura_tipos.id_planta = pa_id_planta)
         then
         SELECT " el registro ya existe ";
        
        
        ELSE
        
            INSERT INTO figura_tipos(figura_tipos.nombre_figura, figura_tipos.id_planta)  VALUES(pa_nombre_figura, pa_id_planta);
            
        END if;
END;

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
