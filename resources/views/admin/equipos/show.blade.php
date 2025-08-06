{{-- resources/views/admin/equipos/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Detalle del Equipo: ' . $equipo->nombre)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-gradient-to-r from-blue-800/30 to-indigo-800/30 backdrop-blur-sm border border-blue-700/30 rounded-2xl p-6 shadow-2xl">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg">
                        <i class="fas fa-eye text-2xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">Detalle del Equipo</h1>
                        <p class="text-blue-200/80">Información completa y estadísticas</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Team Info & Stats -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Team Information Card -->
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-700/50 to-indigo-700/50 p-6 border-b border-white/10">
                        <h3 class="text-lg font-semibold text-white flex items-center space-x-2">
                            <i class="fas fa-info-circle text-blue-400"></i>
                            <span>Información del Equipo</span>
                        </h3>
                    </div>
                    
                    <div class="p-8 text-center">
                        <!-- Shield Display -->
                        <div class="mb-6 relative">
                            @if($equipo->escudo)
                                <div class="w-32 h-32 mx-auto relative group">
                                    <div class="w-full h-full bg-white/10 rounded-2xl p-2 shadow-2xl group-hover:scale-105 transition-transform duration-300">
                                        <img src="{{ Storage::url($equipo->escudo) }}" 
                                             alt="Escudo de {{ $equipo->nombre }}" 
                                             class="w-full h-full object-contain rounded-xl">
                                    </div>
                                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl opacity-20 group-hover:opacity-40 transition-opacity duration-300 -z-10"></div>
                                </div>
                            @else
                                <div class="w-32 h-32 mx-auto bg-gradient-to-br from-slate-600 to-slate-700 rounded-2xl flex items-center justify-center shadow-2xl">
                                    <i class="fas fa-image text-4xl text-white/50"></i>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Team Name -->
                        <h2 class="text-2xl font-bold text-white mb-2">{{ $equipo->nombre }}</h2>
                        <p class="text-white/60 mb-6">Creado el {{ $equipo->created_at->format('d/m/Y') }}</p>
                        
                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <a href="{{ route('admin.equipos.edit', $equipo) }}" 
                               class="w-full inline-flex items-center justify-center space-x-2 px-4 py-3 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-edit"></i>
                                <span>Editar Equipo</span>
                            </a>
                            <a href="{{ route('admin.jugadores.create') }}?equipo_id={{ $equipo->id }}" 
                               class="w-full inline-flex items-center justify-center space-x-2 px-4 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-user-plus"></i>
                                <span>Agregar Jugador</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Statistics Card -->
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-700/50 to-indigo-700/50 p-6 border-b border-white/10">
                        <h3 class="text-lg font-semibold text-white flex items-center space-x-2">
                            <i class="fas fa-chart-bar text-purple-400"></i>
                            <span>Estadísticas</span>
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <!-- Main Stats -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-gradient-to-br from-blue-600/20 to-indigo-600/20 border border-blue-500/30 rounded-xl p-4 text-center">
                                <div class="text-3xl font-bold text-blue-400 mb-1">{{ $estadisticas['puntos'] }}</div>
                                <div class="text-white/60 text-sm font-medium">Puntos</div>
                            </div>
                            <div class="bg-gradient-to-br from-cyan-600/20 to-blue-600/20 border border-cyan-500/30 rounded-xl p-4 text-center">
                                <div class="text-3xl font-bold text-cyan-400 mb-1">{{ $estadisticas['partidos_jugados'] }}</div>
                                <div class="text-white/60 text-sm font-medium">Partidos</div>
                            </div>
                        </div>
                        
                        <!-- Win/Draw/Loss -->
                        <div class="border-t border-white/10 pt-6 mb-6">
                            <div class="grid grid-cols-3 gap-3">
                                <div class="bg-gradient-to-br from-green-600/20 to-emerald-600/20 border border-green-500/30 rounded-lg p-3 text-center">
                                    <div class="text-xl font-bold text-green-400 mb-1">{{ $estadisticas['ganados'] }}</div>
                                    <div class="text-green-300/80 text-xs font-medium">G</div>
                                </div>
                                <div class="bg-gradient-to-br from-yellow-600/20 to-amber-600/20 border border-yellow-500/30 rounded-lg p-3 text-center">
                                    <div class="text-xl font-bold text-yellow-400 mb-1">{{ $estadisticas['empatados'] }}</div>
                                    <div class="text-yellow-300/80 text-xs font-medium">E</div>
                                </div>
                                <div class="bg-gradient-to-br from-red-600/20 to-rose-600/20 border border-red-500/30 rounded-lg p-3 text-center">
                                    <div class="text-xl font-bold text-red-400 mb-1">{{ $estadisticas['perdidos'] }}</div>
                                    <div class="text-red-300/80 text-xs font-medium">P</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Goals Stats -->
                        <div class="border-t border-white/10 pt-6">
                            <div class="grid grid-cols-3 gap-3">
                                <div class="bg-gradient-to-br from-green-600/20 to-emerald-600/20 border border-green-500/30 rounded-lg p-3 text-center">
                                    <div class="text-xl font-bold text-green-400 mb-1">{{ $estadisticas['goles_favor'] }}</div>
                                    <div class="text-green-300/80 text-xs font-medium">GF</div>
                                </div>
                                <div class="bg-gradient-to-br from-red-600/20 to-rose-600/20 border border-red-500/30 rounded-lg p-3 text-center">
                                    <div class="text-xl font-bold text-red-400 mb-1">{{ $estadisticas['goles_contra'] }}</div>
                                    <div class="text-red-300/80 text-xs font-medium">GC</div>
                                </div>
                                <div class="bg-gradient-to-br {{ $estadisticas['diferencia_goles'] >= 0 ? 'from-green-600/20 to-emerald-600/20 border-green-500/30' : 'from-red-600/20 to-rose-600/20 border-red-500/30' }} border rounded-lg p-3 text-center">
                                    <div class="text-xl font-bold {{ $estadisticas['diferencia_goles'] >= 0 ? 'text-green-400' : 'text-red-400' }} mb-1">
                                        {{ $estadisticas['diferencia_goles'] > 0 ? '+' : '' }}{{ $estadisticas['diferencia_goles'] }}
                                    </div>
                                    <div class="{{ $estadisticas['diferencia_goles'] >= 0 ? 'text-green-300/80' : 'text-red-300/80' }} text-xs font-medium">DIF</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Players & Matches -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Players Squad Card -->
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-green-700/50 to-emerald-700/50 p-6 border-b border-white/10 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white flex items-center space-x-2">
                            <i class="fas fa-users text-green-400"></i>
                            <span>Plantilla de Jugadores ({{ $equipo->jugadores->count() }})</span>
                        </h3>
                        <a href="{{ route('admin.jugadores.create') }}?equipo_id={{ $equipo->id }}" 
                           class="inline-flex items-center space-x-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-300">
                            <i class="fas fa-plus text-sm"></i>
                            <span>Agregar</span>
                        </a>
                    </div>
                    
                    <div class="p-6">
                        @if($equipo->jugadores->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="border-b border-white/10">
                                            <th class="px-4 py-3 text-left text-xs font-bold text-white/80 uppercase tracking-wider">Número</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-white/80 uppercase tracking-wider">Nombre</th>
                                            <th class="px-4 py-3 text-center text-xs font-bold text-white/80 uppercase tracking-wider">Goles</th>
                                            <th class="px-4 py-3 text-center text-xs font-bold text-white/80 uppercase tracking-wider">Tarjetas</th>
                                            <th class="px-4 py-3 text-center text-xs font-bold text-white/80 uppercase tracking-wider">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-white/10">
                                        @foreach($equipo->jugadores->sortBy('numero') as $jugador)
                                        @php $stats = $jugador->getEstadisticas(); @endphp
                                        <tr class="hover:bg-white/5 transition-colors duration-300 group">
                                            <td class="px-4 py-4">
                                                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-full flex items-center justify-center font-bold text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                                    {{ $jugador->numero }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4">
                                                <div class="text-white font-medium group-hover:text-blue-300 transition-colors duration-300">
                                                    {{ $jugador->nombre }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-center">
                                                <span class="inline-flex items-center px-3 py-1 bg-green-600/20 border border-green-500/30 rounded-full text-green-400 font-semibold text-sm">
                                                    <i class="fas fa-futbol mr-1 text-xs"></i>
                                                    {{ $stats['goles'] }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-4 text-center">
                                                <div class="flex justify-center space-x-1">
                                                    @if($stats['tarjetas_amarillas'] > 0)
                                                        <span class="inline-flex items-center px-2 py-1 bg-yellow-600/20 border border-yellow-500/30 rounded-full text-yellow-400 font-semibold text-xs">
                                                            {{ $stats['tarjetas_amarillas'] }} A
                                                        </span>
                                                    @endif
                                                    @if($stats['tarjetas_rojas'] > 0)
                                                        <span class="inline-flex items-center px-2 py-1 bg-red-600/20 border border-red-500/30 rounded-full text-red-400 font-semibold text-xs">
                                                            {{ $stats['tarjetas_rojas'] }} R
                                                        </span>
                                                    @endif
                                                    @if($stats['tarjetas_amarillas'] == 0 && $stats['tarjetas_rojas'] == 0)
                                                        <span class="text-white/40 text-xs">Sin tarjetas</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-4 py-4">
                                                <div class="flex justify-center space-x-2">
                                                    <a href="{{ route('admin.jugadores.show', $jugador) }}" 
                                                       class="p-2 bg-blue-600/20 hover:bg-blue-600/40 border border-blue-500/30 hover:border-blue-400/50 text-blue-400 hover:text-blue-300 rounded-lg transition-all duration-300 hover:scale-110">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </a>
                                                    <a href="{{ route('admin.jugadores.edit', $jugador) }}" 
                                                       class="p-2 bg-amber-600/20 hover:bg-amber-600/40 border border-amber-500/30 hover:border-amber-400/50 text-amber-400 hover:text-amber-300 rounded-lg transition-all duration-300 hover:scale-110">
                                                        <i class="fas fa-edit text-sm"></i>
                                                    </a>
                                                    <form action="{{ route('admin.jugadores.destroy', $jugador) }}" 
                                                          method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="p-2 bg-red-600/20 hover:bg-red-600/40 border border-red-500/30 hover:border-red-400/50 text-red-400 hover:text-red-300 rounded-lg transition-all duration-300 hover:scale-110"
                                                                onclick="return confirm('¿Estás seguro de eliminar este jugador?')">
                                                            <i class="fas fa-trash text-sm"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-20 h-20 bg-gradient-to-br from-slate-600 to-slate-700 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl">
                                    <i class="fas fa-users text-3xl text-white/50"></i>
                                </div>
                                <h4 class="text-xl font-semibold text-white mb-2">No hay jugadores registrados</h4>
                                <p class="text-white/60 mb-6">Agrega jugadores a este equipo para comenzar.</p>
                                <a href="{{ route('admin.jugadores.create') }}?equipo_id={{ $equipo->id }}" 
                                   class="inline-flex items-center space-x-2 px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-user-plus"></i>
                                    <span>Agregar Primer Jugador</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Recent Matches Card -->
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-700/50 to-red-700/50 p-6 border-b border-white/10">
                        <h3 class="text-lg font-semibold text-white flex items-center space-x-2">
                            <i class="fas fa-futbol text-orange-400"></i>
                            <span>Últimos Partidos</span>
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        @if($ultimosPartidos && $ultimosPartidos->count() > 0)
                            <div class="space-y-4">
                                @foreach($ultimosPartidos as $partido)
                                <div class="bg-white/5 border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-colors duration-300">
                                    <div class="flex justify-between items-center">
                                        <div class="flex-1">
                                            <div class="text-white font-semibold text-lg mb-1">
                                                {{ $partido->equipoLocal->nombre }} 
                                                <span class="mx-2 text-blue-400">{{ $partido->goles_local }} - {{ $partido->goles_visitante }}</span>
                                                {{ $partido->equipoVisitante->nombre }}
                                            </div>
                                            <div class="text-white/60 text-sm flex items-center space-x-4">
                                                <span class="flex items-center space-x-1">
                                                    <i class="fas fa-calendar text-xs"></i>
                                                    <span>{{ $partido->fecha->format('d/m/Y') }}</span>
                                                </span>
                                                <span class="flex items-center space-x-1">
                                                    <i class="fas fa-trophy text-xs"></i>
                                                    <span>{{ $partido->jornada ? 'Jornada ' . $partido->jornada : 'Amistoso' }}</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            @php
                                                $esLocal = $partido->equipo_local_id == $equipo->id;
                                                $golesAFavor = $esLocal ? $partido->goles_local : $partido->goles_visitante;
                                                $golesEnContra = $esLocal ? $partido->goles_visitante : $partido->goles_local;
                                                
                                                if ($golesAFavor > $golesEnContra) {
                                                    $resultado = 'Victoria';
                                                    $claseColor = 'from-green-600/20 to-emerald-600/20 border-green-500/30 text-green-400';
                                                    $icono = 'trophy';
                                                } elseif ($golesAFavor < $golesEnContra) {
                                                    $resultado = 'Derrota';
                                                    $claseColor = 'from-red-600/20 to-rose-600/20 border-red-500/30 text-red-400';
                                                    $icono = 'times';
                                                } else {
                                                    $resultado = 'Empate';
                                                    $claseColor = 'from-yellow-600/20 to-amber-600/20 border-yellow-500/30 text-yellow-400';
                                                    $icono = 'minus';
                                                }
                                            @endphp
                                            <span class="inline-flex items-center space-x-2 px-3 py-2 bg-gradient-to-br {{ $claseColor }} border rounded-lg font-semibold text-sm">
                                                <i class="fas fa-{{ $icono }}"></i>
                                                <span>{{ $resultado }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-slate-600 to-slate-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-futbol text-2xl text-white/50"></i>
                                </div>
                                <p class="text-white/60">No hay partidos registrados aún</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-8">
            <a href="{{ route('admin.equipos.index') }}" 
               class="inline-flex items-center space-x-2 px-6 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl border border-white/20 hover:border-white/30 transition-all duration-300 backdrop-blur-sm group">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform duration-300"></i>
                <span>Volver a Equipos</span>
            </a>
        </div>
    </div>
</div>
@endsection