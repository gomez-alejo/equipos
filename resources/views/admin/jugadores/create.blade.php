{{-- resources/views/admin/jugadores/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Editar Jugador')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-amber-600/20 to-orange-600/20 px-8 py-6 border-b border-white/10">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Editar Jugador</h1>
                        <p class="text-amber-200">{{ $jugador->nombre }} - #{{ $jugador->numero }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Formulario -->
            <div class="p-8">
                <form action="{{ route('admin.jugadores.update', $jugador) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')
                    
                    <!-- Nombre del Jugador -->
                    <div class="space-y-2">
                        <label for="nombre" class="block text-sm font-semibold text-blue-200">
                            Nombre del Jugador *
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input type="text" 
                                   class="w-full pl-12 pr-4 py-4 bg-white/5 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent backdrop-blur-sm transition-all duration-200 @error('nombre') border-red-500 ring-2 ring-red-500/20 @enderror" 
                                   id="nombre" 
                                   name="nombre" 
                                   value="{{ old('nombre', $jugador->nombre) }}" 
                                   placeholder="Ej: Carlos Rodríguez"
                                   required>
                        </div>
                        @error('nombre')
                            <div class="flex items-center space-x-2 text-red-400 text-sm mt-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Número de Camiseta -->
                    <div class="space-y-2">
                        <label for="numero" class="block text-sm font-semibold text-blue-200">
                            Número de Camiseta *
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                            </div>
                            <input type="number" 
                                   class="w-full pl-12 pr-4 py-4 bg-white/5 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent backdrop-blur-sm transition-all duration-200 @error('numero') border-red-500 ring-2 ring-red-500/20 @enderror" 
                                   id="numero" 
                                   name="numero" 
                                   value="{{ old('numero', $jugador->numero) }}" 
                                   min="1" 
                                   max="99" 
                                   placeholder="Ej: 10"
                                   required>
                        </div>
                        <p class="text-blue-300 text-sm flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <span>Número entre 1 y 99</span>
                        </p>
                        @error('numero')
                            <div class="flex items-center space-x-2 text-red-400 text-sm mt-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Equipo -->
                    <div class="space-y-2">
                        <label for="equipo_id" class="block text-sm font-semibold text-blue-200">
                            Equipo *
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <select class="w-full pl-12 pr-4 py-4 bg-white/5 border border-white/20 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent backdrop-blur-sm transition-all duration-200 @error('equipo_id') border-red-500 ring-2 ring-red-500/20 @enderror" 
                                    id="equipo_id" 
                                    name="equipo_id" 
                                    required>
                                <option value="" class="bg-slate-800">Seleccionar equipo...</option>
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}" 
                                            class="bg-slate-800"
                                            {{ old('equipo_id', $jugador->equipo_id) == $equipo->id ? 'selected' : '' }}>
                                        {{ $equipo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('equipo_id')
                            <div class="flex items-center space-x-2 text-red-400 text-sm mt-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Información Actual -->
                    <div class="bg-blue-500/10 border border-blue-500/20 rounded-xl p-4">
                        <div class="flex items-center space-x-2 mb-3">
                            <svg class="w-5 h-5 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <h4 class="text-blue-200 font-semibold">Información Actual</h4>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                            <div>
                                <p class="text-blue-300">Nombre:</p>
                                <p class="text-white font-medium">{{ $jugador->nombre }}</p>
                            </div>
                            <div>
                                <p class="text-blue-300">Número:</p>
                                <p class="text-white font-medium">#{{ $jugador->numero }}</p>
                            </div>
                            <div>
                                <p class="text-blue-300">Equipo:</p>
                                <p class="text-white font-medium">{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex flex-col sm:flex-row justify-between space-y-4 sm:space-y-0 sm:space-x-4 pt-6">
                        <a href="{{ route('admin.jugadores.index') }}" 
                           class="inline-flex items-center justify-center bg-gradient-to-r from-slate-500 to-slate-600 hover:from-slate-600 hover:to-slate-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Volver
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center justify-center bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                            Actualizar Jugador
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Mejora la apariencia de los inputs number */
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    input[type="number"] {
        -moz-appearance: textfield;
    }
    
    /* Estilos personalizados para selects */
    select option {
        background-color: #1e293b !important;
        color: white !important;
    }
    
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
    
    /* Efecto pulsante suave para la información actual */
    @keyframes soft-pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.8;
        }
    }
    
    .animate-soft-pulse {
        animation: soft-pulse 3s ease-in-out infinite;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animación suave para el formulario
        const form = document.querySelector('.bg-white\\/10');
        if (form) {
            form.classList.add('animate-fade-in-up');
        }
        
        // Validación en tiempo real para el número de camiseta
        const numeroInput = document.getElementById('numero');
        const originalNumber = {{ $jugador->numero }};
        
        if (numeroInput) {
            numeroInput.addEventListener('input', function() {
                const value = parseInt(this.value);
                if (value < 1 || value > 99) {
                    this.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                } else {
                    this.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
                }
            });
        }
        
        // Focus automático en el primer campo
        const firstInput = document.getElementById('nombre');
        if (firstInput) {
            setTimeout(() => {
                firstInput.focus();
                firstInput.select(); // Selecciona todo el texto para facilitar la edición
            }, 300);
        }
        
        // Animación suave para el panel de información actual
        const infoPanel = document.querySelector('.bg-blue-500\\/10');
        if (infoPanel) {
            setTimeout(() => {
                infoPanel.classList.add('animate-soft-pulse');
            }, 1000);
        }
        
        // Confirmación de cambios
        const form = document.querySelector('form');
        let originalFormData = new FormData(form);
        
        form.addEventListener('submit', function(e) {
            const currentFormData = new FormData(form);
            let hasChanges = false;
            
            for (let [key, value] of currentFormData.entries()) {
                if (originalFormData.get(key) !== value) {
                    hasChanges = true;
                    break;
                }
            }
            
            if (!hasChanges) {
                e.preventDefault();
                alert('No se han realizado cambios en el jugador.');
                return false;
            }
        });
        
        // Prevenir pérdida de datos accidental
        window.addEventListener('beforeunload', function(e) {
            const currentFormData = new FormData(form);
            let hasChanges = false;
            
            for (let [key, value] of currentFormData.entries()) {
                if (originalFormData.get(key) !== value) {
                    hasChanges = true;
                    break;
                }
            }
            
            if (hasChanges) {
                e.preventDefault();
                e.returnValue = '';
                return '';
            }
        });
        
        // Actualizar datos originales cuando se envía el formulario exitosamente
        form.addEventListener('submit', function() {
            originalFormData = new FormData(form);
        });
    });
</script>
@endsection