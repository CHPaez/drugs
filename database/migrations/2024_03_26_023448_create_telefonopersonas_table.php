<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonoPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonopersonas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('TePersona')->unsigned();
            $table->bigInteger('TeTipo')->unsigned();;
            $table->bigInteger('TeIndicativo')->unsigned();
            $table->bigInteger('TeTelefono');
            $table->timestamps();

            $table->foreign('TePersona')->references('Id')->on('personas')->onDelete('no action')->onUpdate('no action');
            $table->foreign('TeTipo')->references('id')->on('tipostelefonos')->onDelete('no action')->onUpdate('no action');
            $table->foreign('TeIndicativo')->references('id')->on('indicativosciudades')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefonopersonas');
    }
}
