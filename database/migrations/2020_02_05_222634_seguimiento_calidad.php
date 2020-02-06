<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeguimientoCalidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_calidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_orden');
            $table->integer('id_detalle');
            $table->integer('id_proceso')->nullable();
            $table->string('comentario')->nullable();
            $table->string('estatus')->nullable();
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
         Schema::drop('seguimiento_calidad');
    }
}
