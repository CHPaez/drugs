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
            $table->foreignId('Modulos_id')->unique()->constrained()->onDelete('cascade');
            $table->integer('Read')->nullable();
            $table->integer('Update')->nullable();
            $table->integer('Delete')->nullable();
            $table->integer('Create')->nullable();
            $table->integer('Estado')->nullable();
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
