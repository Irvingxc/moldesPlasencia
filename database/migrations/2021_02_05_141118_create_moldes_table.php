<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoldesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moldes', function (Blueprint $table) {
                $table->increments('id_molde');
                $table->integer('id_planta');
                $table->integer('id_vitola');
                $table->integer('id_figura');
                $table->integer('bueno');
                $table->integer('irregulares')->nullable();
                $table->integer('malos');
                $table->integer('reparacion');
                $table->integer('bodega');
                $table->integer('salon');
                $table->integer('total');
                $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moldes');
    }
}
