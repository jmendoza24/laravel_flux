<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblRhsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_empleado');
            $table->string('nombre');
            $table->text('direccion');
            $table->string('lugar_nacimiento');
            $table->date('fecha_nacimiento');
            $table->integer('grado_escolaridad');
            $table->integer('edo_civil');
            $table->integer('religion');
            $table->string('imss');
            $table->text('doc_imss');
            $table->date('fecha_subida');
            $table->string('curp');
            $table->string('rfc');
            $table->string('identificacion');
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
        Schema::drop('tbl_rhs');
    }
}
