<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Plantahoras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planta_horas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_planta');
            $table->integer('id_producto');
            $table->decimal('costo',11,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planta_horas');
    }
}
