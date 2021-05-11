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
            $table->smallInteger('codigo_persona')->primary();
            $table->string('nombre',100)->default('');
            $table->string('apellido',100)->default('');
            $table->string('telefono',50)->default('');
            $table->string('direccion',150)->default('');
            $table->smallInteger('id');
          //  $table->foreign('id')->references('id')->on('usuario');
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
        Schema::dropIfExists('personas');
    }
}
