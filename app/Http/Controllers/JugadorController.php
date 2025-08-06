<?php

// app/Http/Controllers/JugadorController.php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        $jugadores = Jugador::with('equipo')->get();
        return view('admin.jugadores.index', compact('jugadores'));
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('admin.jugadores.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'numero' => 'required|integer|min:1|max:99',
            'equipo_id' => 'required|exists:equipos,id'
        ]);

        // Verificar que el número no esté ocupado en el equipo
        $existeNumero = Jugador::where('equipo_id', $request->equipo_id)
                              ->where('numero', $request->numero)
                              ->exists();

        if ($existeNumero) {
            return back()->withErrors(['numero' => 'Este número ya está ocupado en el equipo seleccionado.']);
        }

        Jugador::create($request->all());

        return redirect()->route('admin.jugadores.index')
                        ->with('success', 'Jugador creado exitosamente.');
    }

    public function show(Jugador $jugador)
    {
        $jugador->load(['equipo', 'goles.partido', 'tarjetas.partido']);
        $estadisticas = $jugador->getEstadisticas();
        
        return view('admin.jugadores.show', compact('jugador', 'estadisticas'));
    }

    public function edit(Jugador $jugador)
    {
        $equipos = Equipo::all();
        return view('admin.jugadores.edit', compact('jugador', 'equipos'));
    }

    public function update(Request $request, Jugador $jugador)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'numero' => 'required|integer|min:1|max:99',
            'equipo_id' => 'required|exists:equipos,id'
        ]);

        // Verificar que el número no esté ocupado en el equipo (excepto el jugador actual)
        $existeNumero = Jugador::where('equipo_id', $request->equipo_id)
                              ->where('numero', $request->numero)
                              ->where('id', '!=', $jugador->id)
                              ->exists();

        if ($existeNumero) {
            return back()->withErrors(['numero' => 'Este número ya está ocupado en el equipo seleccionado.']);
        }

        $jugador->update($request->all());

        return redirect()->route('admin.jugadores.index')
                        ->with('success', 'Jugador actualizado exitosamente.');
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();

        return redirect()->route('admin.jugadores.index')
                        ->with('success', 'Jugador eliminado exitosamente.');
    }
}
