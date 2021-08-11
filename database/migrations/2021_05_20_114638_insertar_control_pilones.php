<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarControlPilones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_control_pilones`');
    
        DB::unprepared('
        
        CREATE PROCEDURE `insertar_control_pilones`(
            IN `pa_nombre_tabaco` VARCHAR(100),
            IN `pa_fecha_entrada_pilon` DATE,
            IN `pa_numero_pilon` VARCHAR(50),
            IN `pa_entrada_tabaco_pilon` DECIMAL(8,2),
            IN `pa_salida_tabaco_pilon` DECIMAL(8,2),
            IN `pa_total_actual` DECIMAL(8,2),
            IN `pa_total` DECIMAL(8,2)
        )
       
        BEGIN
        
            DECLARE vl_total DECIMAL(10,2);
            DECLARE bl_id_tabaco INT;
            DECLARE bl_id_pilon_activo INT;
            
            INSERT INTO control_pilones (nombre_tabaco,fecha_entrada_pilon,
                                         numero_pilon,entrada_tabaco_pilon,salida_tabaco_pilon,total_actual,total) VALUES(pa_nombre_tabaco
                                                                                                                         ,pa_fecha_entrada_pilon,pa_numero_pilon,pa_entrada_tabaco_pilon,pa_salida_tabaco_pilon,pa_total_actual,pa_total);
            SELECT "Guardado correctamente",1;
            
            UPDATE `1-pilon_actividad` SET activo = 1, `1-pilon_actividad`.cantidad_libras = pa_total,
                                               us_cre =  now(), fecha_activo = NOW()
                                               WHERE  `1-pilon_actividad`.id_pilon = pa_numero_pilon;
           
            SET bl_id_tabaco = (SELECT clase_tabaco.id_tabaco FROM clase_tabaco WHERE clase_tabaco.nombre_tabaco = pa_nombre_tabaco);
                   
                   
                   SET bl_id_pilon_activo = (SELECT `1-pilon_actividad`.id FROM `1-pilon_actividad` WHERE `1-pilon_actividad`.id_pilon = pa_numero_pilon);
                  
              if EXISTS(SELECT * FROM `detalles_tabaco_en_pilon` WHERE `detalles_tabaco_en_pilon`.id_pilon_activo = bl_id_pilon_activo AND id_tabaco = bl_id_tabaco ) then
                   if pa_entrada_tabaco_pilon > 0.00 then            
                      UPDATE `detalles_tabaco_en_pilon` SET  libras = libras + pa_entrada_tabaco_pilon  WHERE `detalles_tabaco_en_pilon`.id_pilon_activo = bl_id_pilon_activo AND `detalles_tabaco_en_pilon`.id_tabaco = bl_id_tabaco;
                        ELSE if pa_salida_tabaco_pilon > 0.00 then 
                        UPDATE `detalles_tabaco_en_pilon` SET  libras = libras - pa_salida_tabaco_pilon WHERE `detalles_tabaco_en_pilon`.id_pilon_activo = bl_id_pilon_activo AND `detalles_tabaco_en_pilon`.id_tabaco = bl_id_tabaco;
                        END if;
                        END if;
                
                
                ELSE
                
                INSERT INTO `detalles_tabaco_en_pilon`(id_tabaco,id_pilon_activo,libras,dias_en_reposo) VALUES(bl_id_tabaco,bl_id_pilon_activo,pa_entrada_tabaco_pilon,0);
        
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
