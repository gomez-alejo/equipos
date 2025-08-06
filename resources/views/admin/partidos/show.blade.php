{{-- resources/views/admin/partidos/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Detalle del Partido')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contenido Principal -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Header del Partido -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600/20 to-indigo-600/20 px-8 py-6 border-b border-white/10">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <circle cx="10" cy="10" r="10"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-white">Detalle del Partido</h1>
                                <p class="text-blue-200">{{ $partido->equipoLocal->nombre }} vs {{ $partido->equipoVisitante->nombre }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Marcador Principal -->
                    <div class="px-8 py-10">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center mb-8">
                            <!-- Equipo Local -->
                            <div class="text-center">
                                <div class="flex flex-col items-center space-y-4">
                                    @if($partido->equipoLocal->escudo)
                                        <div class="w-24 h-24 bg-white/10 rounded-full p-4 backdrop-blur-sm border border-white/20">
                                            <img src="{{ Storage::url($partido->equipoLocal->escudo) }}" alt="Escudo" 
                                                 class="w-full h-full object-contain">
                                        </div>
                                    @endif
                                    <div>
                                        <h3 class="text-2xl font-bold text-white mb-1">{{ $partido->equipoLocal->nombre }}</h3>
                                        <p class="text-blue-200 text-sm font-medium">Local</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Marcador Central -->
                            <div class="text-center">
                                @if($partido->estado == 'finalizado')
                                    <div class="space-y-4">
                                        <div class="text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">
                                            {{ $partido->goles_local }} - {{ $partido->goles_visitante }}
                                        </div>
                                        <span class="inline-flex px-4 py-2 rounded-full text-sm font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 backdrop-blur-sm">
                                            Finalizado
                                        </span>
                                    </div>
                                @else
                                    <div class="space-y-4">
                                        <div class="text-4xl font-bold text-white/60">VS</div>
                                        @php
                                            $estadoBadgeClass = match($partido->estado) {
                                                'en_curso' => 'bg-amber-500/20 text-amber-300 border-amber-500/30',
                                                default => 'bg-blue-500/20 text-blue-300 border-blue-500/30'
                                            };
                                        @endphp
                                        <span class="inline-flex px-4 py-2 rounded-full text-sm font-semibold border {{ $estadoBadgeClass }} backdrop-blur-sm">
                                            {{ ucfirst(str_replace('_', ' ', $partido->estado)) }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Equipo Visitante -->
                            <div class="text-center">
                                <div class="flex flex-col items-center space-y-4">
                                    @if($partido->equipoVisitante->escudo)
                                        <div class="w-24 h-24 bg-white/10 rounded-full p-4 backdrop-blur-sm border border-white/20">
                                            <img src="{{ Storage::url($partido->equipoVisitante->escudo) }}" alt="Escudo" 
                                                 class="w-full h-full object-contain">
                                        </div>
                                    @endif
                                    <div>
                                        <h3 class="text-2xl font-bold text-white mb-1">{{ $partido->equipoVisitante->nombre }}</h3>
                                        <p class="text-blue-200 text-sm font-medium">Visitante</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Información Básica -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-blue-200 text-sm">Fecha</p>
                                        <p class="text-white font-semibold">{{ $partido->fecha->format('d/m/Y H:i') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-indigo-500/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-blue-200 text-sm">Estado</p>
                                        @php
                                            $estadoBadgeClass = match($partido->estado) {
                                                'finalizado' => 'bg-emerald-500/20 text-emerald-300 border-emerald-500/30',
                                                'en_curso' => 'bg-amber-500/20 text-amber-300 border-amber-500/30',
                                                default => 'bg-blue-500/20 text-blue-300 border-blue-500/30'
                                            };
                                        @endphp
                                        <span class="inline-flex px-3 py-1 rounded-full text-sm font-semibold border {{ $estadoBadgeClass }} backdrop-blur-sm">
                                            {{ ucfirst(str_replace('_', ' ', $partido->estado)) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <a href="{{ route('admin.partidos.resultado', $partido) }}" class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                    </svg>
                                    Gestionar Resultado
                                </a>
                                @if($partido->estado != 'finalizado')
                                    <a href="{{ route('admin.partidos.edit', $partido) }}" class="w-full bg-gradient-to-r from-amber-500 to-yellow-600 hover:from-amber-600 hover:to-yellow-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Editar Partido
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Goles del Partido -->
                @if($partido->goles->count() > 0)
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-600/20 to-green-600/20 px-6 py-4 border-b border-white/10">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="10"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-white">Goles del Partido</h3>
                            </div>
                            <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $partido->goles->count() }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            @foreach($partido->goles->sortBy('minuto') as $gol)
                            <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl border border-white/10 hover:bg-white/10 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                                        <span class="text-emerald-300 font-bold text-sm">{{ $gol->minuto }}'</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-semibold">
                                            {{ $gol->jugador->nombre }} (#{{ $gol->jugador->numero }})
                                        </p>
                                        <p class="text-blue-200 text-sm">{{ $gol->jugador->equipo->nombre }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Tarjetas del Partido -->
                @if($partido->tarjetas->count() > 0)
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-600/20 to-yellow-600/20 px-6 py-4 border-b border-white/10">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-yellow-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <rect x="4" y="3" width="12" height="14" rx="2"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-white">Tarjetas del Partido</h3>
                            </div>
                            <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $partido->tarjetas->count() }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            @foreach($partido->tarjetas->sortBy('minuto') as $tarjeta)
                            <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl border border-white/10 hover:bg-white/10 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-{{ $tarjeta->tipo == 'amarilla' ? 'amber' : 'red' }}-500/20 rounded-xl flex items-center justify-center">
                                        <span class="text-{{ $tarjeta->tipo == 'amarilla' ? 'amber' : 'red' }}-300 font-bold text-sm">{{ $tarjeta->minuto }}'</span>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-6 h-8 bg-{{ $tarjeta->tipo == 'amarilla' ? 'amber' : 'red' }}-500 rounded-sm flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">{{ $tarjeta->tipo == 'amarilla' ? 'A' : 'R' }}</span>
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold">
                                                {{ $tarjeta->jugador->nombre }} (#{{ $tarjeta->jugador->numero }})
                                            </p>
                                            <p class="text-blue-200 text-sm">{{ $tarjeta->jugador->equipo->nombre }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar Información -->
            <div class="space-y-6">
                <!-- Información del Partido -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600/20 to-purple-600/20 px-6 py-4 border-b border-white/10">
                        <h3 class="text-lg font-bold text-white">Información del Partido</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                    <span class="text-blue-300 text-sm font-bold">#</span>
                                </div>
                                <div>
                                    <p class="text-blue-200 text-sm">ID del Partido</p>
                                    <p class="text-white font-semibold">#{{ $partido->id }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-emerald-300" fill="currentColor" viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="10"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-blue-200 text-sm">Goles marcados</p>
                                    <p class="text-white font-semibold">{{ $partido->goles->count() }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-amber-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-amber-300" fill="currentColor" viewBox="0 0 20 20">
                                        <rect x="4" y="3" width="12" height="14" rx="2"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-blue-200 text-sm">Tarjetas mostradas</p>
                                    <p class="text-white font-semibold">{{ $partido->tarjetas->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600/20 to-pink-600/20 px-6 py-4 border-b border-white/10">
                        <h3 class="text-lg font-bold text-white">Acciones</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <a href="{{ route('admin.partidos.resultado', $partido) }}" class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg flex items-center justify-center text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                </svg>
                                Gestionar Resultado
                            </a>
                            
                            @if($partido->estado != 'finalizado')
                                <a href="{{ route('admin.partidos.edit', $partido) }}" class="w-full bg-gradient-to-r from-amber-500 to-yellow-600 hover:from-amber-600 hover:to-yellow-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg flex items-center justify-center text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Editar Partido
                                </a>
                            @endif
                            
                            <a href="{{ route('admin.equipos.show', $partido->equipoLocal) }}" class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg flex items-center justify-center text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Ver {{ $partido->equipoLocal->nombre }}
                            </a>
                            
                            <a href="{{ route('admin.equipos.show', $partido->equipoVisitante) }}" class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg flex items-center justify-center text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Ver {{ $partido->equipoVisitante->nombre }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de Navegación -->
        <div class="mt-8">
            <a href="{{ route('admin.partidos.index') }}" class="inline-flex items-center bg-gradient-to-r from-slate-500 to-slate-600 hover:from-slate-600 hover:to-slate-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver a Partidos
            </a>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 0.6s ease-out forwards;
    }
    
    /* Mejora la apariencia del glassmorphism */
    .backdrop-blur-lg {
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }
    
    /* Hover effects adicionales */
    .hover\:scale-105:hover {
        transform: scale(1.05);
    }
</style>

<script>
    // Animación suave para los elementos
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.bg-white\\/10');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('animate-fade-in-up');
        });
    });
</script>
@endsection