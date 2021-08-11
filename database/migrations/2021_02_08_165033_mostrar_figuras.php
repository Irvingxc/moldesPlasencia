<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MostrarFiguras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `mostrar_figura_tipos`');
        
      DB::unprepared('  
            CREATE PROCEDURE `mostrar_figura_tipos`( IN `pa_id_planta` INT )
       
        BEGIN
        
            SELECT figura_tipos.id_figura, figura_tipos.nombre_figura FROM figura_tipos 
            WHERE figura_tipos.id_planta = pa_id_planta;
            
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
       
    }
}
