{{-- resources/views/admin/equipos/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Gestión de Equipos')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-gradient-to-r from-blue-800/30 to-indigo-800/30 backdrop-blur-sm border border-blue-700/30 rounded-2xl p-6 shadow-2xl">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg">
                            <i class="fas fa-users text-2xl text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white mb-2">Gestión de Equipos</h1>
                            <p class="text-blue-200/80">Administra todos los equipos del torneo</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.equipos.create') }}" 
                       class="inline-flex items-center space-x-2 px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-plus"></i>
                        <span>Crear Equipo</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        @if($equipos->count() > 0)
            <!-- Teams Table -->
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <!-- Table Header -->
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-800 to-indigo-800 border-b border-blue-700/50">
                                <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Escudo</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">Jugadores</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">Fecha Creación</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        
                        <!-- Table Body -->
                        <tbody class="divide-y divide-white/10">
                            @foreach($equipos as $equipo)
                            <tr class="hover:bg-white/5 transition-all duration-300 group">
                                <!-- ID -->
                                <td class="px-6 py-4">
                                    <div class="w-8 h-8 bg-gradient-to-br from-slate-700 to-slate-800 rounded-full flex items-center justify-center shadow-lg">
                                        <span class="text-sm font-bold text-white">{{ $equipo->id }}</span>
                                    </div>
                                </td>
                                
                                <!-- Shield -->
                                <td class="px-6 py-4">
                                    @if($equipo->escudo)
                                        <div class="relative group/shield">
                                            <div class="w-12 h-12 bg-white/10 rounded-xl p-1 shadow-lg group-hover/shield:scale-110 transition-transform duration-300">
                                                <img src="{{ Storage::url($equipo->escudo) }}" 
                                                     alt="Escudo de {{ $equipo->nombre }}" 
                                                     class="w-full h-full object-contain rounded-lg">
                                            </div>
                                            <div class="absolute inset-0 bg-black/40 rounded-xl opacity-0 group-hover/shield:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                                <i class="fas fa-search-plus text-white text-sm"></i>
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-12 h-12 bg-gradient-to-br from-slate-600 to-slate-700 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-image text-white/50"></i>
                                        </div>
                                    @endif
                                </td>
                                
                                <!-- Team Name -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div>
                                            <p class="text-white font-semibold text-lg group-hover:text-blue-300 transition-colors duration-300">
                                                {{ $equipo->nombre }}
                                            </p>
                                            <p class="text-white/50 text-sm">Equipo #{{ $equipo->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- Players Count -->
                                <td class="px-6 py-4 text-center">
                                    <div class="inline-flex items-center space-x-2 px-3 py-2 bg-gradient-to-r from-cyan-600/20 to-blue-600/20 border border-cyan-500/30 rounded-full">
                                        <i class="fas fa-users text-cyan-400 text-sm"></i>
                                        <span class="text-cyan-400 font-semibold text-sm">{{ $equipo->jugadores_count }}</span>
                                        <span class="text-cyan-400/70 text-xs">jugadores</span>
                                    </div>
                                </td>
                                
                                <!-- Creation Date -->
                                <td class="px-6 py-4 text-center">
                                    <div class="flex flex-col items-center">
                                        <span class="text-white/90 font-medium">{{ $equipo->created_at->format('d/m/Y') }}</span>
                                        <span class="text-white/50 text-xs">{{ $equipo->created_at->diffForHumans() }}</span>
                                    </div>
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.equipos.show', $equipo) }}" 
                                           class="p-2 bg-blue-600/20 hover:bg-blue-600/40 border border-blue-500/30 hover:border-blue-400/50 text-blue-400 hover:text-blue-300 rounded-lg transition-all duration-300 hover:scale-110 group/btn">
                                            <i class="fas fa-eye text-sm group-hover/btn:scale-110 transition-transform duration-300"></i>
                                        </a>
                                        
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.equipos.edit', $equipo) }}" 
                                           class="p-2 bg-amber-600/20 hover:bg-amber-600/40 border border-amber-500/30 hover:border-amber-400/50 text-amber-400 hover:text-amber-300 rounded-lg transition-all duration-300 hover:scale-110 group/btn">
                                            <i class="fas fa-edit text-sm group-hover/btn:scale-110 transition-transform duration-300"></i>
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.equipos.destroy', $equipo) }}" method="POST" class="inline"
                                              onsubmit="return confirmDelete('{{ $equipo->nombre }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="p-2 bg-red-600/20 hover:bg-red-600/40 border border-red-500/30 hover:border-red-400/50 text-red-400 hover:text-red-300 rounded-lg transition-all duration-300 hover:scale-110 group/btn">
                                                <i class="fas fa-trash text-sm group-hover/btn:scale-110 transition-transform duration-300"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl">
                            <i class="fas fa-users text-2xl text-white"></i>
                        </div>
                        <div>
                            <p class="text-white/60 text-sm">Total Equipos</p>
                            <p class="text-2xl font-bold text-white">{{ $equipos->count() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl">
                            <i class="fas fa-user-friends text-2xl text-white"></i>
                        </div>
                        <div>
                            <p class="text-white/60 text-sm">Total Jugadores</p>
                            <p class="text-2xl font-bold text-white">{{ $equipos->sum('jugadores_count') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl">
                            <i class="fas fa-shield-alt text-2xl text-white"></i>
                        </div>
                        <div>
                            <p class="text-white/60 text-sm">Con Escudo</p>
                            <p class="text-2xl font-bold text-white">{{ $equipos->whereNotNull('escudo')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <!-- Empty State -->
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-16">
                <div class="text-center max-w-md mx-auto">
                    <div class="mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-slate-600 to-slate-700 rounded-full flex items-center justify-center mx-auto shadow-xl">
                            <i class="fas fa-users text-4xl text-white/50"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-semibold text-white mb-4">No hay equipos registrados</h3>
                    <p class="text-white/60 mb-8">Comienza creando el primer equipo para iniciar el torneo.</p>
                    <a href="{{ route('admin.equipos.create') }}" 
                       class="inline-flex items-center space-x-2 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-plus"></i>
                        <span>Crear Primer Equipo</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
function confirmDelete(teamName) {
    return confirm(`¿Estás seguro de eliminar el equipo "${teamName}"?\n\nEsta acción no se puede deshacer y eliminará también todos los datos relacionados.`);
}
</script>
@endsection