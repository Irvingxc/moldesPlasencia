<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReporteTodasSucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `reporte_todas_sucursales`');
    
        DB::unprepared('
        
        CREATE PROCEDURE `reporte_todas_sucursales`()

            BEGIN
                

                select totales_plantas.figura_vitola,totales_plantas.total_bueno,totales_plantas.total_irregulares,totales_plantas.total_malo
                ,totales_plantas.total_bodega,totales_plantas.total_repacion,totales_plantas.total_salon, totales_plantas.total
                FROM totales_plantas ;
                    
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