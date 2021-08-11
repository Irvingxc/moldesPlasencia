<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminarUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `eliminar_usuario`');
    
        DB::unprepared('

        CREATE PROCEDURE `eliminar_usuario`(
            IN `pa_id_usuario` INT
        )
        
        BEGIN
        
        DELETE FROM users 
        WHERE users.id_usuario = pa_id_usuario;
                
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
