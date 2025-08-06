{{-- resources/views/admin/jugadores/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Detalle del Jugador: ' . $jugador->nombre)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Botón Volver -->
        <div class="mb-8">
            <a href="{{ route('admin.jugadores.index') }}" 
               class="inline-flex items-center bg-gradient-to-r from-slate-500 to-slate-600 hover:from-slate-600 hover:to-slate-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver a Jugadores
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Columna Izquierda: Información del Jugador -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Información Principal -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600/20 to-purple-600/20 px-8 py-6 border-b border-white/10">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Información del Jugador
                        </h2>
                    </div>
                    
                    <div class="p-8 text-center">
                        <!-- Avatar del Jugador -->
                        <div class="relative mb-6">
                            <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto shadow-2xl border-4 border-white/20">
                                <span class="text-3xl font-bold text-white">#{{ $jugador->numero }}</span>
                            </div>
                            <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-gradient-to-br from-emerald-500 to-green-600 rounded-full flex items-center justify-center border-2 border-white/20">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Nombre del Jugador -->
                        <h1 class="text-2xl font-bold text-white mb-2">{{ $jugador->nombre }}</h1>
                        
                        <!-- Información del Equipo -->
                        <div class="flex items-center justify-center mb-6 bg-white/5 rounded-xl p-3 border border-white/10">
                            @if($jugador->equipo && $jugador->equipo->escudo)
                                <img src="{{ Storage::url($jugador->equipo->escudo) }}" 
                                     alt="Escudo" 
                                     class="w-6 h-6 rounded-full mr-2 border border-white/20">
                            @else
                                <div class="w-6 h-6 bg-gradient-to-br from-gray-500 to-gray-600 rounded-full mr-2 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            @endif
                            <span class="text-gray-300 font-medium">{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</span>
                        </div>
                        
                        <!-- Botones de Acción -->
                        <div class="space-y-3">
                            <a href="{{ route('admin.jugadores.edit', $jugador) }}" 
                               class="w-full inline-flex items-center justify-center bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Editar Jugador
                            </a>
                            @if($jugador->equipo)
                                <a href="{{ route('admin.equipos.show', $jugador->equipo) }}" 
                                   class="w-full inline-flex items-center justify-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Ver Equipo
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Estadísticas -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-600/20 to-green-600/20 px-8 py-6 border-b border-white/10">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            Estadísticas
                        </h2>
                    </div>
                    
                    <div class="p-8">
                        <!-- Goles -->
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl border-4 border-white/20">
                                <span class="text-3xl font-bold text-white">{{ $estadisticas['goles'] }}</span>
                            </div>
                            <h3 class="text-lg font-semibold text-emerald-300">Goles Marcados</h3>
                            <p class="text-gray-400 text-sm">Total en la temporada</p>
                        </div>
                        
                        <div class="border-t border-white/10 pt-6">
                            <div class="grid grid-cols-2 gap-6">
                                <!-- Tarjetas Amarillas -->
                                <div class="text-center">
                                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg border-2 border-white/20">
                                        <span class="text-xl font-bold text-white">{{ $estadisticas['tarjetas_amarillas'] }}</span>
                                    </div>
                                    <h4 class="text-yellow-300 font-semibold text-sm">Amarillas</h4>
                                </div>
                                
                                <!-- Tarjetas Rojas -->
                                <div class="text-center">
                                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg border-2 border-white/20">
                                        <span class="text-xl font-bold text-white">{{ $estadisticas['tarjetas_rojas'] }}</span>
                                    </div>
                                    <h4 class="text-red-300 font-semibold text-sm">Rojas</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Historial -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Historial de Goles -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-600/20 to-green-600/20 px-8 py-6 border-b border-white/10">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            Historial de Goles
                            <span class="ml-auto bg-emerald-500/20 text-emerald-300 px-3 py-1 rounded-full text-sm font-medium border border-emerald-500/30">
                                {{ $jugador->goles->count() }} goles
                            </span>
                        </h2>
                    </div>
                    
                    <div class="p-8">
                        @if($jugador->goles->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="border-b border-white/10">
                                            <th class="text-left text-xs font-semibold text-blue-200 uppercase tracking-wider pb-3">Fecha</th>
                                            <th class="text-left text-xs font-semibold text-blue-200 uppercase tracking-wider pb-3">Partido</th>
                                            <th class="text-center text-xs font-semibold text-blue-200 uppercase tracking-wider pb-3">Minuto</th>
                                            <th class="text-center text-xs font-semibold text-blue-200 uppercase tracking-wider pb-3">Resultado</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-white/10">
                                        @foreach($jugador->goles->sortByDesc('partido.fecha') as $gol)
                                        <tr class="hover:bg-white/5 transition-all duration-200">
                                            <td class="py-4 pr-4">
                                                <span class="text-gray-300 text-sm font-medium">{{ $gol->partido->fecha->format('d/m/Y') }}</span>
                                            </td>
                                            <td class="py-4 pr-4">
                                                <div class="text-white text-sm font-medium">
                                                    {{ $gol->partido->equipoLocal->nombre }} vs {{ $gol->partido->equipoVisitante->nombre }}
                                                </div>
                                            </td>
                                            <td class="py-4 text-center">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                                                    {{ $gol->minuto }}'
                                                </span>
                                            </td>
                                            <td class="py-4 text-center">
                                                <span class="text-gray-300 font-mono text-sm">{{ $gol->partido->goles_local }} - {{ $gol->partido->goles_visitante }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-20 h-20 bg-gradient-to-br from-gray-500/20 to-gray-600/20 rounded-2xl flex items-center justify-center mx-auto mb-6 border border-white/20">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white mb-2">Sin goles aún</h3>
                                <p class="text-gray-400">Este jugador no ha marcado goles en la temporada actual.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Historial de Tarjetas -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-yellow-600/20 to-red-600/20 px-8 py-6 border-b border-white/10">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Historial de Tarjetas
                            <span class="ml-auto bg-yellow-500/20 text-yellow-300 px-3 py-1 rounded-full text-sm font-medium border border-yellow-500/30">
                                {{ $jugador->tarjetas->count() }} tarjetas
                            </span>
                        </h2>
                    </div>
                    
                    <div class="p-8">
                        @if($jugador->tarjetas->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="border-b border-white/10">
                                            <th class="text-left text-xs font-semibold text-blue-200 uppercase tracking-wider pb-3">Fecha</th>
                                            <th class="text-left text-xs font-semibold text-blue-200 uppercase tracking-wider pb-3">Partido</th>
                                            <th class="text-center text-xs font-semibold text-blue-200 uppercase tracking-wider pb-3">Tipo</th>
                                            <th class="text-center text-xs font-semibold text-blue-200 uppercase tracking-wider pb-3">Minuto</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-white/10">
                                        @foreach($jugador->tarjetas->sortByDesc('partido.fecha') as $tarjeta)
                                        <tr class="hover:bg-white/5 transition-all duration-200">
                                            <td class="py-4 pr-4">
                                                <span class="text-gray-300 text-sm font-medium">{{ $tarjeta->partido->fecha->format('d/m/Y') }}</span>
                                            </td>
                                            <td class="py-4 pr-4">
                                                <div class="text-white text-sm font-medium">
                                                    {{ $tarjeta->partido->equipoLocal->nombre }} vs {{ $tarjeta->partido->equipoVisitante->nombre }}
                                                </div>
                                            </td>
                                            <td class="py-4 text-center">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $tarjeta->tipo == 'amarilla' ? 'bg-yellow-500/20 text-yellow-300 border border-yellow-500/30' : 'bg-red-500/20 text-red-300 border border-red-500/30' }}">
                                                    <div class="w-3 h-4 {{ $tarjeta->tipo == 'amarilla' ? 'bg-yellow-400' : 'bg-red-500' }} rounded-sm mr-2"></div>
                                                    {{ ucfirst($tarjeta->tipo) }}
                                                </span>
                                            </td>
                                            <td class="py-4 text-center">
                                                <span class="text-gray-300 font-mono text-sm">{{ $tarjeta->minuto }}'</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-20 h-20 bg-gradient-to-br from-gray-500/20 to-gray-600/20 rounded-2xl flex items-center justify-center mx-auto mb-6 border border-white/20">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white mb-2">Sin tarjetas</h3>
                                <p class="text-gray-400">Este jugador tiene un historial limpio, sin tarjetas registradas.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Glassmorphism effect enhancement */
    .backdrop-blur-lg {
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }
    
    /* Animaciones suaves */
    .transition-all {
        transition: all 0.2s ease-in-out;
    }
    
    .hover\:scale-105:hover {
        transform: scale(1.05);
    }
    
    /* Animación de entrada */
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
    
    /* Animación de estadísticas con contador */
    @keyframes counter-up {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .animate-counter {
        animation: counter-up 0.8s ease-out forwards;
    }
    
    /* Efecto de hover para las filas de tabla */
    tr:hover {
        background-color: rgba(255, 255, 255, 0.05);
    }
    
    /* Scrollbar personalizada */
    .overflow-x-auto::-webkit-scrollbar {
        height: 8px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 4px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animación suave para los containers principales
        const containers = document.querySelectorAll('.bg-white\\/10');
        containers.forEach((container, index) => {
            container.classList.add('animate-fade-in-up');
            container.style.animationDelay = `${index * 0.15}s`;
        });
        
        // Animación para las estadísticas numéricas
        const estadisticas = [
            { element: document.querySelector('.text-3xl'), target: {{ $estadisticas['goles'] }} },
            { element: document.querySelectorAll('.text-xl')[0], target: {{ $estadisticas['tarjetas_amarillas'] }} },
            { element: document.querySelectorAll('.text-xl')[1], target: {{ $estadisticas['tarjetas_rojas'] }} }
        ];
        
        estadisticas.forEach((stat, index) => {
            if (stat.element) {
                setTimeout(() => {
                    stat.element.classList.add('animate-counter');
                    animateCounter(stat.element, stat.target);
                }, 500 + (index * 200));
            }
        });
        
        // Función para animar contador
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 30;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 50);
        }
        
        // Animación escalonada para las filas de tabla
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                row.style.transition = 'all 0.4s ease-out';
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, 800 + (index * 100));
        });
        
        // Efecto de hover mejorado para las tablas
        rows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(4px)';
                this.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
                this.style.boxShadow = 'none';
            });
        });
        
        // Tooltip mejorado para el avatar del jugador
        const avatar = document.querySelector('.w-24.h-24');
        if (avatar) {
            avatar.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1) rotate(5deg)';
            });
            
            avatar.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) rotate(0deg)';
            });
        }
    });
</script>
@endsection