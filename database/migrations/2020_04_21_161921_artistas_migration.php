<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArtistasMigration extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistas', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre');
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->string('foto')->nullable();
            $table->text('biografia');
            $table->string('email',100)->unique();
            $table->string('password');
            $table->foreignId('genero_id')->constrained();
            $table->integer('status'); 
            $table->bigInteger('tipo_usuario')->unsigned();
            $table->foreign('tipo_usuario')->references('id')->on('tipos_usuarios') ;
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artistas');
    }
}
