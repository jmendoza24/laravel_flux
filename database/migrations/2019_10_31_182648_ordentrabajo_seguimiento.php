<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdentrabajoSeguimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('ordentrabajo_seguimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_orden');
            $table->integer('id_detalle');
            $table->integer('id_producto');
            $table->integer('id_proceso');
            $table->integer('id_subproceso');
            $table->date('fecha_inicio')->nullable();
            $table->string('foto')->nullable();
            $table->integer('dias')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('ordentrabajo_seguimiento');
    }
}
