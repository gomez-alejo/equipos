{{-- resources/views/admin/tabla-posiciones.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tabla de Posiciones')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-gradient-to-r from-blue-800/30 to-indigo-800/30 backdrop-blur-sm border border-blue-700/30 rounded-2xl p-6 shadow-2xl">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-xl shadow-lg">
                        <i class="fas fa-trophy text-2xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">Tabla de Posiciones</h1>
                        <p class="text-blue-200/80">Clasificación actual del torneo</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Table Card -->
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <!-- Table Header -->
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-800 to-indigo-800 border-b border-blue-700/50">
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Pos</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Equipo</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">PJ</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">PG</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">PE</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">PP</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">GF</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">GC</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">DIF</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">PTS</th>
                        </tr>
                    </thead>
                    
                    <!-- Table Body -->
                    <tbody class="divide-y divide-white/10">
                        @foreach($tabla as $index => $fila)
                        <tr class="hover:bg-white/5 transition-all duration-300 group
                                {{ $index + 1 <= 4 ? 'bg-gradient-to-r from-green-900/20 to-emerald-900/20 border-l-4 border-green-400' : '' }}
                                {{ $index + 1 >= 5 && $index + 1 <= 6 ? 'bg-gradient-to-r from-blue-900/20 to-cyan-900/20 border-l-4 border-blue-400' : '' }}
                                {{ $index + 1 >= count($tabla) - 2 ? 'bg-gradient-to-r from-red-900/20 to-rose-900/20 border-l-4 border-red-400' : '' }}">
                            
                            <!-- Position -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-br from-slate-700 to-slate-800 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <span class="text-sm font-bold text-white">{{ $index + 1 }}</span>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Team -->
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    @if($fila['equipo']->escudo)
                                        <div class="w-10 h-10 bg-white/10 rounded-lg p-1 shadow-lg">
                                            <img src="{{ Storage::url($fila['equipo']->escudo) }}" 
                                                 alt="Escudo" 
                                                 class="w-full h-full object-contain rounded">
                                        </div>
                                    @else
                                        <div class="w-10 h-10 bg-gradient-to-br from-slate-600 to-slate-700 rounded-lg flex items-center justify-center shadow-lg">
                                            <i class="fas fa-shield-alt text-white text-sm"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-white font-semibold group-hover:text-blue-300 transition-colors duration-300">
                                            {{ $fila['equipo']->nombre }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Statistics -->
                            <td class="px-6 py-4 text-center">
                                <span class="text-white/90 font-medium">{{ $fila['partidos_jugados'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-green-400 font-semibold">{{ $fila['ganados'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-yellow-400 font-semibold">{{ $fila['empatados'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-red-400 font-semibold">{{ $fila['perdidos'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-white/90 font-medium">{{ $fila['goles_favor'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-white/90 font-medium">{{ $fila['goles_contra'] }}</span>
                            </td>
                            
                            <!-- Goal Difference -->
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 rounded-full text-sm font-bold
                                           {{ $fila['diferencia_goles'] >= 0 ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 'bg-red-500/20 text-red-400 border border-red-500/30' }}">
                                    {{ $fila['diferencia_goles'] > 0 ? '+' : '' }}{{ $fila['diferencia_goles'] }}
                                </span>
                            </td>
                            
                            <!-- Points -->
                            <td class="px-6 py-4 text-center">
                                <div class="bg-gradient-to-br from-blue-600 to-indigo-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg group-hover:scale-105 transition-transform duration-300">
                                    {{ $fila['puntos'] }}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if(count($tabla) == 0)
                <div class="text-center py-16 px-6">
                    <div class="max-w-md mx-auto">
                        <div class="mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-slate-600 to-slate-700 rounded-full flex items-center justify-center mx-auto shadow-xl">
                                <i class="fas fa-trophy text-3xl text-white/50"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-4">No hay equipos registrados</h3>
                        <p class="text-white/60 mb-8">Comienza agregando el primer equipo para ver la tabla de posiciones.</p>
                        <a href="{{ route('admin.equipos.create') }}" 
                           class="inline-flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-plus"></i>
                            <span>Crear Primer Equipo</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Legend Section -->
        @if(count($tabla) > 0)
        <div class="mt-8">
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl">
                <h4 class="text-lg font-semibold text-white mb-4 flex items-center space-x-2">
                    <i class="fas fa-info-circle text-blue-400"></i>
                    <span>Clasificación</span>
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex items-center space-x-3 p-3 bg-green-900/20 border border-green-500/30 rounded-lg">
                        <div class="w-4 h-4 bg-green-400 rounded"></div>
                        <span class="text-green-400 font-medium">Zona de Clasificación</span>
                    </div>
                    <div class="flex items-center space-x-3 p-3 bg-blue-900/20 border border-blue-500/30 rounded-lg">
                        <div class="w-4 h-4 bg-blue-400 rounded"></div>
                        <span class="text-blue-400 font-medium">Competición Europea</span>
                    </div>
                    <div class="flex items-center space-x-3 p-3 bg-red-900/20 border border-red-500/30 rounded-lg">
                        <div class="w-4 h-4 bg-red-400 rounded"></div>
                        <span class="text-red-400 font-medium">Zona de Descenso</span>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection