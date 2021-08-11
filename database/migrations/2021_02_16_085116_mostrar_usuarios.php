<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MostrarUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `mostrar_usuarios`');

        DB::unprepared('


        CREATE  PROCEDURE `mostrar_usuarios`()

BEGIN

            SELECT  users.id_usuario, plantas.nombre_planta,  users.name, users.email,users.codigo
                               FROM plantas, users WHERE users.id_planta = plantas.id_planta;

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
