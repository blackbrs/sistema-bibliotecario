<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string('nDepartamento');
        });

        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dep_id');
            $table->foreign('dep_id')->references('id')->on('departamentos');
            $table->string('nMunicipio');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->date('nacimiento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('Npadres')->nullable();
            $table->boolean('miembroActivo')->nullable();
            $table->boolean('penitencia')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->integer('biblioteca_id')->nullable();
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas');
            $table->rememberToken();
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
        Schema::dropIfExists('departamentos');
        Schema::dropIfExists('municipios');
        Schema::dropIfExists('users');
    }
}
