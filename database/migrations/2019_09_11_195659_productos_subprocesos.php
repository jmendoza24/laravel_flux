<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductosSubprocesos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('productos_subprocesos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto');
            $table->integer('id_proceso');
            $table->integer('id_subproceso');
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
       Schema::drop('productos_subprocesos');
    }
}
