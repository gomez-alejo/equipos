{{-- resources/views/admin/partidos/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Editar Partido')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-blue-100 to-indigo-100 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center space-x-3 mb-2">
                <div class="p-2 bg-blue-600 rounded-lg">
                    <i class="fas fa-edit text-white text-lg"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Editar Partido</h1>
            </div>
            <p class="text-gray-600">Modifica la información del partido seleccionado</p>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg backdrop-blur-sm">
                            <i class="fas fa-futbol text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-white">Información del Partido</h2>
                            <p class="text-blue-100 text-sm">Complete todos los campos requeridos</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-8">
                <form action="{{ route('admin.partidos.update', $partido) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Teams Section -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Equipo Local -->
                        <div class="space-y-2">
                            <label for="equipo_local_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-home text-blue-600 mr-2"></i>Equipo Local *
                            </label>
                            <div class="relative">
                                <select class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 bg-white text-gray-900 font-medium @error('equipo_local_id') border-red-300 focus:border-red-500 focus:ring-red-100 @enderror" 
                                        id="equipo_local_id" name="equipo_local_id" required>
                                    <option value="" class="text-gray-500">Seleccionar equipo local...</option>
                                    @foreach($equipos as $equipo)
                                        <option value="{{ $equipo->id }}" 
                                                {{ old('equipo_local_id', $partido->equipo_local_id) == $equipo->id ? 'selected' : '' }}>
                                            {{ $equipo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                            @error('equipo_local_id')
                                <div class="flex items-center space-x-2 text-red-600 text-sm mt-2">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Equipo Visitante -->
                        <div class="space-y-2">
                            <label for="equipo_visitante_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-plane text-blue-600 mr-2"></i>Equipo Visitante *
                            </label>
                            <div class="relative">
                                <select class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 bg-white text-gray-900 font-medium @error('equipo_visitante_id') border-red-300 focus:border-red-500 focus:ring-red-100 @enderror" 
                                        id="equipo_visitante_id" name="equipo_visitante_id" required>
                                    <option value="" class="text-gray-500">Seleccionar equipo visitante...</option>
                                    @foreach($equipos as $equipo)
                                        <option value="{{ $equipo->id }}" 
                                                {{ old('equipo_visitante_id', $partido->equipo_visitante_id) == $equipo->id ? 'selected' : '' }}>
                                            {{ $equipo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                            @error('equipo_visitante_id')
                                <div class="flex items-center space-x-2 text-red-600 text-sm mt-2">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Date and Status Section -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Fecha -->
                        <div class="space-y-2">
                            <label for="fecha" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-calendar-alt text-blue-600 mr-2"></i>Fecha y Hora del Partido *
                            </label>
                            <div class="relative">
                                <input type="datetime-local" 
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 bg-white text-gray-900 font-medium @error('fecha') border-red-300 focus:border-red-500 focus:ring-red-100 @enderror" 
                                       id="fecha" name="fecha" 
                                       value="{{ old('fecha', $partido->fecha->format('Y-m-d\TH:i')) }}" required>
                                <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                    <i class="fas fa-clock text-gray-400"></i>
                                </div>
                            </div>
                            @error('fecha')
                                <div class="flex items-center space-x-2 text-red-600 text-sm mt-2">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Estado -->
                        <div class="space-y-2">
                            <label for="estado" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-flag text-blue-600 mr-2"></i>Estado del Partido *
                            </label>
                            <div class="relative">
                                <select class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 bg-white text-gray-900 font-medium @error('estado') border-red-300 focus:border-red-500 focus:ring-red-100 @enderror" 
                                        id="estado" name="estado" required>
                                    <option value="programado" class="flex items-center" {{ old('estado', $partido->estado) == 'programado' ? 'selected' : '' }}>
                                        📅 Programado
                                    </option>
                                    <option value="en_curso" class="flex items-center" {{ old('estado', $partido->estado) == 'en_curso' ? 'selected' : '' }}>
                                        ⚽ En Curso
                                    </option>
                                    <option value="finalizado" class="flex items-center" {{ old('estado', $partido->estado) == 'finalizado' ? 'selected' : '' }}>
                                        🏆 Finalizado
                                    </option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                            @error('estado')
                                <div class="flex items-center space-x-2 text-red-600 text-sm mt-2">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.partidos.index') }}" 
                           class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 focus:ring-4 focus:ring-gray-100 font-semibold transition-all duration-200 group">
                            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-200"></i>
                            Volver
                        </a>
                        
                        <button type="submit" 
                                class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl focus:ring-4 focus:ring-blue-100 transition-all duration-200 group">
                            <i class="fas fa-save mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                            Actualizar Partido
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Additional Info Card -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-4">
            <div class="flex items-start space-x-3">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-info-circle text-blue-600"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-blue-900 mb-1">Información importante</h3>
                    <p class="text-blue-700 text-sm">
                        Asegúrate de verificar que los equipos seleccionados sean correctos y que la fecha del partido esté dentro del calendario de la temporada.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom styles for enhanced UX */
    .form-select option {
        padding: 8px 12px;
    }
    
    .form-select:focus option:checked,
    .form-select:focus option:hover {
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        color: white;
    }
    
    /* Smooth transitions for all interactive elements */
    select, input, button, a {
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Focus states enhancement */
    select:focus, input:focus {
        transform: translateY(-1px);
        box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.1), 0 8px 10px -6px rgba(59, 130, 246, 0.1);
    }
    
    /* Button hover effects */
    button:hover, a:hover {
        transform: translateY(-1px);
    }
</style>
@endsection