<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscritosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscritos', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->bigInteger('InTipificacion');
            $table->bigInteger('InPersonaInscrita');
            $table->date('InFechaPrograma');
            $table->bigInteger('InHorario');
            $table->bigInteger('InModalidad');
            $table->bigInteger('InCiudad');
            $table->bigInteger('InDatosAdicionales');
            $table->string('InObservaciones');
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
        Schema::drop('inscritos');
    }
}
