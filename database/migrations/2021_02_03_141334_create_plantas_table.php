<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            $table->integer('id_planta');
            $table->string('nombre_planta',100);
            $table->timestamps();
        });

        DB::unprepared('
        
            INSERT INTO plantas(plantas.id_planta , plantas.nombre_planta) VALUES("1","Paraíso Cigar");
            INSERT INTO plantas(plantas.id_planta ,plantas.nombre_planta) VALUES("2","Morocelí");
            INSERT INTO plantas(plantas.id_planta ,plantas.nombre_planta) VALUES("3","San Marcos");
            INSERT INTO plantas(plantas.id_planta ,plantas.nombre_planta) VALUES("4","Gualiqueme"); 
            INSERT INTO plantas(plantas.id_planta ,plantas.nombre_planta) VALUES("0","Todas las sucursales");
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantas');
    }
}
