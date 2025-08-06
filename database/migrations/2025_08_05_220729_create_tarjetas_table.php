<?php

// database/migrations/2024_01_01_000005_create_tarjetas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jugador_id')->constrained('jugadores');
            $table->foreignId('partido_id')->constrained('partidos');
            $table->enum('tipo', ['amarilla', 'roja']);
            $table->integer('minuto');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tarjetas');
    }
};

