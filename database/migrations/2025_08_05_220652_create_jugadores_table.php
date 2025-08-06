<?php

// database/migrations/2024_01_01_000002_create_jugadores_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('numero');
            $table->foreignId('equipo_id')->constrained('equipos')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['equipo_id', 'numero']); // Un número único por equipo
        });
    }

    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
};
