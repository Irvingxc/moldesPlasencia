<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MostrarTotalPlantas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::unprepared('DROP procedure if exists `mostrar_total_todas_plantas`');
    
        DB::unprepared('
        
        CREATE PROCEDURE `mostrar_total_todas_plantas`()
        
        BEGIN
        
        
        SELECT totales_plantas.figura_vitola, totales_plantas.total_bueno, totales_plantas.total_irregulares
        ,totales_plantas.total_malo,totales_plantas.total_bodega,totales_plantas.total_repacion,totales_plantas.total_salon FROM totales_plantas;
        
        
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
