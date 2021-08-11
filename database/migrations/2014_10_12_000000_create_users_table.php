<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_usuario');            
            $table->string('name',50)->required();
            $table->string('email',50)->required(); 
            $table->longText('password')->required();           
            $table->char('id_planta',255)->required();
            $table->string('remember_token')->required();
            $table->integer('codigo')->required();
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
        Schema::dropIfExists('users');
    }
}
