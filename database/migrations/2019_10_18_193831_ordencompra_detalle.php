<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdencompraDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordencompra_detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_orden');
            $table->integer('incremento');
            $table->integer('producto');
            $table->integer('dibujo');
            $table->date('cantidad');
            $table->decimal('costo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('ordencompra_detalle');
    }
}

