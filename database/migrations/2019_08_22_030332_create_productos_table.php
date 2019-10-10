<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion')->nullable();
            $table->integer('familia')->nullable();
            $table->integer('id_empresa')->nullable();
            $table->integer('id_acero')->nullable();
            $table->integer('id_estructura')->nullable();
            $table->decimal('espesor',20,3)->nullable();
            $table->decimal('ancho',20,3)->nullable();
            $table->integer('tiempo_entrega')->nullable();
            $table->decimal('costo_material',20,3)->nullable();
            $table->decimal('peso',20,3)->nullable();
            $table->decimal('costo_produccion',20,3)->nullable();
            $table->integer('planta')->nullable();
            $table->string('numero_parte')->nullable();
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
        Schema::drop('productos');
    }
}
