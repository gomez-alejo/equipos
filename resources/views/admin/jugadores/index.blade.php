{{-- resources/views/admin/jugadores/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Gestión de Jugadores')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-blue-600/20 to-purple-600/20 px-8 py-6 border-b border-white/10">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Gestión de Jugadores</h1>
                            <p class="text-blue-200">{{ $jugadores->count() }} jugadores registrados</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.jugadores.create') }}" 
                       class="inline-flex items-center bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Agregar Jugador
                    </a>
                </div>
            </div>
        </div>

        @if($jugadores->count() > 0)
            <!-- Tabla de Jugadores -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-slate-700/50 to-slate-600/50 border-b border-white/10">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-200 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-200 uppercase tracking-wider">Número</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-200 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-200 uppercase tracking-wider">Equipo</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-blue-200 uppercase tracking-wider">Goles</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-blue-200 uppercase tracking-wider">Tarjetas</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-blue-200 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach($jugadores as $jugador)
                                @php $stats = $jugador->getEstadisticas(); @endphp
                                <tr class="hover:bg-white/5 transition-all duration-200 group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-medium text-gray-300">#{{ $jugador->id }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 text-white font-bold text-sm rounded-lg shadow-lg">
                                            {{ $jugador->numero }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-white font-semibold text-sm">
                                                    {{ substr($jugador->nombre, 0, 1) }}
                                                </span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-white">{{ $jugador->nombre }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
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
                                            <span class="text-sm text-gray-300">{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $stats['goles'] > 0 ? 'bg-green-500/20 text-green-300 border border-green-500/30' : 'bg-gray-500/20 text-gray-400 border border-gray-500/30' }}">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9.5 9.293 8.207a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 00-1.414-1.414L11.414 9.5z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $stats['goles'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            @if($stats['tarjetas_amarillas'] > 0)
                                                <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-yellow-500/20 text-yellow-300 border border-yellow-500/30">
                                                    {{ $stats['tarjetas_amarillas'] }} A
                                                </span>
                                            @endif
                                            @if($stats['tarjetas_rojas'] > 0)
                                                <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-red-500/20 text-red-300 border border-red-500/30">
                                                    {{ $stats['tarjetas_rojas'] }} R
                                                </span>
                                            @endif
                                            @if($stats['tarjetas_amarillas'] == 0 && $stats['tarjetas_rojas'] == 0)
                                                <span class="text-gray-400 text-xs">Sin tarjetas</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <!-- Ver Detalles -->
                                            <a href="{{ route('admin.jugadores.show', $jugador) }}" 
                                               class="group/btn relative inline-flex items-center justify-center w-9 h-9 bg-gradient-to-br from-blue-500/20 to-blue-600/20 hover:from-blue-500/30 hover:to-blue-600/30 border border-blue-500/30 rounded-lg transition-all duration-200 hover:scale-110">
                                                <svg class="w-4 h-4 text-blue-300 group-hover/btn:text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-black/80 text-white text-xs rounded opacity-0 group-hover/btn:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                                                    Ver detalles
                                                </div>
                                            </a>
                                            
                                            <!-- Editar -->
                                            <a href="{{ route('admin.jugadores.edit', $jugador) }}" 
                                               class="group/btn relative inline-flex items-center justify-center w-9 h-9 bg-gradient-to-br from-amber-500/20 to-orange-600/20 hover:from-amber-500/30 hover:to-orange-600/30 border border-amber-500/30 rounded-lg transition-all duration-200 hover:scale-110">
                                                <svg class="w-4 h-4 text-amber-300 group-hover/btn:text-amber-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-black/80 text-white text-xs rounded opacity-0 group-hover/btn:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                                                    Editar
                                                </div>
                                            </a>
                                            
                                            <!-- Eliminar -->
                                            <form action="{{ route('admin.jugadores.destroy', $jugador) }}" 
                                                  method="POST" 
                                                  class="inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="group/btn relative inline-flex items-center justify-center w-9 h-9 bg-gradient-to-br from-red-500/20 to-red-600/20 hover:from-red-500/30 hover:to-red-600/30 border border-red-500/30 rounded-lg transition-all duration-200 hover:scale-110">
                                                    <svg class="w-4 h-4 text-red-300 group-hover/btn:text-red-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-black/80 text-white text-xs rounded opacity-0 group-hover/btn:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                                                        Eliminar
                                                    </div>
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
        @else
            <!-- Estado Vacío -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                <div class="text-center py-16 px-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-500/20 to-purple-600/20 rounded-2xl flex items-center justify-center mx-auto mb-6 border border-white/20">
                        <svg class="w-12 h-12 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">No hay jugadores registrados</h3>
                    <p class="text-gray-300 mb-8 max-w-md mx-auto">
                        Comienza agregando jugadores para gestionar tu equipo de fútbol y hacer seguimiento de sus estadísticas.
                    </p>
                    <a href="{{ route('admin.jugadores.create') }}" 
                       class="inline-flex items-center bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Agregar Primer Jugador
                    </a>
                </div>
            </div>
        @endif
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
    
    .hover\:scale-110:hover {
        transform: scale(1.1);
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
    
    /* Animación escalonada para las filas */
    @keyframes fade-in-stagger {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .animate-fade-in-stagger {
        animation: fade-in-stagger 0.4s ease-out forwards;
    }
    
    /* Efectos de hover mejorados */
    .group:hover .group-hover\:shadow-xl {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    /* Scrollbar personalizada para tabla */
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
        // Animación suave para los elementos principales
        const containers = document.querySelectorAll('.bg-white\\/10');
        containers.forEach((container, index) => {
            container.classList.add('animate-fade-in-up');
            container.style.animationDelay = `${index * 0.1}s`;
        });
        
        // Animación escalonada para las filas de la tabla
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach((row, index) => {
            row.classList.add('animate-fade-in-stagger');
            row.style.animationDelay = `${0.3 + (index * 0.05)}s`;
        });
        
        // Confirmación moderna para eliminación
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Crear modal de confirmación personalizado
                const modal = document.createElement('div');
                modal.className = 'fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4';
                
                modal.innerHTML = `
                    <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-6 max-w-md w-full mx-4 animate-fade-in-up">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">Confirmar Eliminación</h3>
                                <p class="text-gray-300 text-sm">Esta acción no se puede deshacer</p>
                            </div>
                        </div>
                        <p class="text-gray-300 mb-6">¿Estás seguro de que deseas eliminar este jugador? Se perderán todas sus estadísticas asociadas.</p>
                        <div class="flex space-x-3">
                            <button class="cancel-btn flex-1 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-200">
                                Cancelar
                            </button>
                            <button class="confirm-btn flex-1 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-200">
                                Eliminar
                            </button>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(modal);
                
                // Manejar clics en los botones
                modal.querySelector('.cancel-btn').addEventListener('click', () => {
                    modal.remove();
                });
                
                modal.querySelector('.confirm-btn').addEventListener('click', () => {
                    form.submit();
                });
                
                // Cerrar al hacer clic fuera del modal
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.remove();
                    }
                });
            });
        });
        
        // Contar estadísticas para mostrar en el header
        const totalJugadores = {{ $jugadores->count() }};
        if (totalJugadores > 0) {
            // Agregar contador animado
            const counter = document.querySelector('p.text-blue-200');
            if (counter) {
                let count = 0;
                const increment = totalJugadores / 30;
                const timer = setInterval(() => {
                    count += increment;
                    if (count >= totalJugadores) {
                        counter.textContent = `${totalJugadores} jugadores registrados`;
                        clearInterval(timer);
                    } else {
                        counter.textContent = `${Math.floor(count)} jugadores registrados`;
                    }
                }, 50);
            }
        }
    });
</script>
@endsection