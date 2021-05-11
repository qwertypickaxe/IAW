<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            
            $table->smallInteger('id')->primary();
            $table->string('usuario',100)->default('');
            $table->string('password',100)->default('');
            $table->string('nombre',100)->default('');
            $table->string('email',200)->default('');
            $table->enum('rol',['guest','user','admin']);
            $table->string('img',30)->default('');

            //$table->foreign('id')->references('id')->on('personas');
        //    $table->id();
        //    $table->timestamps();
        });



        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
