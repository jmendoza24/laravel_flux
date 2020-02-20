<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleteFraccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flete_fracciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_trafico'); 
            $table->integer('id_detalle'); 
            $table->string('fraccion_mx')->nullable();
            $table->string('fraccion_us')->nullable();  
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
        Schema::dropIfExists('flete_fracciones');
    }
}
