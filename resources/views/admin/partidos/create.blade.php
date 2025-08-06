{{-- resources/views/admin/partidos/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Programar Partido')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-gradient-to-r from-blue-800/30 to-indigo-800/30 backdrop-blur-sm border border-blue-700/30 rounded-2xl p-6 shadow-2xl">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl shadow-lg">
                        <i class="fas fa-calendar-plus text-2xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">Programar Nuevo Partido</h1>
                        <p class="text-blue-200/80">Configura un enfrentamiento entre dos equipos</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.partidos.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Teams Selection Section -->
                    <div class="bg-gradient-to-r from-blue-600/10 to-purple-600/10 border border-blue-500/20 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-white mb-6 flex items-center space-x-2">
                            <i class="fas fa-users text-blue-400"></i>
                            <span>Selección de Equipos</span>
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Local Team -->
                            <div class="space-y-3">
                                <label for="equipo_local_id" class="block text-sm font-semibold text-white mb-3 flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center">
                                        <i class="fas fa-home text-white text-xs"></i>
                                    </div>
                                    <span>Equipo Local</span>
                                    <span class="text-red-400">*</span>
                                </label>
                                
                                <div class="relative">
                                    <select class="w-full px-4 py-4 bg-white/10 border border-white/20 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm appearance-none
                                                   @error('equipo_local_id') border-red-500 bg-red-500/10 @enderror" 
                                            id="equipo_local_id" 
                                            name="equipo_local_id" 
                                            required>
                                        <option value="" class="bg-slate-800 text-white">Seleccionar equipo local...</option>
                                        @foreach($equipos as $equipo)
                                            <option value="{{ $equipo->id }}" 
                                                    class="bg-slate-800 text-white" 
                                                    {{ old('equipo_local_id') == $equipo->id ? 'selected' : '' }}>
                                                {{ $equipo->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                        <i class="fas fa-chevron-down text-white/30"></i>
                                    </div>
                                </div>
                                
                                @error('equipo_local_id')
                                    <div class="flex items-center space-x-2 mt-2 p-3 bg-red-500/20 border border-red-500/30 rounded-lg">
                                        <i class="fas fa-exclamation-triangle text-red-400"></i>
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Versus Indicator -->
                            <div class="hidden md:flex md:items-center md:justify-center md:col-span-2">
                                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center shadow-2xl">
                                    <span class="text-white font-bold text-xl">VS</span>
                                </div>
                            </div>

                            <!-- Visiting Team -->
                            <div class="space-y-3 md:col-start-2">
                                <label for="equipo_visitante_id" class="block text-sm font-semibold text-white mb-3 flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                                        <i class="fas fa-plane text-white text-xs"></i>
                                    </div>
                                    <span>Equipo Visitante</span>
                                    <span class="text-red-400">*</span>
                                </label>
                                
                                <div class="relative">
                                    <select class="w-full px-4 py-4 bg-white/10 border border-white/20 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm appearance-none
                                                   @error('equipo_visitante_id') border-red-500 bg-red-500/10 @enderror" 
                                            id="equipo_visitante_id" 
                                            name="equipo_visitante_id" 
                                            required>
                                        <option value="" class="bg-slate-800 text-white">Seleccionar equipo visitante...</option>
                                        @foreach($equipos as $equipo)
                                            <option value="{{ $equipo->id }}" 
                                                    class="bg-slate-800 text-white" 
                                                    {{ old('equipo_visitante_id') == $equipo->id ? 'selected' : '' }}>
                                                {{ $equipo->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                        <i class="fas fa-chevron-down text-white/30"></i>
                                    </div>
                                </div>
                                
                                @error('equipo_visitante_id')
                                    <div class="flex items-center space-x-2 mt-2 p-3 bg-red-500/20 border border-red-500/30 rounded-lg">
                                        <i class="fas fa-exclamation-triangle text-red-400"></i>
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Match Date/Time Section -->
                    <div class="space-y-3">
                        <label for="fecha" class="block text-sm font-semibold text-white mb-3 flex items-center space-x-2">
                            <i class="fas fa-calendar-alt text-purple-400"></i>
                            <span>Fecha y Hora del Partido</span>
                            <span class="text-red-400">*</span>
                        </label>
                        
                        <div class="relative">
                            <input type="datetime-local" 
                                   class="w-full px-4 py-4 bg-white/10 border border-white/20 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm
                                          @error('fecha') border-red-500 bg-red-500/10 @enderror" 
                                   id="fecha" 
                                   name="fecha" 
                                   value="{{ old('fecha') }}" 
                                   required>
                            
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                <i class="fas fa-clock text-white/30"></i>
                            </div>
                        </div>
                        
                        @error('fecha')
                            <div class="flex items-center space-x-2 mt-2 p-3 bg-red-500/20 border border-red-500/30 rounded-lg">
                                <i class="fas fa-exclamation-triangle text-red-400"></i>
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            </div>
                        @enderror
                        
                        <div class="flex items-center space-x-2 mt-3 p-3 bg-purple-500/20 border border-purple-500/30 rounded-lg">
                            <i class="fas fa-info-circle text-purple-400"></i>
                            <span class="text-purple-400 text-sm">Selecciona la fecha y hora en que se jugará el partido</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-4 pt-8 border-t border-white/10">
                        <a href="{{ route('admin.partidos.index') }}" 
                           class="inline-flex items-center justify-center space-x-2 px-6 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl border border-white/20 hover:border-white/30 transition-all duration-300 backdrop-blur-sm group">
                            <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform duration-300"></i>
                            <span>Volver</span>
                        </a>
                        
                        <button type="submit" 
                                class="inline-flex items-center justify-center space-x-2 px-8 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-transparent">
                            <i class="fas fa-save"></i>
                            <span>Programar Partido</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Help Section -->
        <div class="mt-8">
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl">
                <h4 class="text-lg font-semibold text-white mb-4 flex items-center space-x-2">
                    <i class="fas fa-lightbulb text-yellow-400"></i>
                    <span>Información Importante</span>
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-start space-x-3 p-4 bg-white/5 rounded-lg border border-white/10">
                        <i class="fas fa-shield-alt text-green-400 mt-1"></i>
                        <div>
                            <p class="text-white font-medium mb-1">Equipos únicos</p>
                            <p class="text-white/70 text-sm">Un equipo no puede jugar contra sí mismo. El sistema evita esta selección automáticamente.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 p-4 bg-white/5 rounded-lg border border-white/10">
                        <i class="fas fa-calendar-check text-blue-400 mt-1"></i>
                        <div>
                            <p class="text-white font-medium mb-1">Programación</p>
                            <p class="text-white/70 text-sm">Puedes programar partidos para fechas futuras. Los resultados se cargan después del partido.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Evitar que el mismo equipo sea local y visitante
    document.getElementById('equipo_local_id').addEventListener('change', function() {
        const localId = this.value;
        const visitanteSelect = document.getElementById('equipo_visitante_id');
        
        Array.from(visitanteSelect.options).forEach(option => {
            if (option.value === localId) {
                option.disabled = true;
                option.style.opacity = '0.5';
                if (option.selected) {
                    visitanteSelect.value = '';
                }
            } else {
                option.disabled = false;
                option.style.opacity = '1';
            }
        });
        
        // Actualizar estilo del select visitante
        updateSelectAppearance('equipo_visitante_id');
    });

    document.getElementById('equipo_visitante_id').addEventListener('change', function() {
        const visitanteId = this.value;
        const localSelect = document.getElementById('equipo_local_id');
        
        Array.from(localSelect.options).forEach(option => {
            if (option.value === visitanteId) {
                option.disabled = true;
                option.style.opacity = '0.5';
                if (option.selected) {
                    localSelect.value = '';
                }
            } else {
                option.disabled = false;
                option.style.opacity = '1';
            }
        });
        
        // Actualizar estilo del select local
        updateSelectAppearance('equipo_local_id');
    });

    function updateSelectAppearance(selectId) {
        const select = document.getElementById(selectId);
        if (select.value) {
            select.classList.add('ring-2');
            if (selectId === 'equipo_local_id') {
                select.classList.add('ring-green-500');
                select.classList.remove('ring-blue-500');
            } else {
                select.classList.add('ring-blue-500');
                select.classList.remove('ring-green-500');
            }
        } else {
            select.classList.remove('ring-2', 'ring-green-500', 'ring-blue-500');
        }
    }

    // Agregar efectos visuales cuando se seleccionan equipos
    document.addEventListener('DOMContentLoaded', function() {
        const localSelect = document.getElementById('equipo_local_id');
        const visitanteSelect = document.getElementById('equipo_visitante_id');
        
        [localSelect, visitanteSelect].forEach(select => {
            select.addEventListener('change', function() {
                updateSelectAppearance(this.id);
            });
        });
    });
</script>
@endsection