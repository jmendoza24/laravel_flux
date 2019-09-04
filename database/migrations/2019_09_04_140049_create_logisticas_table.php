<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogisticasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logisticas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('correo');
            $table->integer('pais');
            $table->integer('estado');
            $table->integer('municipio');
            $table->string('calle');
            $table->integer('numero');
            $table->string('cp');
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
        Schema::drop('logisticas');
    }
}
