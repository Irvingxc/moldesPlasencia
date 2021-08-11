<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RevisionPendientePilon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP procedure if exists `revision_pendiente_pilon`');
    
        DB::unprepared('
        
        CREATE  PROCEDURE `revision_pendiente_pilon`()
        
        BEGIN
            SELECT * FROM control_temperatura WHERE control_temperatura.fecha_revision = DATE_FORMAT(NOW(), "%Y-%m-%d");
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
