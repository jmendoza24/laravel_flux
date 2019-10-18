<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdenesComprasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cotizacion');
            $table->integer('cliente');
            $table->string('notas');
            $table->integer('income');
            $table->integer('termino_pago');
            $table->integer('vendedor');
            $table->date('fecha');
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
        Schema::drop('ordenes_compras');
    }
}
