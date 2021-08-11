<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TraerIdFigura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `traer_id_figura`');
  
        DB::unprepared('
        CREATE PROCEDURE `traer_id_figura`(
            IN `pa_id_planta` INT,
            IN `pa_figura` VARCHAR(50)
        )
     
        BEGIN
         SELECT id_figura FROM figura_tipos where figura_tipos.nombre_figura = pa_figura AND id_planta = pa_id_planta;
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
