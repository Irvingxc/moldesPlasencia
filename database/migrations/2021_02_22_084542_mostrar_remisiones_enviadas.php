<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MostrarRemisionesEnviadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `mostrar_remisiones_enviadas`');
    
        DB::unprepared('

        CREATE PROCEDURE `mostrar_remisiones_enviadas`(
            IN `pa_id_planta` INT
        )
  
        BEGIN
        SELECT remisiones.id_remision, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,
         remisiones.tipo_moldes,remisiones.cantidad
          FROM remisiones
           WHERE remisiones.id_planta = pa_id_planta;
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
