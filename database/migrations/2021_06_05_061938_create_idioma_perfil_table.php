<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdiomaPerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idioma_perfil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_idioma')->unique();
            $table->unsignedBigInteger('id_perfil')->unique();
            $table->timestamps();

            $table->foreign('id_idioma')->references('id')->on('idioma');
            $table->foreign('id_perfil')->references('id')->on('perfil')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('idioma_perfil');
    }
}
