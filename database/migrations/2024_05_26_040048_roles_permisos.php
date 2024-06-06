<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolesPermisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Roles_Permisos', function(Blueprint $table){
            $table->id();
            $table->foreignId('Roles_id')->constrained()->onDelete('cascade');
            $table->foreignId('Modulos_id')->constrained()->onDelete('cascade');
            $table->integer('Read');
            $table->integer('Update');
            $table->integer('Delete');
            $table->integer('Create');
            $table->integer('Estado');
            $table->timestamps();

            $table->unique(['Roles_id','Modulos_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Roles_Permisos');
    }
}
