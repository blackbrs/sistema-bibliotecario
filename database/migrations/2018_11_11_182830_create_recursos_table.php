<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->timestamps();
        });

        Schema::create('recursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->integer('autor_id')->nullable();
            $table->string('thumb');
            //$table->integer('genero_id')->nullable();
            $table->integer('biblioteca_id')->nullable();
            $table->foreign('autor_id')->references('id')->on('autors');
            //$table->foreign('genero_id')->references('id')->on('generos');
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas');
            $table->boolean('digital');
            $table->string('categoria');
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
        Schema::dropIfExists('autors');
        Schema::dropIfExists('recursos');
        
    }
}
