<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicativosCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicativosciudades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('IcCiudad')->unsigned();
            $table->integer('IcIndicativo');
            $table->timestamps();

            $table->foreign('IcCiudad')->references('Id')->on('ciudades')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicativosciudades');
    }
}
