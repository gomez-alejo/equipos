<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\Partido;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $equipos = Equipo::count();
        $jugadores = Jugador::count();
        $partidos = Partido::count();
        $partidosProximos = Partido::where('fecha', '>', now())
                                  ->where('estado', 'programado')
                                  ->orderBy('fecha')
                                  ->limit(5)
                                  ->get();

        return view('admin.dashboard', compact('equipos', 'jugadores', 'partidos', 'partidosProximos'));
    }

    public function tablaPosiciones()
    {
        $equipos = Equipo::all();
        $tabla = [];

        foreach ($equipos as $equipo) {
            $estadisticas = $equipo->getEstadisticas();
            $tabla[] = array_merge(['equipo' => $equipo], $estadisticas);
        }

        // Ordenar por puntos, diferencia de goles y goles a favor
        usort($tabla, function($a, $b) {
            if ($a['puntos'] != $b['puntos']) {
                return $b['puntos'] - $a['puntos'];
            }
            if ($a['diferencia_goles'] != $b['diferencia_goles']) {
                return $b['diferencia_goles'] - $a['diferencia_goles'];
            }
            return $b['goles_favor'] - $a['goles_favor'];
        });

        return view('admin.tabla-posiciones', compact('tabla'));
    }
}