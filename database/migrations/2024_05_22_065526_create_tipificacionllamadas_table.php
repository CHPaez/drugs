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
            $table->bigInteger('TlUser');
            $table->bigInteger('TlCodigoAsociado');
            $table->bigInteger('TlDrogueria');
            $table->bigInteger('TlPersonaContacto');
            $table->bigInteger('TlTelefonoContacto');
            $table->bigInteger('TlTelefonoWhatsapp');
            $table->bigInteger('TlPrograma');
            $table->bigInteger('TlCausal');
            $table->bigInteger('TlEstadoTipificacion');
            $table->string('TIObservaciones');
            $table->timestamps();


            $table->foreign('TlUser')->references('Id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->foreign('TlDrogueria')->references('Id')->on('droguerias')->onDelete('no action')->onUpdate('no action');
            $table->foreign('TlPersonaContacto')->references('Id')->on('personas')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tipificacionllamadas');
    }
}
