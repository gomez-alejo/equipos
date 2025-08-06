<?php

// app/Http/Controllers/PartidoController.php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\Gol;
use App\Models\Tarjeta;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])
                          ->orderBy('fecha', 'desc')
                          ->get();
        return view('admin.partidos.index', compact('partidos'));
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('admin.partidos.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'fecha' => 'required|date|after:now'
        ]);

        Partido::create($request->all());

        return redirect()->route('admin.partidos.index')
                        ->with('success', 'Partido programado exitosamente.');
    }

    public function show(Partido $partido)
    {
        $partido->load(['equipoLocal.jugadores', 'equipoVisitante.jugadores', 'goles.jugador', 'tarjetas.jugador']);
        return view('admin.partidos.show', compact('partido'));
    }

    public function edit(Partido $partido)
    {
        $equipos = Equipo::all();
        return view('admin.partidos.edit', compact('partido', 'equipos'));
    }

    public function update(Request $request, Partido $partido)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'fecha' => 'required|date',
            'estado' => 'required|in:programado,en_curso,finalizado'
        ]);

        $partido->update($request->all());

        return redirect()->route('admin.partidos.index')
                        ->with('success', 'Partido actualizado exitosamente.');
    }

    public function destroy(Partido $partido)
    {
        $partido->delete();

        return redirect()->route('admin.partidos.index')
                        ->with('success', 'Partido eliminado exitosamente.');
    }

    public function gestionarResultado(Partido $partido)
    {
        $jugadoresLocal = $partido->equipoLocal->jugadores;
        $jugadoresVisitante = $partido->equipoVisitante->jugadores;
        $goles = $partido->goles()->with('jugador')->get();
        $tarjetas = $partido->tarjetas()->with('jugador')->get();

        return view('admin.partidos.resultado', compact('partido', 'jugadoresLocal', 'jugadoresVisitante', 'goles', 'tarjetas'));
    }

    public function agregarGol(Request $request, Partido $partido)
    {
        $request->validate([
            'jugador_id' => 'required|exists:jugadores,id',
            'minuto' => 'required|integer|min:1|max:120'
        ]);

        Gol::create([
            'jugador_id' => $request->jugador_id,
            'partido_id' => $partido->id,
            'minuto' => $request->minuto
        ]);

        $partido->actualizarResultado();

        return back()->with('success', 'Gol agregado exitosamente.');
    }

    public function eliminarGol(Gol $gol)
    {
        $partido = $gol->partido;
        $gol->delete();
        $partido->actualizarResultado();

        return back()->with('success', 'Gol eliminado exitosamente.');
    }

    public function agregarTarjeta(Request $request, Partido $partido)
    {
        $request->validate([
            'jugador_id' => 'required|exists:jugadores,id',
            'tipo' => 'required|in:amarilla,roja',
            'minuto' => 'required|integer|min:1|max:120'
        ]);

        Tarjeta::create([
            'jugador_id' => $request->jugador_id,
            'partido_id' => $partido->id,
            'tipo' => $request->tipo,
            'minuto' => $request->minuto
        ]);

        return back()->with('success', 'Tarjeta agregada exitosamente.');
    }

    public function eliminarTarjeta(Tarjeta $tarjeta)
    {
        $tarjeta->delete();
        return back()->with('success', 'Tarjeta eliminada exitosamente.');
    }
}
