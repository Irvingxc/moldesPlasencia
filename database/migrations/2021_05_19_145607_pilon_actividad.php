<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PilonActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('1-pilon_actividad', function (Blueprint $table) {
            $table->Increments('id')->required();
            $table->integer('id_pilon')->required();
            $table->binary('activo')->required();
            $table->decimal('cantidad_libras',10,2)->required();
            $table->string('finca',50)->nullable();
            $table->string('variedad',50)->nullable();
            $table->datetime('us_cre',0)->nullable();
            $table->date('fecha_activo')->nullable();
            $table->date('fecha_inactivo')->nullable();
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
        Schema::dropIfExists('1-pilon_actividad');
    }
}
