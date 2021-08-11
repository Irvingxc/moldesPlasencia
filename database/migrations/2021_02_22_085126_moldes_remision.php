<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoldesRemision extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `moldes_remision`');
    
        DB::unprepared('
        CREATE PROCEDURE `moldes_remision`(
            IN `pa_idplanta` INT
        )
       
        BEGIN
        
        SELECT id_molde, CONCAT(figura_tipos.nombre_figura, "  ",vitolas.vitola) AS fivi
                                    FROM plantas, moldes, figura_tipos, vitolas WHERE pa_idplanta = plantas.id_planta AND
                                    moldes.id_planta = pa_idplanta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta 
                                    AND moldes.id_figura = figura_tipos.id_figura AND
                                   moldes.id_vitola = vitolas.id_vitola ;      
        
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
