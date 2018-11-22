<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFisicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fisicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('copias');
            $table->integer('unidadesDisponibles');
            $table->integer('prestamosRealizados');
            $table->timestamps();
            $table->morphs('linkable');
        });
        Schema::create('digitals', function (Blueprint $table) {
            $table->increments('id');
            $table->float('peso');
            $table->string('path');
            $table->string('formato');
            $table->timestamps();
            $table->morphs('linkable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fisicos');
        Schema::dropIfExists('digitals');
    }
}
