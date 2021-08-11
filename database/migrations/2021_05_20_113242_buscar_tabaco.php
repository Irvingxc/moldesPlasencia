<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuscarTabaco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `buscar_tabaco`');
    
        DB::unprepared('
        
        CREATE  PROCEDURE `buscar_tabaco`(
            IN `pa_nombre_tabaco` VARCHAR(50)
        )
       
        BEGIN
        
            SELECT * FROM clase_tabaco WHERE nombre_tabaco LIKE CONCAT("%",pa_nombre_tabaco,"%");
        
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
