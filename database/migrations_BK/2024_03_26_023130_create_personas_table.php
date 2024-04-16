<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('PeId');
            $table->bigInteger('PeTipoAsociado')->unsigned();
            $table->bigInteger('PeTipoIdentificacion')->unsigned();
            $table->bigInteger('PeNumeroIdentificacion');
            $table->char('PeGenero', 1);
            $table->string('PeNombre', 30);
            $table->string('PeApellido', 30);
            $table->string('PeCorreo', 60)->nullable();
            $table->timestamps();

            $table->foreign('PeGenero')->references('Geid')->on('generos')->onDelete('no action')->onUpdate('no action');
            $table->foreign('PeTipoAsociado')->references('Taid')->on('TiposAsociados')->onDelete('no action')->onUpdate('no action');
            $table->foreign('PeTipoIdentificacion')->references('Tiid')->on('TiposIdentificaciones')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::dropIfExists('personas');

    Schema::table('tiposidentificaciones', function (Blueprint $table) {
        $table->dropIndex(['Tiid']);
    });
}

}
