<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->increments('iddetalle_ingreso');
            $table->integer('cantidad');
            $table->float('precio_compra',10,2);
            $table->float('precio_venta',10,2);
            $table->integer('idingreso')->nullable()->unsigned();
            $table->foreign('idingreso')->references('idingreso')->on('ingresos');
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
        Schema::dropIfExists('detalle_ingresos');
    }
}
