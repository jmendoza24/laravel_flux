<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_acero');
            $table->integer('forma');
            $table->integer('grado');
            $table->string('espesor')->nullable();
            $table->string('ancho')->nullable();
            $table->string('altura')->nullable();
            $table->string('peso_distancia')->nullable();
            $table->string('wide')->nullable();
            $table->string('lenght')->nullable();
            $table->string('weight')->nullable();
            $table->string('precio')->nullable();
            $table->string('peso_pieza')->nullable();
            $table->string('precion_nacional')->nullable();
            $table->date('fecha')->nullable();
            $table->string('num_orden')->nullable();
            $table->integer('id_proveedor')->nullable();
            $table->string('molino')->nullable();
            $table->string('pais')->nullable();
            $table->integer('colada_numero')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->string('num_embarque')->nullable();
            $table->text('certificado_mat')->nullable();
            $table->text('ordencompra')->nullable();
            $table->text('remisionprov')->nullable();
            $table->text('reporteprod')->nullable();
            $table->text('resolucionprod')->nullable();
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
        Schema::drop('materiales');
    }
}
