<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('idpersona');
            $table->string('tipo_persona');
            $table->string('nombre');
            $table->string('tipo_documento');
            $table->string('num_documento');
            $table->string('direccion')->nullable()->default(null);
            $table->string('telefono')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
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
        Schema::dropIfExists('personas');
    }
}
