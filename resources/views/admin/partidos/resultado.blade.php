{{-- resources/views/admin/partidos/resultado.blade.php --}}
@extends('layouts.admin')

@section('title', 'Gestionar Resultado del Partido')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header del Partido -->
        <div class="mb-8">
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600/20 to-indigo-600/20 px-8 py-6 border-b border-white/10">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Gestionar Resultado</h1>
                            <p class="text-blue-200">{{ $partido->equipoLocal->nombre }} vs {{ $partido->equipoVisitante->nombre }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Marcador -->
                <div class="px-8 py-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                        <!-- Equipo Local -->
                        <div class="text-center">
                            <div class="flex flex-col items-center space-y-4">
                                @if($partido->equipoLocal->escudo)
                                    <div class="w-20 h-20 bg-white/10 rounded-full p-3 backdrop-blur-sm border border-white/20">
                                        <img src="{{ Storage::url($partido->equipoLocal->escudo) }}" alt="Escudo" 
                                             class="w-full h-full object-contain">
                                    </div>
                                @endif
                                <div>
                                    <h3 class="text-xl font-bold text-white mb-2">{{ $partido->equipoLocal->nombre }}</h3>
                                    <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">
                                        {{ $partido->goles_local }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Centro - VS y Detalles -->
                        <div class="text-center">
                            <div class="space-y-4">
                                <h2 class="text-4xl font-bold text-white/80">VS</h2>
                                <div class="space-y-2">
                                    <p class="text-blue-200 font-medium">{{ $partido->fecha->format('d/m/Y H:i') }}</p>
                                    <div class="inline-flex">
                                        @php
                                            $estadoBadgeClass = match($partido->estado) {
                                                'finalizado' => 'bg-emerald-500/20 text-emerald-300 border-emerald-500/30',
                                                'en_curso' => 'bg-amber-500/20 text-amber-300 border-amber-500/30',
                                                default => 'bg-blue-500/20 text-blue-300 border-blue-500/30'
                                            };
                                        @endphp
                                        <span class="px-4 py-2 rounded-full text-sm font-semibold border {{ $estadoBadgeClass }} backdrop-blur-sm">
                                            {{ ucfirst(str_replace('_', ' ', $partido->estado)) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Equipo Visitante -->
                        <div class="text-center">
                            <div class="flex flex-col items-center space-y-4">
                                @if($partido->equipoVisitante->escudo)
                                    <div class="w-20 h-20 bg-white/10 rounded-full p-3 backdrop-blur-sm border border-white/20">
                                        <img src="{{ Storage::url($partido->equipoVisitante->escudo) }}" alt="Escudo" 
                                             class="w-full h-full object-contain">
                                    </div>
                                @endif
                                <div>
                                    <h3 class="text-xl font-bold text-white mb-2">{{ $partido->equipoVisitante->nombre }}</h3>
                                    <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">
                                        {{ $partido->goles_visitante }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formularios de Agregar -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Agregar Gol -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-emerald-600/20 to-green-600/20 px-6 py-4 border-b border-white/10">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <circle cx="10" cy="10" r="10"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Agregar Gol</h3>
                    </div>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.partidos.agregar-gol', $partido) }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="jugador_id_gol" class="block text-sm font-semibold text-blue-200 mb-2">Jugador *</label>
                            <select class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent backdrop-blur-sm @error('jugador_id') border-red-500 @enderror" 
                                    id="jugador_id_gol" name="jugador_id" required>
                                <option value="" class="bg-slate-800">Seleccionar jugador...</option>
                                <optgroup label="{{ $partido->equipoLocal->nombre }}" class="bg-slate-800">
                                    @foreach($jugadoresLocal as $jugador)
                                        <option value="{{ $jugador->id }}" class="bg-slate-800">
                                            #{{ $jugador->numero }} - {{ $jugador->nombre }}
                                        </option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="{{ $partido->equipoVisitante->nombre }}" class="bg-slate-800">
                                    @foreach($jugadoresVisitante as $jugador)
                                        <option value="{{ $jugador->id }}" class="bg-slate-800">
                                            #{{ $jugador->numero }} - {{ $jugador->nombre }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('jugador_id')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="minuto_gol" class="block text-sm font-semibold text-blue-200 mb-2">Minuto *</label>
                            <input type="number" 
                                   class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent backdrop-blur-sm @error('minuto') border-red-500 @enderror" 
                                   id="minuto_gol" name="minuto" min="1" max="120" placeholder="Ej: 45" required>
                            @error('minuto')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Agregar Gol
                        </button>
                    </form>
                </div>
            </div>

            <!-- Agregar Tarjeta -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-amber-600/20 to-yellow-600/20 px-6 py-4 border-b border-white/10">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-yellow-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <rect x="4" y="3" width="12" height="14" rx="2"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Agregar Tarjeta</h3>
                    </div>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.partidos.agregar-tarjeta', $partido) }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="jugador_id_tarjeta" class="block text-sm font-semibold text-blue-200 mb-2">Jugador *</label>
                            <select class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent backdrop-blur-sm @error('jugador_id') border-red-500 @enderror" 
                                    id="jugador_id_tarjeta" name="jugador_id" required>
                                <option value="" class="bg-slate-800">Seleccionar jugador...</option>
                                <optgroup label="{{ $partido->equipoLocal->nombre }}" class="bg-slate-800">
                                    @foreach($jugadoresLocal as $jugador)
                                        <option value="{{ $jugador->id }}" class="bg-slate-800">
                                            #{{ $jugador->numero }} - {{ $jugador->nombre }}
                                        </option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="{{ $partido->equipoVisitante->nombre }}" class="bg-slate-800">
                                    @foreach($jugadoresVisitante as $jugador)
                                        <option value="{{ $jugador->id }}" class="bg-slate-800">
                                            #{{ $jugador->numero }} - {{ $jugador->nombre }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('jugador_id')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="tipo" class="block text-sm font-semibold text-blue-200 mb-2">Tipo de Tarjeta *</label>
                            <select class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent backdrop-blur-sm @error('tipo') border-red-500 @enderror" 
                                    id="tipo" name="tipo" required>
                                <option value="" class="bg-slate-800">Seleccionar tipo...</option>
                                <option value="amarilla" class="bg-slate-800">Tarjeta Amarilla</option>
                                <option value="roja" class="bg-slate-800">Tarjeta Roja</option>
                            </select>
                            @error('tipo')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="minuto_tarjeta" class="block text-sm font-semibold text-blue-200 mb-2">Minuto *</label>
                            <input type="number" 
                                   class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent backdrop-blur-sm @error('minuto') border-red-500 @enderror" 
                                   id="minuto_tarjeta" name="minuto" min="1" max="120" placeholder="Ej: 23" required>
                            @error('minuto')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-yellow-600 hover:from-amber-600 hover:to-yellow-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Agregar Tarjeta
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Listas de Eventos -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Lista de Goles -->
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
                            {{ $goles->count() }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    @if($goles->count() > 0)
                        <div class="space-y-3">
                            @foreach($goles->sortBy('minuto') as $gol)
                            <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl border border-white/10 hover:bg-white/10 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                                        <span class="text-emerald-300 font-bold text-sm">{{ $gol->minuto }}'</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-semibold">
                                            #{{ $gol->jugador->numero }} {{ $gol->jugador->nombre }}
                                        </p>
                                        <p class="text-blue-200 text-sm">{{ $gol->jugador->equipo->nombre }}</p>
                                    </div>
                                </div>
                                <form action="{{ route('admin.partidos.eliminar-gol', $gol) }}" method="POST" class="inline"
                                      onsubmit="return confirm('¿Eliminar este gol?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 bg-red-500/20 hover:bg-red-500/30 text-red-400 rounded-lg flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-white/20 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                <circle cx="10" cy="10" r="10"/>
                            </svg>
                            <p class="text-white/60 text-lg">No hay goles registrados</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Lista de Tarjetas -->
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
                            {{ $tarjetas->count() }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    @if($tarjetas->count() > 0)
                        <div class="space-y-3">
                            @foreach($tarjetas->sortBy('minuto') as $tarjeta)
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
                                                #{{ $tarjeta->jugador->numero }} {{ $tarjeta->jugador->nombre }}
                                            </p>
                                            <p class="text-blue-200 text-sm">{{ $tarjeta->jugador->equipo->nombre }}</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('admin.partidos.eliminar-tarjeta', $tarjeta) }}" method="POST" class="inline"
                                      onsubmit="return confirm('¿Eliminar esta tarjeta?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 bg-red-500/20 hover:bg-red-500/30 text-red-400 rounded-lg flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-white/20 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                <rect x="4" y="3" width="12" height="14" rx="2"/>
                            </svg>
                            <p class="text-white/60 text-lg">No hay tarjetas registradas</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Estado del Partido y Navegación -->
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600/20 to-purple-600/20 px-6 py-4 border-b border-white/10">
                <h3 class="text-lg font-bold text-white">Estado del Partido</h3>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.partidos.update', $partido) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="equipo_local_id" value="{{ $partido->equipo_local_id }}">
                    <input type="hidden" name="equipo_visitante_id" value="{{ $partido->equipo_visitante_id }}">
                    <input type="hidden" name="fecha" value="{{ $partido->fecha->format('Y-m-d\TH:i') }}">
                    
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
                        <div class="md:col-span-3">
                            <label for="estado" class="block text-sm font-semibold text-blue-200 mb-2">Cambiar Estado</label>
                            <select class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent backdrop-blur-sm" 
                                    id="estado" name="estado">
                                <option value="programado" {{ $partido->estado == 'programado' ? 'selected' : '' }} class="bg-slate-800">
                                    Programado
                                </option>
                                <option value="en_curso" {{ $partido->estado == 'en_curso' ? 'selected' : '' }} class="bg-slate-800">
                                    En Curso
                                </option>
                                <option value="finalizado" {{ $partido->estado == 'finalizado' ? 'selected' : '' }} class="bg-slate-800">
                                    Finalizado
                                </option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200">
                                Actualizar
                            </button>
                        </div>
                        <div class="md:col-span-7 flex flex-col sm:flex-row gap-3 sm:justify-end">
                            <a href="{{ route('admin.partidos.show', $partido) }}" class="bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 text-center">
                                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Ver Partido
                            </a>
                            <a href="{{ route('admin.partidos.index') }}" class="bg-gradient-to-r from-slate-500 to-slate-600 hover:from-slate-600 hover:to-slate-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 text-center">
                                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Volver a Partidos
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Auto-actualizar la página cada 30 segundos si el partido está en curso
    @if($partido->estado == 'en_curso')
        setTimeout(function() {
            location.reload();
        }, 30000);
    @endif

    // Limpiar formularios después de envío exitoso
    @if(session('success'))
        document.getElementById('jugador_id_gol').value = '';
        document.getElementById('minuto_gol').value = '';
        document.getElementById('jugador_id_tarjeta').value = '';
        document.getElementById('tipo').value = '';
        document.getElementById('minuto_tarjeta').value = '';
    @endif

    // Efectos visuales adicionales
    document.addEventListener('DOMContentLoaded', function() {
        // Animación suave para los elementos
        const cards = document.querySelectorAll('.bg-white\\/10');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('animate-fade-in-up');
        });
    });
</script>

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
    
    /* Estilos personalizados para mejor apariencia en selects */
    select option {
        background-color: #1e293b !important;
        color: white !important;
    }
    
    /* Mejora la apariencia de los inputs number */
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    input[type="number"] {
        -moz-appearance: textfield;
    }
    
    /* Hover effects adicionales */
    .hover\:scale-105:hover {
        transform: scale(1.05);
    }
    
    /* Glassmorphism effect enhancement */
    .backdrop-blur-lg {
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }
</style>
@endsection