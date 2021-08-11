<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuscarRemisionRecibidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `buscar_remision_recibidas`');
    
        DB::unprepared('
        CREATE PROCEDURE `buscar_remision_recibidas`(
          IN `pa_fecha_inicio` VARCHAR(50),
          IN `pa_fecha_fin` VARCHAR(50),
          IN `pa_nombre_planta` VARCHAR(50)
        )
       
        BEGIN
                
               if pa_fecha_inicio= "0" && pa_fecha_fin = "0" then 
                         
                         
                           SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                    FROM remisiones, plantas  WHERE remisiones.nombre_fabrica = pa_nombre_planta AND plantas.id_planta = remisiones.id_planta;
                       
                  ELSE 
               if   pa_fecha_inicio != "0" && pa_fecha_fin = "0"  then
                  
                          SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                    FROM remisiones, plantas 
                         WHERE remisiones.nombre_fabrica = pa_nombre_planta AND plantas.id_planta = remisiones.id_planta AND remisiones.fecha   =   STR_TO_DATE(  pa_fecha_inicio, "%Y-%m-%d");
                  ELSE 
               if    pa_fecha_inicio= "0" && pa_fecha_fin != "0"  then
                  
                    
                           SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                    FROM remisiones, plantas  WHERE remisiones.nombre_fabrica = pa_nombre_planta AND plantas.id_planta = remisiones.id_planta
                        AND remisiones.fecha   =   STR_TO_DATE(  pa_fecha_fin, "%Y-%m-%d");
                 
                  else
                
                
                           SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                    FROM remisiones, plantas  WHERE remisiones.nombre_fabrica = pa_nombre_planta AND plantas.id_planta = remisiones.id_planta
                       and remisiones.fecha between pa_fecha_inicio AND pa_fecha_fin AND 
                          remisiones.nombre_fabrica = pa_nombre_planta AND plantas.id_planta = remisiones.id_planta;
                         
                END if ;
                END if ;
              END if ;
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
