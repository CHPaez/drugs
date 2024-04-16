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
        Schema::create('telefono_personas', function (Blueprint $table) {
            $table->bigIncrements('Teid');
            $table->bigInteger('TePersona')->unsigned();
            $table->string('TeTipo', 3);
            $table->bigInteger('TeIndicativo')->unsigned();
            $table->bigInteger('TeTelefono');
            $table->timestamps();

            $table->foreign('TePersona')->references('PeId')->on('personas')->onDelete('no action')->onUpdate('no action');
            $table->foreign('TeTipo')->references('Ttid')->on('tipos_telefonos')->onDelete('no action')->onUpdate('no action');
            $table->foreign('TeIndicativo')->references('Icid')->on('indicativos_ciudades')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefono_personas');
    }
}
