<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->date('fecha_creacion');
            $table->date('fecha_inicio');
            $table->time('hora_inicio');
            $table->string('calle');
            $table->string('colonia'); 
            $table->foreignId('estado_id')->constrained();
            $table->foreignId('municipio_id')->constrained();
            $table->string('nombre_locacion'); 
            $table->foreignId('artista_id')->constrained();
            $table->integer('status');
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
        Schema::dropIfExists('eventos');
    }
}
