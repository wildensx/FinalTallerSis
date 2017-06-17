<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('idingreso');
            $table->string('tipo_comprobante');
            $table->string('serie_comprobante');
            $table->string('num_comprobante');
            $table->datetime('fecha_hora');
            $table->float('impuesto');
            $table->string('estado');
            $table->integer('idproveedor')->nullable()->unsigned();
            $table->foreign('idproveedor')->references('idpersona')->on('personas');
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
        Schema::dropIfExists('ingresos');
    }
}
