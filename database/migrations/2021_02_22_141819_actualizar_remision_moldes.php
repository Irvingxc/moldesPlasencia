<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizarRemisionMoldes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('DROP procedure if exists `actualizar_remision_moldes`');
    
        DB::unprepared('
        CREATE  PROCEDURE `actualizar_remision_moldes`(
            IN `pa_id_remision` INT,
            IN `pa_id_planta` INT,
            IN `pa_estado` VARCHAR(50),
            IN `pa_fivi` VARCHAR(50),
            IN `pa_cantidad` INT,
            IN `pa_id_molde` INT,
            IN `pa_id_planta_recibido` VARCHAR(50),
            IN `nombre_otra_fabrica` VARCHAR(50)
        )
       
        BEGIN
                 
        
        
        
        
                    
                    DECLARE otra_planta INT;
                    DECLARE id_recibida INT;
                    DECLARE id_otra_fabrica INT; 
                    DECLARE fivi VARCHAR(100);
                    DECLARE con INT;
                    DECLARE con2 INT;
                    DECLARE figura_con VARCHAR(50);
                    DECLARE vitola_con VARCHAR(50);
                    DECLARE longitud VARCHAR(50);
                    DECLARE valor_final INT;
                    DECLARE id_figura INT;
                    DECLARE id_vitola INT;			
                    
                    
                    SET fivi = pa_fivi;
                    SET con = 1;
                    SET con2 = 1;
                    SET figura_con = "";
                    SET vitola_con = "";
                    SET longitud= LENGTH(fivi);
                        
                                 
                        while con < LENGTH(fivi) DO
                        
                                    if ( SUBSTRING(fivi,con2,1) = "0" || SUBSTRING(fivi,con2,1) = "1" || SUBSTRING(fivi,con2,1) = "2"
                                    || SUBSTRING(fivi,con2,1) = "3"|| SUBSTRING(fivi,con2,1) = "4"|| SUBSTRING(fivi,con2,1) = "5"
                                    || SUBSTRING(fivi,con2,1) = "6"|| SUBSTRING(fivi,con2,1) = "7"|| SUBSTRING(fivi,con2,1) = "8"|| SUBSTRING(fivi,con2,1) = "9")
                                then
                                    SET con = LENGTH(fivi);
                                        
                                ELSE
                                    SET con = con +1;
                                END if;
                                    SET con2 = con2 + 1;
                        END while ;
                        
                        
                         SET figura_con = SUBSTRING(fivi,1,con2-4); 
                         SET vitola_con = SUBSTRING(fivi,con2-4+3) ;
                         
                    SET id_otra_fabrica = (SELECT  plantas.id_planta FROM plantas WHERE plantas.nombre_planta = nombre_otra_fabrica);
                 SET id_recibida = (SELECT  plantas.id_planta FROM plantas WHERE plantas.nombre_planta = pa_id_planta_recibido);
                 SET otra_planta = (SELECT  moldes.id_molde  FROM moldes, vitolas, figura_tipos WHERE moldes.id_planta = id_recibida AND moldes.id_vitola = vitolas.id_vitola
                 AND moldes.id_figura = figura_tipos.id_figura AND CONCAT(figura_tipos.nombre_figura,"  ",vitolas.vitola)= pa_fivi );
                
                    SELECT id_recibida,otra_planta,figura_con,vitola_con,pa_id_planta_recibido, id_otra_fabrica, pa_fivi;
             
        if EXISTS(SELECT  moldes.id_molde  FROM moldes, vitolas, figura_tipos WHERE moldes.id_planta = id_otra_fabrica AND moldes.id_vitola = vitolas.id_vitola
                 AND moldes.id_figura = figura_tipos.id_figura AND CONCAT(figura_tipos.nombre_figura,"  ",vitolas.vitola)= pa_fivi )  then 		     
                     
                     
                if pa_estado = "Buenos" then
                
                        UPDATE moldes SET moldes.bueno = moldes.bueno + pa_cantidad  , moldes.total = moldes.total + pa_cantidad ,
                        moldes.bodega = moldes.bodega + pa_cantidad WHERE  moldes.id_molde = pa_id_molde;
                        
                        UPDATE moldes SET moldes.bueno = moldes.bueno - pa_cantidad  , moldes.total = moldes.total - pa_cantidad ,
                        moldes.bodega = moldes.bodega - pa_cantidad WHERE  moldes.id_molde = otra_planta;
                        
                        SELECT "si se puede";
                ELSE 
                          if  pa_estado = "Irregulares" then 
                        
                        UPDATE moldes SET moldes.irregulares = moldes.irregulares + pa_cantidad  , moldes.total = moldes.total + pa_cantidad ,
                        moldes.bodega = moldes.bodega + pa_cantidad WHERE  moldes.id_molde = pa_id_molde;
                        
                        
                        UPDATE moldes SET moldes.irregulares = moldes.irregulares - pa_cantidad  , moldes.total = moldes.total - pa_cantidad ,
                        moldes.bodega = moldes.bodega - pa_cantidad WHERE  moldes.id_molde = otra_planta;
                        
                         SELECT "si se puede";
                 ELSE
                             SELECT "no se puede"; 
                 END if; 
                
                 END if;
                 
                         UPDATE remisiones SET remisiones.chequear = 1 WHERE remisiones.id_remision = pa_id_remision;
                         
            
            else
            
                if EXISTS (SELECT vitolas.vitola FROM vitolas WHERE vitolas.vitola = vitola_con AND vitolas.id_planta = id_otra_fabrica)then
                
                SELECT "si existe";
                
                else
                 
                 INSERT INTO vitolas(vitolas.vitola, vitolas.id_planta)VALUES(vitola_con,id_otra_fabrica);
                     
                end if;
                
                
                
                if EXISTS (SELECT figura_tipos.nombre_figura FROM figura_tipos WHERE figura_tipos.nombre_figura = figura_con
                 AND figura_tipos.id_planta = id_otra_fabrica)then
                
                SELECT "si existe";
                
                else
                 
                 INSERT INTO figura_tipos(figura_tipos.nombre_figura, figura_tipos.id_planta)VALUES(figura_con,id_otra_fabrica);
                     
                end if;
                
                
                SET  id_figura = (SELECT figura_tipos.id_figura FROM figura_tipos where figura_tipos.nombre_figura = figura_con AND figura_tipos.id_planta = id_otra_fabrica);
                SET  id_vitola = (SELECT vitolas.id_vitola FROM vitolas where vitolas.vitola = vitola_con AND id_planta = id_otra_fabrica);
                
                
                   if pa_estado = "Buenos" then	 
                   
                         INSERT INTO moldes(moldes.id_planta, moldes.id_vitola, moldes.id_figura,
                       moldes.bueno, moldes.irregulares,moldes.malos, moldes.bodega,moldes.reparacion,moldes.salon, moldes.total)
                       VALUES(id_otra_fabrica, id_vitola,id_figura, pa_cantidad, "0", "0", pa_cantidad, "0", "0", pa_cantidad);
                        SELECT "si se puede";
                        
                         UPDATE moldes SET moldes.bueno = moldes.bueno - pa_cantidad  , moldes.total = moldes.total - pa_cantidad ,
                        moldes.bodega = moldes.bodega - pa_cantidad WHERE  moldes.id_molde = otra_planta;
                        
                    ELSE
                         if pa_estado = "Irregulares" then
                         
                         INSERT INTO moldes(moldes.id_planta, moldes.id_vitola, moldes.id_figura,
                       moldes.bueno, moldes.irregulares,moldes.malos, moldes.bodega,moldes.reparacion,moldes.salon, moldes.total)
                       VALUES(id_otra_fabrica, id_vitola,id_figura, "0", pa_cantidad, "0", pa_cantidad, "0", "0", pa_cantidad);
                    
                    
                     
                        UPDATE moldes SET moldes.irregulares = moldes.irregulares - pa_cantidad  , moldes.total = moldes.total - pa_cantidad ,
                        moldes.bodega = moldes.bodega - pa_cantidad WHERE  moldes.id_molde = otra_planta;
                        
                         SELECT "si se puede";
                         else
                             SELECT "no se puede";
                         END if;
                    END if;	              
            
                 UPDATE remisiones SET remisiones.chequear = 1 WHERE remisiones.id_remision = pa_id_remision;
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
