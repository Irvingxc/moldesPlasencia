<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TraerDatosGraficoTemperatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `traer_datos_grafico_temperatura`');
    
        DB::unprepared('
        
        CREATE  PROCEDURE `traer_datos_grafico_temperatura`(
            IN `id_pilon` INT,
            IN `fecha_revision` DATE
        )
        
        BEGIN
            SELECT *
            FROM control_temperatura
            WHERE    YEAR(control_temperatura.fecha_revision) = YEAR(fecha_revision)
              AND
                    month(control_temperatura.fecha_revision) =  month(fecha_revision)
              AND
                    control_temperatura.id_pilones = id_pilon
            ORDER BY control_temperatura.fecha_revision;
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
