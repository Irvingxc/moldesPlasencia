<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MostrarFivi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `mostrar_fivi`');
    
        DB::unprepared('
        CREATE PROCEDURE `mostrar_fivi`()
       
        BEGIN
        
        SELECT DISTINCT(CONCAT(figura_tipos.nombre_figura, "  ", vitolas.vitola) )FROM vitolas,figura_tipos;
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
