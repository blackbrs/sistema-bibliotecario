<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('editorial_id');
            $table->foreign('editorial_id')->references('id')->on('editorials')->onDelete('cascade');
            $table->integer('recurso_id');
            $table->foreign('recurso_id')->references('id')->on('recursos')->onDelete('cascade');
            $table->string('volumen');
            $table->string('ISBN', 13);
            $table->integer('paginas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
