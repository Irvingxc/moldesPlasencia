<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TraerIdVitola extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('DROP procedure if exists `traer_id_vitola`');
    
        DB::unprepared('

        CREATE PROCEDURE `traer_id_vitola`(
            IN `pa_id_planta` INT,
            IN `pa_vitola` VARCHAR(50)
        )
        
        BEGIN
           SELECT id_vitola FROM vitolas where vitola = pa_vitola AND id_planta = pa_id_planta;
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
    }
}
