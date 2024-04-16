<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrogueriasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droguerias', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->bigInteger('DrTipoDrogueria')->unsigned();
            $table->bigInteger('DrCodigo');
            $table->string('DrNombre');
            $table->bigInteger('DrTipoIdentificacion')->unsigned();
            $table->bigInteger('DrIdentificacion');
            $table->bigInteger('DrCiudad')->unsigned();
            $table->string('DrDireccion');
            $table->timestamps();

            $table->foreign('DrTipoDrogueria')->references('Id')->on('tiposdroguerias')->onDelete('no action')->onUpdate('no action');
            $table->foreign('DrTipoIdentificacion')->references('Id')->on('tiposidentificaciones')->onDelete('no action')->onUpdate('no action');
            $table->foreign('DrCiudad')->references('Id')->on('ciudades')->onDelete('no action')->onUpdate('no action');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('droguerias');
    }
}
