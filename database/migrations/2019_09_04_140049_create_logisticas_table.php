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
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->integer('pais')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('municipio')->nullable();
            $table->string('calle')->nullable();
            $table->integer('numero')->nullable();
            $table->string('cp')->nullable();
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
