<?php

// app/Http/Controllers/EquipoController.php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::withCount('jugadores')->get();
        return view('admin.equipos.index', compact('equipos'));
    }

    public function create()
    {
        return view('admin.equipos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:equipos',
            'escudo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['nombre']);

        if ($request->hasFile('escudo')) {
            $data['escudo'] = $request->file('escudo')->store('escudos', 'public');
        }

        Equipo::create($data);

        return redirect()->route('admin.equipos.index')
                        ->with('success', 'Equipo creado exitosamente.');
    }

    public function show(Equipo $equipo)
    {
        $equipo->load('jugadores');
        $estadisticas = $equipo->getEstadisticas();
        
        return view('admin.equipos.show', compact('equipo', 'estadisticas'));
    }

    public function edit(Equipo $equipo)
    {
        return view('admin.equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:equipos,nombre,' . $equipo->id,
            'escudo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['nombre']);

        if ($request->hasFile('escudo')) {
            // Eliminar escudo anterior si existe
            if ($equipo->escudo) {
                Storage::disk('public')->delete($equipo->escudo);
            }
            $data['escudo'] = $request->file('escudo')->store('escudos', 'public');
        }

        $equipo->update($data);

        return redirect()->route('admin.equipos.index')
                        ->with('success', 'Equipo actualizado exitosamente.');
    }

    public function destroy(Equipo $equipo)
    {
        if ($equipo->escudo) {
            Storage::disk('public')->delete($equipo->escudo);
        }
        
        $equipo->delete();

        return redirect()->route('admin.equipos.index')
                        ->with('success', 'Equipo eliminado exitosamente.');
    }
}
