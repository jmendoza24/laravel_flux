<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDatosPersonalesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tel_casa');
            $table->string('tel_celular');
            $table->string('correo');
            $table->string('contacto1_nombre');
            $table->string('contacto1_tel_casa');
            $table->string('contacto1_tel_celular');
            $table->string('contacto1_relacion');
            $table->string('contacto2_nombre');
            $table->string('contacto2_tel_casa');
            $table->string('contacto2_tel_cel');
            $table->string('contaco2_relacion');
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
        Schema::drop('datos_personales');
    }
}
