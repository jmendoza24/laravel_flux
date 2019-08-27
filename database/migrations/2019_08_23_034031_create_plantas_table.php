<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlantasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->integer('id_planta')->nullable();
            $table->text('direccion')->nullable();
            $table->text('colonia')->nullable();
            $table->integer('municipio')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('pais')->nullable();
            $table->text('cp')->nullable();
            $table->text('rfc')->nullable();
            $table->text('telefono')->nullable();
            $table->text('correo')->nullable();
            $table->text('puesto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plantas');
    }
}
