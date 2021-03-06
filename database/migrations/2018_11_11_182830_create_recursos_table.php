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
        });

        Schema::create('recursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->integer('año');
            $table->string('thumb')->nullable();
            $table->integer('autor_id');
            $table->integer('biblioteca_id');
            $table->foreign('autor_id')->references('id')->on('autors')->onDelete('cascade');
            $table->string('genero');
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas');
            $table->boolean('versionAlt');
            $table->string('categoria');
            $table->string('principal');
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
