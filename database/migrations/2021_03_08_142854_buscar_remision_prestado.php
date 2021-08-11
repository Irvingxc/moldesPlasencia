<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuscarRemisionPrestado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `buscar_remisiones_prestadas`');
    
        DB::unprepared('
        CREATE  PROCEDURE `buscar_remisiones_prestadas`(
            IN `pa_fecha_inicio` VARCHAR(50),
            IN `pa_fecha_fin` VARCHAR(50),
            IN `pa_nom_otra_fabrica` VARCHAR(50)
        )
       
        BEGIN
                if pa_fecha_inicio= "0" && pa_fecha_fin = "0" && pa_nom_otra_fabrica = "0" then 
                        
                       SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                  FROM remisiones, plantas 
                   WHERE remisiones.nombre_fabrica != "Gualiqueme" AND remisiones.nombre_fabrica != "Moroceli" AND remisiones.nombre_fabrica != "Paraiso Cigar" AND remisiones.nombre_fabrica !="San Marcos"and
                    remisiones.id_planta = plantas.id_planta;
                    
                    ELSE 
                     if pa_fecha_inicio != "0" && pa_fecha_fin = "0" then 
                     
                      
                       SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                  FROM remisiones, plantas 
                   WHERE remisiones.nombre_fabrica != "Gualiqueme" AND remisiones.nombre_fabrica != "Moroceli" AND remisiones.nombre_fabrica != "Paraiso Cigar" AND remisiones.nombre_fabrica !="San Marcos"and
                    remisiones.id_planta = plantas.id_planta AND remisiones.fecha =pa_fecha_inicio ;
                    
                     
                     else
                     
                      if pa_fecha_inicio= "0" && pa_fecha_fin != "0" then 
                      
                      
                    
                       SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                  FROM remisiones, plantas 
                   WHERE remisiones.nombre_fabrica != "Gualiqueme" AND remisiones.nombre_fabrica != "Moroceli" AND remisiones.nombre_fabrica != "Paraiso Cigar" AND remisiones.nombre_fabrica !="San Marcos"and
                    remisiones.id_planta = plantas.id_planta AND remisiones.fecha =pa_fecha_fin ;
                    
                    
                    
                    else
                    
                    if pa_fecha_inicio = "0" && pa_fecha_fin = "0" && pa_nom_otra_fabrica != "0"then 
                    
                    
                       SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                  FROM remisiones, plantas 
                   WHERE remisiones.nombre_fabrica != "Gualiqueme" AND remisiones.nombre_fabrica != "Moroceli" AND remisiones.nombre_fabrica != "Paraiso Cigar" AND remisiones.nombre_fabrica !="San Marcos"and
                    remisiones.id_planta = plantas.id_planta AND remisiones.nombre_fabrica  LIKE  CONCAT("%", pa_nom_otra_fabrica, "%")  ;
                    
                    
                    else
                    
                    
                    if pa_fecha_inicio != "0" && pa_fecha_fin = "0" && pa_nom_otra_fabrica != "0"then 
                    
                      SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                  FROM remisiones, plantas 
                   WHERE remisiones.nombre_fabrica != "Gualiqueme" AND remisiones.nombre_fabrica != "Moroceli" AND remisiones.nombre_fabrica != "Paraiso Cigar" AND remisiones.nombre_fabrica !="San Marcos"and
                    remisiones.id_planta = plantas.id_planta AND remisiones.nombre_fabrica  LIKE  CONCAT("%", pa_nom_otra_fabrica, "%") AND remisiones.fecha = STR_TO_DATE(  pa_fecha_inicio, "%Y-%m-%d") ;
                    
                    else
                    
                        
                    if pa_fecha_inicio = "0" && pa_fecha_fin != "0" && pa_nom_otra_fabrica != "0"then 
                    
                      SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                  FROM remisiones, plantas 
                   WHERE remisiones.nombre_fabrica != "Gualiqueme" AND remisiones.nombre_fabrica != "Moroceli" AND remisiones.nombre_fabrica != "Paraiso Cigar" AND remisiones.nombre_fabrica !="San Marcos"and
                    remisiones.id_planta = plantas.id_planta AND remisiones.nombre_fabrica  LIKE  CONCAT("%", pa_nom_otra_fabrica, "%") AND remisiones.fecha = STR_TO_DATE(  pa_fecha_fin, "%Y-%m-%d") ;
                    
                    else
                       SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
                  FROM remisiones, plantas 
                   WHERE remisiones.nombre_fabrica != "Gualiqueme" AND remisiones.nombre_fabrica != "Moroceli" AND remisiones.nombre_fabrica != "Paraiso Cigar" AND remisiones.nombre_fabrica !="San Marcos"and
                    remisiones.id_planta = plantas.id_planta  AND 
                      remisiones.nombre_fabrica LIKE  CONCAT("%", pa_nom_otra_fabrica, "%") AND
                          remisiones.fecha between  STR_TO_DATE( pa_fecha_inicio,"%Y-%m-%d") AND STR_TO_DATE(  pa_fecha_fin, "%Y-%m-%d") ;
                    
                    END if;
                     END if; 
                         END if;
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
