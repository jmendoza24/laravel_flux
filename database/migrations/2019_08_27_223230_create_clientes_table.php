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
            $table->string('calle')->nullable();
            $table->integer('numero')->nullable();
            $table->integer('pais')->nullable();
            $table->integer('estado')->nullable();
            $table->string('municipio')->nullable();
            $table->string('cp')->nullable();
            $table->integer('id_proveedor')->nullable();
            $table->integer('linea')->nullable();
            $table->string('terminopago')->nullable();
            $table->string('compra_nombre')->nullable();
            $table->string('compra_telefono')->nullable();
            $table->string('correo_compra')->nullable();
            $table->string('recepcion_nombre')->nullable();
            $table->string('recepcion_telefono')->nullable();
            $table->string('recepcion_correo')->nullable();
            $table->string('fac_nombre')->nullable();
            $table->string('fac_calle')->nullable();
            $table->integer('fac_numero')->nullable();
            $table->integer('fac_estado')->nullable();
            $table->integer('fac_municipio')->nullable();
            $table->integer('fac_pais')->nullable();
            $table->integer('fac_cp')->nullable();
            $table->string('doc_nombre')->nullable();
            $table->string('doc_correo')->nullable();
            $table->string('imp_factura')->nullable();
            $table->string('log_nombre')->nullable();
            $table->string('log_correo')->nullable();
            $table->string('imp_porcentaje')->nullable();
            $table->integer('imp_nocertificado')->nullable();
            $table->text('nota_marcado')->nullable();
            $table->text('nota_embarques')->nullable();

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
