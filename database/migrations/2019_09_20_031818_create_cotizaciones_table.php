<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCotizacionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto');
            $table->date('fecha');
            $table->integer('cliente');
            $table->string('numero_parte');
            $table->text('descripcion');
            $table->integer('dibujo');
            $table->integer('cantidad');
            $table->decimal('costo');
            $table->decimal('precio_usd');
            $table->integer('id_notas');
            $table->integer('tiempo');
            $table->integer('income');
            $table->string('termino_pago');
            $table->integer('vendedor');
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
        Schema::drop('cotizaciones');
    }
}
