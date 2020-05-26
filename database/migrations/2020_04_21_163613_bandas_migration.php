<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BandasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('bandas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('biografia');
            $table->string('foto')->nullable();
            $table->integer('status');
            $table->foreignId('artista_id')->constrained();
            $table->foreignId('genero_id')->constrained();
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
        Schema::dropIfExists('bandas');
    }
}
