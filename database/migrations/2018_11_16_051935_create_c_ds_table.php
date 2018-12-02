<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCDsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nPistas');
            $table->integer('duracion');
            $table->integer('recurso_id');
            $table->foreign('recurso_id')->references('id')->on('recursos')->onDelete('cascade');
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cds');
    }
}
