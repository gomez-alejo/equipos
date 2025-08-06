<?php

// app/Models/Jugador.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jugador extends Model
{
    protected $table = 'jugadores';
    
    protected $fillable = [
        'nombre',
        'numero',
        'equipo_id'
    ];

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }

    public function goles(): HasMany
    {
        return $this->hasMany(Gol::class);
    }

    public function tarjetas(): HasMany
    {
        return $this->hasMany(Tarjeta::class);
    }

    // Obtener estadísticas del jugador
    public function getEstadisticas()
    {
        return [
            'goles' => $this->goles()->count(),
            'tarjetas_amarillas' => $this->tarjetas()->where('tipo', 'amarilla')->count(),
            'tarjetas_rojas' => $this->tarjetas()->where('tipo', 'roja')->count(),
        ];
    }
}