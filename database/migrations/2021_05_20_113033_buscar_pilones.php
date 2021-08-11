<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuscarPilones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `Buscar_pilones`');
    
        DB::unprepared('
        
        CREATE  PROCEDURE `Buscar_pilones`(
            IN `pa_numero_pilon` VARCHAR(50)
        )
       
        BEGIN
        
            SELECT * FROM pilones WHERE numero_pilon LIKE CONCAT("%",pa_numero_pilon,"%");
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
