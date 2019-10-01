<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductoDibujosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_dibujos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto');
            $table->string('dibujo_nombre');
            $table->string('dibujo');
            $table->date('fecha');
            $table->integer('revision');
            $table->integer('tiempo_entrega');
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
        Schema::drop('producto_dibujos');
    }
}
