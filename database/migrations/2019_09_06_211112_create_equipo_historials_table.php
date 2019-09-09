<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipoHistorialsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_historials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->integer('historial_tipo');
            $table->date('fecha');
            $table->string('responsable');
            $table->string('descripcion');
            $table->date('vencimiento');
            $table->integer('activo');
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
        Schema::drop('equipo_historials');
    }
}
