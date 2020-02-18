<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TraficoFlete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('traficos_fletes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_trafico');
            $table->string('agencia_mx')->nullable();
            $table->string('no_plataforma')->nullable();
            $table->string('placas')->nullable();
            $table->string('pais_orige')->nullable();
            $table->string('largo')->nullable();
            $table->string('scac')->nullable();
            $table->string('caat')->nullable();
            $table->string('no_referencia')->nullable();
            $table->string('entrada_camion')->nullable();
            $table->string('salida_camion')->nullable();
            $table->string('arancelaria_usa')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->string('tipo_cambio')->nullable();
            $table->string('arancelaria_mx')->nullable();
            $table->date('liberacion_ad_mx')->nullable();
            $table->date('liberacion_ad_usa')->nullable();
            $table->date('entrega_bodega')->nullable();
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
          Schema::drop('traficos_fletes');
    }
}
