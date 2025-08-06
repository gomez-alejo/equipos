<?php
// app/Models/Gol.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gol extends Model
{
    protected $table = 'goles';
    
    protected $fillable = [
        'jugador_id',
        'partido_id',
        'minuto'
    ];

    public function jugador(): BelongsTo
    {
        return $this->belongsTo(Jugador::class);
    }

    public function partido(): BelongsTo
    {
        return $this->belongsTo(Partido::class);
    }
}
