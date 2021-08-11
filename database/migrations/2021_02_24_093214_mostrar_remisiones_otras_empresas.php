<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MostrarRemisionesOtrasEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `mostrar_remisiones_otras_empresas`');
    
        DB::unprepared('
        CREATE  PROCEDURE `mostrar_remisiones_otras_empresas`(
            IN `pa_nombre` VARCHAR(50)
        )
       
        BEGIN
        
        if pa_nombre = "0" then 
         SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
          FROM remisiones, plantas 
           WHERE remisiones.nombre_fabrica != "Gualiqueme" AND remisiones.nombre_fabrica != "Moroceli" AND remisiones.nombre_fabrica != "Paraiso Cigar" AND remisiones.nombre_fabrica !="San Marcos"and
            remisiones.id_planta = plantas.id_planta ;
        
         ELSE 
        SELECT remisiones.id_remision, remisiones.id_planta, plantas.nombre_planta, remisiones.fecha,remisiones.nombre_fabrica,remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad, remisiones.chequear
          FROM remisiones, plantas 
           WHERE remisiones.nombre_fabrica != "Gualiqueme" AND remisiones.nombre_fabrica != "Moroceli" AND remisiones.nombre_fabrica != "Paraiso Cigar" AND remisiones.nombre_fabrica !="San Marcos"and
            remisiones.id_planta = plantas.id_planta AND  remisiones.nombre_fabrica LIKE CONCAT("%", pa_nombre, "%") ;
        
        
        
            
            
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
        
    }
}
