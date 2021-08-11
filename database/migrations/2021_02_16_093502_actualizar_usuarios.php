<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizarUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `actualizar_usuarios`');
    
        DB::unprepared('

        CREATE PROCEDURE `actualizar_usuarios`(
            IN `pa_id_usuario` INT,
            IN `pa_codigo` INT,
            IN `pa_nombre` VARCHAR(50),
            IN `pa_id_planta` INT,
            IN `pa_correo` VARCHAR(50)
        )
        
        BEGIN
                
                UPDATE users 
                SET 
                users.nombre_usuario = pa_nombre, 
                users.correo = pa_correo,
                users.codigo=pa_codigo,
                users.id_planta =  pa_id_planta 
                      
        
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
