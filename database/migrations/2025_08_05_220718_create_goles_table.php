<?php

// database/migrations/2024_01_01_000004_create_goles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('goles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jugador_id')->constrained('jugadores');
            $table->foreignId('partido_id')->constrained('partidos');
            $table->integer('minuto');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('goles');
    }
};
