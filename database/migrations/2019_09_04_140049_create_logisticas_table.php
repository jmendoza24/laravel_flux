<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogisticasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logisticas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto');
            $table->string('telefono_log')->nullable();
            $table->string('correo_log')->nullable();
            $table->integer('pais_log')->nullable();
            $table->integer('estado_log')->nullable();
            $table->string('municipio_log')->nullable();
            $table->string('calle_log')->nullable();
            $table->integer('numero_log')->nullable();
            $table->string('cp_log')->nullable();
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
        Schema::drop('logisticas');
    }
}
