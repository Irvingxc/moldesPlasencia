<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuscarTablaPilon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `buscar_tabla_pilon`');
    
        DB::unprepared('
        
        CREATE  PROCEDURE `buscar_tabla_pilon`(
            IN `pa_valor` VARCHAR(50)
        )
       
        BEGIN
            SELECT * FROM tabla_pilon WHERE CONCAT(id_remision,entradas_salidas,nombre_tabaco) LIKE CONCAT("%",pa_valor,"%");
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
