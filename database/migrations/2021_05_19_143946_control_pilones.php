<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ControlPilones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_pilones', function (Blueprint $table) {
            $table->bigIncrements('id_control_pilones')->required();
            $table->string('nombre_tabaco',100)->required();
            $table->date('fecha_entrada_pilon')->required();
            $table->string('numero_pilon',50)->required();
            $table->decimal('entrada_tabaco_pilon',8,2)->nullable();
            $table->decimal('salida_tabaco_pilon',8,2)->nullable();
            $table->decimal('total_actual',8,2)->nullable();
            $table->decimal('Total',8,2)->required();
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
        Schema::dropIfExists('control_pilones');
   
    }
}
