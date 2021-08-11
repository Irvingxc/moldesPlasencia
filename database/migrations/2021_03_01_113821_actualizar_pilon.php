<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizarPilon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `actualizar_pilon`');
    
        DB::unprepared('
       
        CREATE  PROCEDURE `actualizar_pilon`(
            IN `pa_id_pilon` INT,
            IN `pa_numero_pilon` INT
        )
       
        BEGIN
            if EXISTS (SELECT * FROM pilones WHERE pilones.id_pilon = pa_id_pilon AND pilones.numero_pilon = pa_numero_pilon)
            then
                UPDATE pilones SET
                    pilones.numero_pilon = pa_numero_pilon
        
                WHERE pilones.id_pilon = pa_id_pilon;
                SELECT "Actualizado correctamente",1;
            ELSE
                if EXISTS (SELECT * FROM pilones WHERE pilones.id_pilon != pa_id_pilon AND pilones.numero_pilon = pa_numero_pilon)
                then
                    SELECT "Nombre ya existe",0;
        
                ELSE
                    UPDATE pilones SET
                        pilones.numero_pilon = pa_numero_pilon
        
                    WHERE pilones.id_pilon = pa_id_pilon;
                    SELECT "Actualizado correctamente",1;
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
