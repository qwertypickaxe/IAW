<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->smallInteger('codigo_pelicula')->primary();
            $table->string('titulo',100)->default('');
            $table->string('año',100)->default('');
            $table->string('duracion',50)->default('');
            $table->smallInteger('codigo_genero');
            $table->smallInteger('id_sinopsis');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
