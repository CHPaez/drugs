<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrogueriasPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droguerias_personas', function (Blueprint $table) {
            $table->bigIncrements('DrId');
            $table->bigInteger('DrAsociado')->unsigned(); // Elimina el auto-incremento aquí
            $table->bigInteger('DrPersona')->unsigned();
            $table->integer('DrCodigo');
            $table->string('DrNombre', 60);
            $table->char('DrTipoIdentificacion', 3);
            $table->bigInteger('DrIdentificacion');
            $table->char('DrCiudad', 5);
            $table->string('DrDireccion', 60);
            $table->timestamps();

            $table->foreign('DrAsociado')->references('Asid')->on('asociados')->onDelete('no action')->onUpdate('no action');
            $table->foreign('DrPersona')->references('PeId')->on('personas')->onDelete('no action')->onUpdate('no action');
            $table->foreign('DrCiudad')->references('CiuId')->on('ciudades')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('droguerias_personas');
    }
}
