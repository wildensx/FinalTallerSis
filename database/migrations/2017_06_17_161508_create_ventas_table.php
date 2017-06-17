<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('idventa');
            $table->string('tipo_comprobante');
            $table->string('serie_comprobante');
            $table->string('num_comprobante');
            $table->datetime('fecha_hora');
            $table->float('impuesto');
            $table->string('estado');
            $table->float('total_venta');
            $table->integer('idcliente')->nullable()->unsigned();
            $table->foreign('idcliente')->references('idpersona')->on('personas');
            //$table->integer('id')->nullable()->unsigned();
            //$table->foreign('id')->references('id')->on('user');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
