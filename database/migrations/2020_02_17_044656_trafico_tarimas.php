<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TraficoTarimas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traficos_tarimas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_trafico');
            $table->string('peso')->nullable();
            $table->string('altura')->nullable();
            $table->string('ancho')->nullable();
            $table->string('largo')->nullable();
            $table->string('pero_tarima')->nullable();
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
        Schema::drop('traficos_tarimas');
    }
} 
