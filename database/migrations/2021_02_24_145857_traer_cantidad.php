<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TraerCantidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `traer_cantidad`');
    
        DB::unprepared('
        CREATE  PROCEDURE `traer_cantidad`(
            IN `pa_id_planta` INT
        )
      
        BEGIN
                  SELECT CONCAT(figura_tipos.nombre_figura,"  ",vitolas.vitola) AS fivi , moldes.bueno, moldes.irregulares ,  moldes.bodega,
                  moldes.total-(moldes.malos+moldes.reparacion+moldes.salon) as moldesDisponibles
                  FROM moldes , vitolas, figura_tipos WHERE
                 moldes.id_planta = pa_id_planta and vitolas.id_vitola = moldes.id_vitola and
                 moldes.id_figura= figura_tipos.id_figura ;
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
