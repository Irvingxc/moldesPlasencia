<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaNotificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('notificaciones', function (Blueprint $table) {
            $table->increments('id_notificacion');
            $table->string('tipo',50);
            $table->string('descripcion');
            $table->integer('activo');
            $table->string('para',50);
            $table->integer('id_planta');
        });
            
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificaciones');
    }
}
