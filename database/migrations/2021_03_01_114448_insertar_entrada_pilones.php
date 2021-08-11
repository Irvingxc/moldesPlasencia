<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertarEntradaPilones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `insertar_entrada_pilon`');
    
        DB::unprepared('
       
        CREATE  PROCEDURE `insertar_entrada_pilon`(
            IN `pa_nombre_tabaco_entrada` VARCHAR(50),
            IN `pa_variedad` VARCHAR(50),
            IN `pa_finca` VARCHAR(50),
            IN `pa_id_pilon_entrada` VARCHAR(50),
            IN `pa_fecha_entrada_pilon` DATE,
            IN `pa_tiempo_adelanto_entrada` VARCHAR(50),
            IN `pa_fecha_estimada_salida` DATE,
            IN `pa_cantidad_lbs_entrada` VARCHAR(50)
        )
       
        BEGIN
        
            DECLARE vl_total DECIMAL(10,2);
            DECLARE bl_id_tabaco INT;
            DECLARE bl_id_pilon_activo INT;
        
            INSERT INTO entrada_pilones(nombre_tabaco,variedad,finca, numero_pilon, fecha_entrada_pilon,tiempo_adelanto_pilon,fecha_estimada_salida,cantidad_lbs)
            VALUES (pa_nombre_tabaco_entrada,pa_variedad,pa_finca,pa_id_pilon_entrada, pa_fecha_entrada_pilon,pa_tiempo_adelanto_entrada,pa_fecha_estimada_salida,
                    pa_cantidad_lbs_entrada);
            SELECT "Guardado correctamente",1;
        
        
            UPDATE `1-pilon_actividad` SET activo = 1, `1-pilon_actividad`.cantidad_libras = `1-pilon_actividad`.cantidad_libras + pa_cantidad_lbs_entrada, variedad = pa_variedad,
                    finca = pa_finca, us_cre =  now(), fecha_activo = NOW() WHERE  `1-pilon_actividad`.id_pilon = pa_id_pilon_entrada;
                                               
        
                   SET bl_id_tabaco = (SELECT clase_tabaco.id_tabaco FROM clase_tabaco WHERE clase_tabaco.nombre_tabaco = pa_nombre_tabaco_entrada);
                   
                   
                   SET bl_id_pilon_activo = (SELECT `1-pilon_actividad`.id FROM `1-pilon_actividad` WHERE `1-pilon_actividad`.id_pilon = pa_id_pilon_entrada);
                  
              if EXISTS(SELECT * FROM `detalles_tabaco_en_pilon` WHERE `detalles_tabaco_en_pilon`.id_pilon_activo = bl_id_pilon_activo AND id_tabaco = bl_id_tabaco ) then
                   
                      UPDATE `detalles_tabaco_en_pilon` SET id_tabaco = bl_id_tabaco, libras = libras + pa_cantidad_lbs_entrada, id_pilon_activo = bl_id_pilon_activo WHERE `detalles_tabaco_en_pilon`.id_pilon_activo = bl_id_pilon_activo AND `detalles_tabaco_en_pilon`.id_tabaco = bl_id_tabaco;
                ELSE
                
                INSERT INTO `detalles_tabaco_en_pilon`(id_tabaco,id_pilon_activo,libras,dias_en_reposo) VALUES(bl_id_tabaco,bl_id_pilon_activo,pa_cantidad_lbs_entrada,0);
        
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
