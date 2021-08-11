<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuscarEntradasPilon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `buscar_entradas_pilon`');
    
        DB::unprepared('
        
        CREATE  PROCEDURE `buscar_entradas_pilon`(
            IN `pa_nombre_tabaco` VARCHAR(50)
        )
        
        BEGIN
            SELECT * FROM entrada_pilones WHERE CONCAT(nombre_tabaco,numero_pilon) LIKE CONCAT("%",pa_nombre_tabaco,"%");
        
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
