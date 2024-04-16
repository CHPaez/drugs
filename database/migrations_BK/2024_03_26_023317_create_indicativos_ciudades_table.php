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
        Schema::create('indicativos_ciudades', function (Blueprint $table) {
            $table->bigIncrements('Icid');
            $table->char('IcCiudad', 5);
            $table->integer('IcIndicativo');
            $table->timestamps();

            $table->foreign('IcCiudad')->references('CiuId')->on('ciudades')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicativos_ciudades');
    }
}
