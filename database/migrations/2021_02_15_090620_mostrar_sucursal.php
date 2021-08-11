<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MostrarSucursal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `mostrar_sucursal`');
    
        DB::unprepared('

       
            CREATE  PROCEDURE `mostrar_sucursal`()
            
            BEGIN
                    
                        SELECT plantas.id_planta,plantas.nombre_planta FROM plantas;
                        
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
