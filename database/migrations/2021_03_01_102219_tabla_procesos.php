<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaProcesos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_procesos', function (Blueprint $table) {
            $table->bigIncrements('id_tabla_proceso')->required();
            $table->date('fecha_proceso')->required();
            $table->integer('id_remision')->required();
            $table->string('entradas_salidas',30)->required();
            $table->string('nombre_tabaco', 50);
            $table->decimal('subtotal',10,2)->required();
            $table->decimal('tatal_libras',10,2)->required();
            $table->decimal('total_remision',10,2)->required();
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
         Schema::dropIfExists('tabla_procesos');
   
    }
}
