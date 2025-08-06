<?php
// app/Models/Equipo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipo extends Model
{
    protected $fillable = [
        'nombre',
        'escudo'
    ];

    public function jugadores(): HasMany
    {
        return $this->hasMany(Jugador::class);
    }

    public function partidosLocal(): HasMany
    {
        return $this->hasMany(Partido::class, 'equipo_local_id');
    }

    public function partidosVisitante(): HasMany
    {
        return $this->hasMany(Partido::class, 'equipo_visitante_id');
    }

    public function partidos()
    {
        return $this->partidosLocal->merge($this->partidosVisitante);
    }

    // Calcular estadísticas del equipo
    public function getEstadisticas()
    {
        $partidos = Partido::where(function($query) {
            $query->where('equipo_local_id', $this->id)
                  ->orWhere('equipo_visitante_id', $this->id);
        })->where('estado', 'finalizado')->get();

        $puntos = 0;
        $ganados = 0;
        $empatados = 0;
        $perdidos = 0;
        $golesFavor = 0;
        $golesContra = 0;

        foreach ($partidos as $partido) {
            if ($partido->equipo_local_id == $this->id) {
                $golesFavor += $partido->goles_local;
                $golesContra += $partido->goles_visitante;
                
                if ($partido->goles_local > $partido->goles_visitante) {
                    $puntos += 3;
                    $ganados++;
                } elseif ($partido->goles_local == $partido->goles_visitante) {
                    $puntos += 1;
                    $empatados++;
                } else {
                    $perdidos++;
                }
            } else {
                $golesFavor += $partido->goles_visitante;
                $golesContra += $partido->goles_local;
                
                if ($partido->goles_visitante > $partido->goles_local) {
                    $puntos += 3;
                    $ganados++;
                } elseif ($partido->goles_visitante == $partido->goles_local) {
                    $puntos += 1;
                    $empatados++;
                } else {
                    $perdidos++;
                }
            }
        }

        return [
            'puntos' => $puntos,
            'partidos_jugados' => $partidos->count(),
            'ganados' => $ganados,
            'empatados' => $empatados,
            'perdidos' => $perdidos,
            'goles_favor' => $golesFavor,
            'goles_contra' => $golesContra,
            'diferencia_goles' => $golesFavor - $golesContra
        ];
    }
}