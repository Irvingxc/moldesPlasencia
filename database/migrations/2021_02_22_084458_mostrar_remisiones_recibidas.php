<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MostrarRemisionesRecibidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `mostrar_remisiones_recibidas`');
    
        DB::unprepared('

        CREATE PROCEDURE `mostrar_remisiones_recibidas`(
            IN `pa_nombre_fabrica` VARCHAR(50)
        )
      
        BEGIN
        SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
            FROM remisiones, plantas 
                 WHERE remisiones.nombre_fabrica = pa_nombre_fabrica AND plantas.id_planta = remisiones.id_planta;
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
