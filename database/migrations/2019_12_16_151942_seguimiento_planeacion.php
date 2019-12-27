<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeguimientoPlaneacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_planeacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_orden');
            $table->integer('id_detalle');
            $table->integer('id_planta');
            $table->integer('st_lanzamiento');
            $table->integer('st_informacion');
            $table->integer('st_pregunta');
            $table->integer('st_pintura');
            $table->integer('st_prog_corte');
            $table->integer('st_tacm');
            $table->string('lanzamiento');
            $table->string('informacion');
            $table->string('pregunta');
            $table->string('pintura');
            $table->string('prog_corte');
            $table->string('tacm');
            $table->string('fecha_estimado_termino');
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
        Schema::drop('seguimiento_planeacion');
    }
}
