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
            $table->morphs('fisLink');
          //$table->morphs('linkable');
            //$table->unsignedInteger("recurso_id")->after('formato');
            //$table->string("recurso_type")->after('recurso_id');
            //$table->index(["recurso_id", "recurso_type"]);
        });
        Schema::create('digitals', function (Blueprint $table) {
            $table->increments('id');
            $table->float('peso');
            $table->string('path');
            $table->string('formato');
            $table->timestamps();
            $table->morphs('digLink');
          //$table->morphs('linkable');
            //$table->unsignedInteger("recurso_id")->nullable()->after('formato');
            //$table->string("recurso_type")->nullable()->after('recurso_id');
            //$table->index(["recurso_id", "recurso_type"]);
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
