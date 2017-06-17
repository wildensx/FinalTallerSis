<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->increments('iddetalle_venta');
            $table->integer('cantidad');
            $table->float('precio_venta');
            $table->float('descuento');
            $table->integer('idventa')->nullable()->unsigned();
            $table->foreign('idventa')->references('idventa')->on('ventas');
            $table->integer('idarticulo')->nullable()->unsigned();
            $table->foreign('idarticulo')->references('idarticulo')->on('articulos');
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
        Schema::dropIfExists('detalle_ventas');
    }
}
