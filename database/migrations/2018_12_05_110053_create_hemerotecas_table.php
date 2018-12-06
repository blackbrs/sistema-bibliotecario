<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHemerotecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hemerotecas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaCreacion');
            $table->string('nombreColeccion');
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
        Schema::dropIfExists('hemerotecas');
    }
}
