<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalesPlantas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totales_plantas', function (Blueprint $table) {
            $table->string('figura_vitola',50);
            $table->integer('total_bueno');
            $table->integer('total_irregulares');
            $table->integer('total_malo');
            $table->integer('total_bodega');
            $table->integer('total_repacion');
            $table->integer('total_salon');
            $table->integer('total');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('totales_plantas');
    }
}
