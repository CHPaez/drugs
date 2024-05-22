<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrogueriaspersonasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drogueriaspersonas', function (Blueprint $table) {
            $table->bigIncrements('Id');
            			$table->bigInteger('DpAsociado')->unsigned();
            $table->bigInteger('DpDrogueria')->unsigned();
            $table->bigInteger('DpPersona')->unsigned();
$table->bigInteger('DpEstadoPersona')->unsigned();
$table->bigInteger('DpTipoAsociado')->unsigned();
            $table->timestamps();


            $table->foreign('DpAsociado')->references('Id')->on('asociados')->onDelete('no action')->onUpdate('no action');
            $table->foreign('DpDrogueria')->references('Id')->on('droguerias')->onDelete('no action')->onUpdate('no action');
            $table->foreign('DpPersona')->references('Id')->on('personas')->onDelete('no action')->onUpdate('no action');

$table->foreign('DpEstadoPersona')->references('Id')->on('estadospersonas')->onDelete('no action')->onUpdate('no action');

$table->foreign('DpTipoAsociado')->references('Id')->on('tiposasociados')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drogueriaspersonas');
    }
}
