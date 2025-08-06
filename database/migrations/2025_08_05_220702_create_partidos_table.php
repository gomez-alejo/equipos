<?php

// database/migrations/2024_01_01_000003_create_partidos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_local_id')->constrained('equipos');
            $table->foreignId('equipo_visitante_id')->constrained('equipos');
            $table->datetime('fecha');
            $table->integer('goles_local')->default(0);
            $table->integer('goles_visitante')->default(0);
            $table->enum('estado', ['programado', 'en_curso', 'finalizado'])->default('programado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partidos');
    }
};
