<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarRemisiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_remisiones`');
    
        DB::unprepared('

        CREATE  PROCEDURE `insertar_remisiones`(
            IN `pa_fecha` DATE,
            IN `pa_id_planta` INT,
            IN `pa_nombre_fabrica` VARCHAR(50),
            IN `pa_estado_moldes` VARCHAR(50),
            IN `pa_tipo_moldes` VARCHAR(50),
            IN `pa_cantidad` INT,
            IN `pa_chequear` INT
        )
       
        BEGIN
                DECLARE otra_planta INT;     
                 
         if exists(SELECT plantas.nombre_planta FROM plantas WHERE plantas.nombre_planta  = pa_nombre_fabrica) then  
                 
                 
                  INSERT INTO remisiones(remisiones.fecha,remisiones.id_planta, remisiones.nombre_fabrica,
                  remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad,remisiones.chequear)
                          VALUES(pa_fecha,pa_id_planta, pa_nombre_fabrica,
                                      pa_estado_moldes,pa_tipo_moldes,pa_cantidad,pa_chequear);
                                      
                                      
          else
          
            INSERT INTO remisiones(remisiones.fecha,remisiones.id_planta, remisiones.nombre_fabrica,
                  remisiones.estado_moldes,remisiones.tipo_moldes,remisiones.cantidad,remisiones.chequear)
                   VALUES(pa_fecha,pa_id_planta, pa_nombre_fabrica,
                pa_estado_moldes,pa_tipo_moldes,pa_cantidad,pa_chequear);
                
                 
                    
                        SET otra_planta = (SELECT  moldes.id_molde  FROM moldes, vitolas, figura_tipos WHERE moldes.id_planta = pa_id_planta AND moldes.id_vitola = vitolas.id_vitola
                         AND moldes.id_figura = figura_tipos.id_figura AND CONCAT(figura_tipos.nombre_figura,"  ",vitolas.vitola)= pa_tipo_moldes );
                        
                         if pa_estado_moldes = "Buenos" then
                        
                          
                                UPDATE moldes SET moldes.bueno = moldes.bueno - pa_cantidad  , moldes.total = moldes.total - pa_cantidad ,
                                moldes.bodega = moldes.bodega - pa_cantidad WHERE  moldes.id_molde = otra_planta;
                                
                                SELECT "si se puede";
                 ELSE 
                      if  pa_estado_moldes = "Irregulares" then 
                                
                               
                                UPDATE moldes SET moldes.irregulares = moldes.irregulares - pa_cantidad  , moldes.total = moldes.total - pa_cantidad ,
                                moldes.bodega = moldes.bodega - pa_cantidad WHERE  moldes.id_molde = otra_planta;
                                
                                 SELECT "si se puede";
                         ELSE
                                     SELECT "no se puede"; 
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
