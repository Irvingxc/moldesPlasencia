<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuscarControlPilones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `buscar_control_pilones`');
    
        DB::unprepared('
        
        CREATE  PROCEDURE `buscar_control_pilones`(
            IN `pa_valor` VARCHAR(50)
        )
        
        BEGIN
            SELECT * FROM control_pilones WHERE CONCAT(nombre_tabaco,numero_pilon) LIKE CONCAT("%",pa_valor,"%");
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
