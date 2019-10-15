<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductoMaterialesforma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         Schema::create('producto_materialesforma', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto');
            $table->integer('forma');
            $table->string('espesor')->nullable();
            $table->string('ancho')->nullable();
            $table->string('altura')->nullable();
            $table->string('peso_distancia')->nullable();
            $table->string('wide')->nullable();
            $table->string('lenght')->nullable();
            $table->string('weight')->nullable();
            $table->string('precio')->nullable();
        });

            
    }
       
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('producto_materialesforma');
    }
}
