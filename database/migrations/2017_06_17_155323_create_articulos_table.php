<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('idarticulo');

            $table->string('codigo');
            $table->string ('nombre');
            $table->integer('stock');
            $table->string('descripcion');
            $table->string('imagen')->nullable()->unsigned();
            $table->string('estado');
            $table->integer('idcategoria')->nullable()->unsigned();
            $table->foreign('idcategoria')->references('idcategoria')->on('categorias');
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
        Schema::dropIfExists('articulos');
    }
}
