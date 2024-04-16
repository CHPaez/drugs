<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipificacionllamadasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipificacionllamadas', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->bigInteger('TlUser')->unsigned();
            $table->bigInteger('TlCodigoAsociado')->unsigned();
            $table->bigInteger('TlDrogueria')->unsigned();
            $table->bigInteger('TlPersona')->unsigned();
            $table->timestamps();

            $table->foreign('TlUser')->references('Id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->foreign('TlCodigoAsociado')->references('Id')->on('asociados')->onDelete('no action')->onUpdate('no action');
            $table->foreign('TlDrogueria')->references('Id')->on('drogueriaspersonas')->onDelete('no action')->onUpdate('no action');
            $table->foreign('TlPersona')->references('Id')->on('personas')->onDelete('no action')->onUpdate('no action');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipificacionllamadas');
    }
} 
