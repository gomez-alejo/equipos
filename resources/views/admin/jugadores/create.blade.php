{{-- resources/views/admin/jugadores/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Agregar Jugador')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user-plus text-white text-lg"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Agregar Nuevo Jugador</h3>
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-8">
                <form action="{{ route('admin.jugadores.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Nombre del Jugador -->
                    <div class="space-y-2">
                        <label for="nombre" class="block text-sm font-semibold text-slate-700">
                            Nombre del Jugador
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <input type="text" 
                               class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white @error('nombre') border-red-500 ring-2 ring-red-200 @enderror" 
                               id="nombre" 
                               name="nombre" 
                               value="{{ old('nombre') }}" 
                               placeholder="Ingrese el nombre completo del jugador"
                               required>
                        @error('nombre')
                            <div class="flex items-center space-x-2 text-red-600 text-sm mt-1">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Número de Camiseta -->
                    <div class="space-y-2">
                        <label for="numero" class="block text-sm font-semibold text-slate-700">
                            Número de Camiseta
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <input type="number" 
                               class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white @error('numero') border-red-500 ring-2 ring-red-200 @enderror" 
                               id="numero" 
                               name="numero" 
                               value="{{ old('numero') }}" 
                               min="1" 
                               max="99" 
                               placeholder="Ej: 10"
                               required>
                        <div class="flex items-center space-x-2 text-slate-500 text-sm">
                            <i class="fas fa-info-circle"></i>
                            <span>Número entre 1 y 99</span>
                        </div>
                        @error('numero')
                            <div class="flex items-center space-x-2 text-red-600 text-sm">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Equipo -->
                    <div class="space-y-2">
                        <label for="equipo_id" class="block text-sm font-semibold text-slate-700">
                            Equipo
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white @error('equipo_id') border-red-500 ring-2 ring-red-200 @enderror" 
                                id="equipo_id" 
                                name="equipo_id" 
                                required>
                            <option value="" class="text-slate-400">Seleccionar equipo...</option>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}" 
                                        class="text-slate-700"
                                        {{ old('equipo_id', request('equipo_id')) == $equipo->id ? 'selected' : '' }}>
                                    {{ $equipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('equipo_id')
                            <div class="flex items-center space-x-2 text-red-600 text-sm">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-slate-200">
                        <a href="{{ route('admin.jugadores.index') }}" 
                           class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border-2 border-slate-300 text-slate-700 font-medium rounded-xl hover:bg-slate-50 hover:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition-all duration-200 group">
                            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-200"></i>
                            Volver
                        </a>
                        <button type="submit" 
                                class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl group">
                            <i class="fas fa-save mr-2 group-hover:rotate-12 transition-transform duration-200"></i>
                            Agregar Jugador
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Información adicional -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-4">
            <div class="flex items-start space-x-3">
                <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-lightbulb text-blue-600 text-xs"></i>
                </div>
                <div class="text-sm text-blue-800">
                    <p class="font-medium mb-1">Consejos para agregar jugadores:</p>
                    <ul class="list-disc list-inside space-y-1 text-blue-700">
                        <li>Asegúrate de que el número de camiseta no esté ya en uso en el equipo</li>
                        <li>Verifica que el nombre esté correctamente escrito</li>
                        <li>Los campos marcados con * son obligatorios</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

