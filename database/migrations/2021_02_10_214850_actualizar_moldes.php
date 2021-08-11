<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizarMoldes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `actualizar_moldes`');
    
        DB::unprepared('

        CREATE PROCEDURE `actualizar_moldes`(
            IN `pa_id_molde` INT,
            IN `pa_bueno` INT,
            IN `pa_irregular` INT,
            IN `pa_malo` INT,
            IN `pa_bodega` INT,
            IN `pa_reparacion` INT,
            IN `pa_salon` INT
        )
        
        BEGIN
        
        
         DECLARE nuevo_total_estado INT;
         DECLARE nuevo_total_ubicacion INT; 
                        
                        
                        SET nuevo_total_estado = pa_bueno+ pa_irregular+ pa_malo;
                        SET nuevo_total_ubicacion = pa_bodega + pa_reparacion + pa_salon;
                        if  nuevo_total_estado = nuevo_total_ubicacion then
                        
        UPDATE moldes SET moldes.bueno = pa_bueno, moldes.irregulares = pa_irregular, moldes.malos =  pa_malo , 
                moldes.reparacion=pa_reparacion, moldes.bodega= pa_bodega, moldes.salon = pa_salon , moldes.total = nuevo_total_estado
                   WHERE moldes.id_molde = pa_id_molde;
                   
                   else
                   
                   SELECT "No se puede actualizar";
                   
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
