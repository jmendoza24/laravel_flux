<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProveedoresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->text('direccion');
            $table->integer('pais');
            $table->integer('estado');
            $table->integer('municipio');
            $table->string('cp');
            $table->string('rfc');
            $table->string('credito');
            $table->string('telefono');
            $table->string('correo');
            $table->string('puesto');
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
        Schema::drop('proveedores');
    }
}
