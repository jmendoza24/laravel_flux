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
            $table->string('notas')->nullable();
            $table->integer('income')->nullable();
            $table->integer('termino_pago')->nullable();
            $table->integer('vendedor');
            $table->date('fecha');
            $table->integer('tipo')->nullable();
            $table->string('orden_compra')->nullable();
            $table->string('lugar')->nullable();
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
