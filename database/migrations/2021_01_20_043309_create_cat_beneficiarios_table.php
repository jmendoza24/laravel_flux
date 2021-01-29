<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCatBeneficiariosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_beneficiarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('rfc');
            $table->string('domicilio');
            $table->string('lugar_nac');
            $table->date('fecha_nacimiento');
            $table->integer('parentesco');
            $table->string('porcentage');
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
        Schema::drop('cat_beneficiarios');
    }
}
