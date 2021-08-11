<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ControlTemperatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('control_temperatura', function (Blueprint $table) {
             $table->bigIncrements('id_temperatura')->required();
             $table->integer('id_pilones')->required();
             $table->integer('temperatura')->required();
             $table->date('fecha_revision')->required();      
             $table->string('mantenimiento',20)->required();
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
        Schema::dropIfExists('control_temperatura');
   
    }
}
