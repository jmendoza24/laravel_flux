<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('nombre_corto');
            $table->string('calle');
            $table->integer('numero');
            $table->integer('pais');
            $table->integer('estado');
            $table->integer('municipio');
            $table->string('cp');
            $table->integer('id_proveedor');
            $table->string('terminopago');
            $table->string('compra_nombre');
            $table->string('compra_telefono');
            $table->string('correo_compra');
            $table->string('recepcion_nombre');
            $table->string('recepcion_telefono');
            $table->string('recepcion_correo');
            $table->string('fac_nombre');
            $table->string('fac_calle');
            $table->integer('fac_numero');
            $table->integer('fac_estado');
            $table->integer('fac_pais');
            $table->integer('fac_cp');
            $table->string('doc_nombre');
            $table->string('doc_correo');
            $table->integer('imp_factura');
            $table->integer('imp_porcentaje');
            $table->integer('imp_nocertificado');
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
        Schema::drop('clientes');
    }
}
