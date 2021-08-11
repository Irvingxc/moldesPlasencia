<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoldesSanMarcos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `moldes_sanMarcos`');
    
        DB::unprepared('
        CREATE PROCEDURE `moldes_sanMarcos`(
            IN `pa_vitola` VARCHAR(50),
            IN `pa_figura` VARCHAR(50)
        )
        
        
        
        BEGIN
                   if pa_vitola= "0" && pa_figura = "0" then 
                   SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,
                   moldes.total-(moldes.malos+moldes.reparacion+moldes.salon) as disponible,  moldes.irregulares, moldes.malos, 
                        moldes.bodega, moldes.reparacion, moldes.salon,moldes.total, moldes.id_molde
                        FROM plantas, moldes, figura_tipos, vitolas WHERE  plantas.id_planta = "3" AND
                        moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta AND moldes.id_figura = figura_tipos.id_figura AND
                        moldes.id_vitola = vitolas.id_vitola;
                          ELSE if pa_vitola  != "0" &&   pa_figura = "0" then
                          
                          SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,
                          moldes.total-(moldes.malos+moldes.reparacion+moldes.salon) as disponible,  moldes.irregulares, moldes.malos, 
                        moldes.bodega, moldes.reparacion, moldes.salon,moldes.total, moldes.id_molde
                        FROM plantas, moldes, figura_tipos, vitolas WHERE  plantas.id_planta = "3" AND
                        moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta AND moldes.id_figura = figura_tipos.id_figura AND
                        moldes.id_vitola = vitolas.id_vitola AND vitolas.vitola  LIKE CONCAT("%", pa_vitola, "%");
                          
                          ELSE if pa_vitola  = "0" &&   pa_figura != "0" then
                          
                            
                          SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,
                          moldes.total-(moldes.malos+moldes.reparacion+moldes.salon) as disponible,  moldes.irregulares, moldes.malos, 
                        moldes.bodega, moldes.reparacion, moldes.salon,moldes.total, moldes.id_molde
                        FROM plantas, moldes, figura_tipos, vitolas WHERE  plantas.id_planta = "3" AND
                        moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta AND moldes.id_figura = figura_tipos.id_figura AND
                        moldes.id_vitola = vitolas.id_vitola AND figura_tipos.nombre_figura  LIKE CONCAT("%", pa_figura, "%");
                          
                          ELSE 
                        SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,
                        moldes.total-(moldes.malos+moldes.reparacion+moldes.salon) as disponible,  moldes.irregulares, moldes.malos, 
                        moldes.bodega, moldes.reparacion, moldes.salon,moldes.total, moldes.id_molde
                        FROM plantas, moldes, figura_tipos, vitolas WHERE  plantas.id_planta = "3" AND
                        moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta AND moldes.id_figura = figura_tipos.id_figura AND
                        moldes.id_vitola = vitolas.id_vitola AND vitolas.vitola LIKE CONCAT("%", pa_vitola, "%") AND figura_tipos.nombre_figura LIKE CONCAT("%", pa_figura, "%")      ;
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
