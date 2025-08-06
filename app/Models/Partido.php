<?php

// app/Models/Partido.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partido extends Model
{
    protected $fillable = [
        'equipo_local_id',
        'equipo_visitante_id',
        'fecha',
        'goles_local',
        'goles_visitante',
        'estado'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];

    public function equipoLocal(): BelongsTo
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    public function equipoVisitante(): BelongsTo
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    public function goles(): HasMany
    {
        return $this->hasMany(Gol::class);
    }

    public function tarjetas(): HasMany
    {
        return $this->hasMany(Tarjeta::class);
    }

    public function actualizarResultado()
    {
        $this->goles_local = $this->goles()->whereHas('jugador', function($query) {
            $query->where('equipo_id', $this->equipo_local_id);
        })->count();

        $this->goles_visitante = $this->goles()->whereHas('jugador', function($query) {
            $query->where('equipo_id', $this->equipo_visitante_id);
        })->count();

        $this->save();
    }
}
