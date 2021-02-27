<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocioClubesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_clubes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_socio')->unsigned();
            $table->integer('id_clube')->unsigned();
            $table->foreign('id_socio')
                ->references('id')->on('socios')
                ->onDelete('cascade');
            $table->foreign('id_clube')
                ->references('id')->on('clubes')
                ->onDelete('cascade');
                
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
        Schema::dropIfExists('socio_clubes');
    }
}
