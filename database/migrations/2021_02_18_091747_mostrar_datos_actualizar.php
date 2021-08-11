<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MostrarDatosActualizar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `mostrar_datos_actualizar`');
    
        DB::unprepared('
       
        CREATE PROCEDURE `mostrar_datos_actualizar`(
            IN `pa_id_molde` INT
        )
        
        BEGIN
        
        
        
        SELECT moldes.bueno, moldes.irregulares, moldes.malos, moldes.reparacion, 
        moldes.bodega, moldes.salon,moldes.total
        FROM moldes 
        where moldes.id_molde = pa_id_molde;
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
