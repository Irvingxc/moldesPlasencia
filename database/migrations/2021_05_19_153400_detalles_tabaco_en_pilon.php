<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetallesTabacoEnPilon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_tabaco_en_pilon', function (Blueprint $table) {
            $table->Increments('id')->required();
            $table->integer('id_tabaco')->required();
            $table->integer('id_pilon_activo')->required();
            $table->decimal('libras',10,2)->required();
            $table->integer('dias_en_reposo')->required();
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
        Schema::dropIfExists('detalles_tabaco_en_pilon');
    }
}
