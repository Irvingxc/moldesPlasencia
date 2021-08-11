<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarVitola extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_vitola`');
    
        DB::unprepared('

        CREATE PROCEDURE `insertar_vitola`(
            IN `pa_id_planta` INT,
            IN `pa_nombre_vitola` VARCHAR(50)
        )
        
        BEGIN
        
        if EXISTS(SELECT * FROM vitolas WHERE pa_nombre_vitola = vitolas.vitola AND pa_id_planta = vitolas.id_planta) then 
        
        SELECT "esta vitola ya exista";
        
        ELSE
        INSERT INTO vitolas(vitolas.vitola, vitolas.id_planta) VALUES(pa_nombre_vitola,pa_id_planta);
        
        
        
        END if ;
        
        
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
