<?php

// app/Models/Tarjeta.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarjeta extends Model
{
    protected $fillable = [
        'jugador_id',
        'partido_id',
        'tipo',
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
