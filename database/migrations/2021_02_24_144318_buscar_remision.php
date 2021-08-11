<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuscarRemision extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `buscar_remision`');
    
        DB::unprepared('

        CREATE PROCEDURE `buscar_remision`(
            IN `pa_fecha_inicio` VARCHAR(50),
            IN `pa_fecha_fin` VARCHAR(50),
            IN `pa_id_planta` INT
        )
        
        BEGIN
                 if pa_fecha_inicio= "0" && pa_fecha_fin = "0" then 
                         select *
                          from remisiones
                         where  pa_id_planta = remisiones.id_planta;
                          
                       
                  ELSE if   pa_fecha_inicio != "0" && pa_fecha_fin = "0"  then
                  
                   select *  from remisiones
                        where  pa_id_planta = remisiones.id_planta AND remisiones.fecha   =   STR_TO_DATE(  pa_fecha_inicio, "%Y-%m-%d");
                  ELSE if    pa_fecha_inicio= "0" && pa_fecha_fin != "0"  then
                  
                    select *  from remisiones
                        where  pa_id_planta = remisiones.id_planta AND remisiones.fecha   =   STR_TO_DATE(  pa_fecha_fin, "%Y-%m-%d");
                 
                  else
                        select *
                          from remisiones
                         where remisiones.fecha between pa_fecha_inicio AND pa_fecha_fin AND pa_id_planta = remisiones.id_planta;
                         
                    END if;
                     END if;
                          END if;
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
