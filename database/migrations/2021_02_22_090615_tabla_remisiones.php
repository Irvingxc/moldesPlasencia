<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaRemisiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remisiones', function (Blueprint $table) {
            $table->increments('id_remision');
            $table->integer('id_planta');
            $table->date('fecha');
            $table->string('nombre_fabrica',50);
            $table->string('estado_moldes',50);
            $table->string('tipo_moldes',50);
            $table->integer('cantidad');
            $table->integer('chequear');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remisiones');
    }
}
