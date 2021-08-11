<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarTotalesPlantas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_totales_plantas`');
    
        DB::unprepared('

        CREATE  PROCEDURE `insertar_totales_plantas`(
            IN `pa_figura_vitola` VARCHAR(50)
        )
       
        BEGIN
                        
        INSERT INTO totales_plantas(SELECT pa_figura_vitola, SUM(x.bueno) AS total_bueno, SUM(x.disponible) AS total_irregulares, SUM(x.malos) AS total_malo,
        SUM(x.bodega) AS total_bodega, SUM(x.reparacion) AS total_reparacion, SUM(x.salon) AS total_salon, (SUM(x.bueno)+  SUM(x.malos)) AS total FROM  ((SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno, moldes.total-(moldes.malos+moldes.reparacion+moldes.salon) as disponible, moldes.malos, 
                            moldes.bodega, moldes.reparacion, moldes.salon, moldes.id_molde, moldes.total
                            FROM plantas, moldes, figura_tipos, vitolas WHERE "1" = plantas.id_planta AND
                            moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta 
                            AND moldes.id_figura = figura_tipos.id_figura AND
                            moldes.id_vitola = vitolas.id_vitola)
                            UNION 
                         ( SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,  moldes.total-(moldes.malos+moldes.reparacion+moldes.salon) as disponible, moldes.malos, 
                            moldes.bodega, moldes.reparacion, moldes.salon, moldes.id_molde, moldes.total
                            FROM plantas, moldes, figura_tipos, vitolas WHERE "2" = plantas.id_planta AND
                            moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta 
                            AND moldes.id_figura = figura_tipos.id_figura AND
                            moldes.id_vitola = vitolas.id_vitola )
                                  UNION 
                                  ( SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,  moldes.total-(moldes.malos+moldes.reparacion+moldes.salon) as disponible, moldes.malos, 
                            moldes.bodega, moldes.reparacion, moldes.salon, moldes.id_molde, moldes.total
                            FROM plantas, moldes, figura_tipos, vitolas WHERE "3" = plantas.id_planta AND
                            moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta 
                            AND moldes.id_figura = figura_tipos.id_figura AND
                            moldes.id_vitola = vitolas.id_vitola )
                                  UNION 
                                  ( SELECT  plantas.nombre_planta, vitolas.vitola, figura_tipos.nombre_figura, moldes.bueno,  moldes.total-(moldes.malos+moldes.reparacion+moldes.salon) as disponible, moldes.malos, 
                            moldes.bodega, moldes.reparacion, moldes.salon, moldes.id_molde, moldes.total
                            FROM plantas, moldes, figura_tipos, vitolas WHERE "4" = plantas.id_planta AND
                            moldes.id_planta = plantas.id_planta AND vitolas.id_planta = plantas.id_planta and figura_tipos.id_planta = plantas.id_planta 
                            AND moldes.id_figura = figura_tipos.id_figura AND
                            moldes.id_vitola = vitolas.id_vitola ))x
                                  WHERE concat(x.nombre_figura,"  " , x.vitola) = pa_figura_vitola);
                        
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
