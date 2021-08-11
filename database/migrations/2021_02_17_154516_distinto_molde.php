<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DistintoMolde extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `distintos_moldes`');
    
        DB::unprepared('
        
        CREATE PROCEDURE `distintos_moldes`()
        
        BEGIN
        
                        DELETE FROM totales_plantas;
        
        
                                  SELECT DISTINCT(concat(x.nombre_figura,"  " , x.vitola)) as figura_vitola FROM ((SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,  moldes.irregulares, moldes.malos, 
                            moldes.bodega, moldes.reparacion, moldes.salon, moldes.id_molde, moldes.total
                            FROM plantas, moldes, figura_tipos, vitolas WHERE "1" = plantas.id_planta AND
                            moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta 
                            AND moldes.id_figura = figura_tipos.id_figura AND
                            moldes.id_vitola = vitolas.id_vitola)
                                  union
                                  (SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,  moldes.irregulares, moldes.malos, 
                            moldes.bodega, moldes.reparacion, moldes.salon, moldes.id_molde, moldes.total
                            FROM plantas, moldes, figura_tipos, vitolas WHERE "2" = plantas.id_planta AND
                            moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta 
                            AND moldes.id_figura = figura_tipos.id_figura AND
                            moldes.id_vitola = vitolas.id_vitola)
                            union
                            (SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,  moldes.irregulares, moldes.malos, 
                            moldes.bodega, moldes.reparacion, moldes.salon, moldes.id_molde, moldes.total
                            FROM plantas, moldes, figura_tipos, vitolas WHERE "3" = plantas.id_planta AND
                            moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta 
                            AND moldes.id_figura = figura_tipos.id_figura AND
                            moldes.id_vitola = vitolas.id_vitola)
                            union
                            (SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,  moldes.irregulares, moldes.malos, 
                            moldes.bodega, moldes.reparacion, moldes.salon, moldes.id_molde, moldes.total
                            FROM plantas, moldes, figura_tipos, vitolas WHERE "4" = plantas.id_planta AND
                            moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta 
                            AND moldes.id_figura = figura_tipos.id_figura AND
                            moldes.id_vitola = vitolas.id_vitola))x;
             
             
                       END
        
        ' );
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
