<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialLlamadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_llamadas', function (Blueprint $table) {
            $table->bigIncrements('Hlid');
            $table->bigInteger('HlUsuario')->unsigned();
            $table->datetime('HlFechaRegistro');
            $table->timestamps();

            $table->foreign('HlUsuario')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_llamadas');
    }
}
