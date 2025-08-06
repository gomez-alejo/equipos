{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard - Liga de Fútbol')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-900 to-blue-800 shadow-2xl">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">Dashboard de Administración</h1>
                    <p class="text-blue-200 text-lg">Gestiona tu liga de fútbol profesionalmente</p>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg px-4 py-2">
                        <span class="text-white font-medium">{{ now()->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-8 space-y-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Equipos Card -->
            <div class="group relative overflow-hidden bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-3xl font-bold text-white mb-1">{{ $equipos }}</h3>
                            <p class="text-blue-100 font-medium">Equipos</p>
                        </div>
                        <div class="bg-white/20 rounded-full p-3">
                            <i class="fas fa-users text-2xl text-white"></i>
                        </div>
                    </div>
                    <div class="border-t border-white/20 pt-4">
                        <a href="{{ route('admin.equipos.index') }}" class="inline-flex items-center text-white hover:text-blue-200 transition-colors font-medium">
                            Ver todos <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Jugadores Card -->
            <div class="group relative overflow-hidden bg-gradient-to-br from-emerald-600 to-emerald-700 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-3xl font-bold text-white mb-1">{{ $jugadores }}</h3>
                            <p class="text-emerald-100 font-medium">Jugadores</p>
                        </div>
                        <div class="bg-white/20 rounded-full p-3">
                            <i class="fas fa-user text-2xl text-white"></i>
                        </div>
                    </div>
                    <div class="border-t border-white/20 pt-4">
                        <a href="{{ route('admin.jugadores.index') }}" class="inline-flex items-center text-white hover:text-emerald-200 transition-colors font-medium">
                            Ver todos <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Partidos Card -->
            <div class="group relative overflow-hidden bg-gradient-to-br from-cyan-600 to-cyan-700 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-3xl font-bold text-white mb-1">{{ $partidos }}</h3>
                            <p class="text-cyan-100 font-medium">Partidos</p>
                        </div>
                        <div class="bg-white/20 rounded-full p-3">
                            <i class="fas fa-futbol text-2xl text-white"></i>
                        </div>
                    </div>
                    <div class="border-t border-white/20 pt-4">
                        <a href="{{ route('admin.partidos.index') }}" class="inline-flex items-center text-white hover:text-cyan-200 transition-colors font-medium">
                            Ver todos <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Próximos Card -->
            <div class="group relative overflow-hidden bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-3xl font-bold text-white mb-1">{{ $partidosProximos->count() }}</h3>
                            <p class="text-amber-100 font-medium">Próximos</p>
                        </div>
                        <div class="bg-white/20 rounded-full p-3">
                            <i class="fas fa-calendar text-2xl text-white"></i>
                        </div>
                    </div>
                    <div class="border-t border-white/20 pt-4">
                        <a href="{{ route('admin.partidos.index') }}" class="inline-flex items-center text-white hover:text-amber-200 transition-colors font-medium">
                            Ver calendario <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Próximos Partidos Table -->
            <div class="lg:col-span-2">
                <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-slate-800 to-slate-700 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h5 class="text-xl font-bold text-white flex items-center">
                                <i class="fas fa-calendar-alt mr-3 text-blue-400"></i>
                                Próximos Partidos
                            </h5>
                            <a href="{{ route('admin.partidos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2 font-medium">
                                <i class="fas fa-plus"></i>
                                <span>Programar Partido</span>
                            </a>
                        </div>
                    </div>
                    <div class="p-6">
                        @if($partidosProximos->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="border-b-2 border-slate-200">
                                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Fecha</th>
                                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Local</th>
                                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Visitante</th>
                                            <th class="text-center py-3 px-4 font-semibold text-slate-700">Estado</th>
                                            <th class="text-center py-3 px-4 font-semibold text-slate-700">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="space-y-2">
                                        @foreach($partidosProximos as $partido)
                                        <tr class="hover:bg-slate-50 transition-colors duration-200 border-b border-slate-100">
                                            <td class="py-4 px-4">
                                                <div class="flex items-center space-x-2">
                                                    <i class="fas fa-clock text-slate-400"></i>
                                                    <span class="font-medium text-slate-700">{{ $partido->fecha->format('d/m/Y H:i') }}</span>
                                                </div>
                                            </td>
                                            <td class="py-4 px-4">
                                                <span class="font-semibold text-slate-800">{{ $partido->equipoLocal->nombre }}</span>
                                            </td>
                                            <td class="py-4 px-4">
                                                <span class="font-semibold text-slate-800">{{ $partido->equipoVisitante->nombre }}</span>
                                            </td>
                                            <td class="py-4 px-4 text-center">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                                    {{ ucfirst($partido->estado) }}
                                                </span>
                                            </td>
                                            <td class="py-4 px-4 text-center">
                                                <a href="{{ route('admin.partidos.show', $partido) }}" class="inline-flex items-center justify-center w-10 h-10 bg-slate-100 hover:bg-blue-600 text-slate-600 hover:text-white rounded-lg transition-all duration-200">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-calendar-times text-3xl text-slate-400"></i>
                                </div>
                                <p class="text-slate-500 text-lg font-medium">No hay partidos programados</p>
                                <p class="text-slate-400 mt-2">¡Programa el primer partido de la temporada!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions Panel -->
            <div class="lg:col-span-1">
                <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-slate-800 to-slate-700 px-6 py-4">
                        <h5 class="text-xl font-bold text-white flex items-center">
                            <i class="fas fa-bolt mr-3 text-amber-400"></i>
                            Acciones Rápidas
                        </h5>
                    </div>
                    <div class="p-6 space-y-4">
                        <a href="{{ route('admin.equipos.create') }}" class="group flex items-center w-full p-4 bg-gradient-to-r from-blue-50 to-blue-100 hover:from-blue-600 hover:to-blue-700 rounded-xl transition-all duration-300 border border-blue-200 hover:border-blue-600">
                            <div class="bg-blue-600 group-hover:bg-white rounded-lg p-3 mr-4">
                                <i class="fas fa-plus text-white group-hover:text-blue-600 transition-colors"></i>
                            </div>
                            <span class="font-semibold text-blue-700 group-hover:text-white transition-colors">Crear Equipo</span>
                        </a>

                        <a href="{{ route('admin.jugadores.create') }}" class="group flex items-center w-full p-4 bg-gradient-to-r from-emerald-50 to-emerald-100 hover:from-emerald-600 hover:to-emerald-700 rounded-xl transition-all duration-300 border border-emerald-200 hover:border-emerald-600">
                            <div class="bg-emerald-600 group-hover:bg-white rounded-lg p-3 mr-4">
                                <i class="fas fa-user-plus text-white group-hover:text-emerald-600 transition-colors"></i>
                            </div>
                            <span class="font-semibold text-emerald-700 group-hover:text-white transition-colors">Agregar Jugador</span>
                        </a>

                        <a href="{{ route('admin.partidos.create') }}" class="group flex items-center w-full p-4 bg-gradient-to-r from-cyan-50 to-cyan-100 hover:from-cyan-600 hover:to-cyan-700 rounded-xl transition-all duration-300 border border-cyan-200 hover:border-cyan-600">
                            <div class="bg-cyan-600 group-hover:bg-white rounded-lg p-3 mr-4">
                                <i class="fas fa-calendar-plus text-white group-hover:text-cyan-600 transition-colors"></i>
                            </div>
                            <span class="font-semibold text-cyan-700 group-hover:text-white transition-colors">Programar Partido</span>
                        </a>

                        <a href="{{ route('admin.tabla-posiciones') }}" class="group flex items-center w-full p-4 bg-gradient-to-r from-amber-50 to-amber-100 hover:from-amber-600 hover:to-amber-700 rounded-xl transition-all duration-300 border border-amber-200 hover:border-amber-600">
                            <div class="bg-amber-600 group-hover:bg-white rounded-lg p-3 mr-4">
                                <i class="fas fa-trophy text-white group-hover:text-amber-600 transition-colors"></i>
                            </div>
                            <span class="font-semibold text-amber-700 group-hover:text-white transition-colors">Ver Tabla de Posiciones</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection