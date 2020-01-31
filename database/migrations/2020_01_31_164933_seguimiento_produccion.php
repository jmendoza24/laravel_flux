<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeguimientoProduccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_produccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_orden');
            $table->integer('id_detalle');
            $table->integer('id_proceso')->nullable();
            $table->integer('id_subproceso')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->integer('hora1')->nullable();
            $table->integer('hora2')->nullable();
            $table->integer('hora3')->nullable();
            $table->integer('hora4')->nullable();
            $table->integer('hora5')->nullable();
            $table->integer('hora6')->nullable();
            $table->integer('hora7')->nullable();
            $table->integer('hora8')->nullable();
            $table->integer('hora9')->nullable();
            $table->integer('hora10')->nullable();
            $table->integer('comentario_calidad')->nullable();
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
        Schema::drop('seguimiento_produccion');
    }
}
