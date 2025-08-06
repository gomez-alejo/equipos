{{-- resources/views/admin/partidos/resultado.blade.php --}}
@extends('layouts.admin')

@section('title', 'Gestionar Resultado del Partido')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="mb-0">
                    <i class="fas fa-clipboard-list"></i> 
                    Gestionar Resultado: {{ $partido->equipoLocal->nombre }} vs {{ $partido->equipoVisitante->nombre }}
                </h3>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="text-center">
                            @if($partido->equipoLocal->escudo)
                                <img src="{{ Storage::url($partido->equipoLocal->escudo) }}" alt="Escudo" 
                                     width="60" height="60" class="mb-2">
                            @endif
                            <h5>{{ $partido->equipoLocal->nombre }}</h5>
                            <h2 class="text-primary">{{ $partido->goles_local }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h3>VS</h3>
                            <p class="mb-0">{{ $partido->fecha->format('d/m/Y H:i') }}</p>
                            <span class="badge bg-{{ $partido->estado == 'finalizado' ? 'success' : ($partido->estado == 'en_curso' ? 'warning' : 'primary') }}">
                                {{ ucfirst(str_replace('_', ' ', $partido->estado)) }}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            @if($partido->equipoVisitante->escudo)
                                <img src="{{ Storage::url($partido->equipoVisitante->escudo) }}" alt="Escudo" 
                                     width="60" height="60" class="mb-2">
                            @endif
                            <h5>{{ $partido->equipoVisitante->nombre }}</h5>
                            <h2 class="text-primary">{{ $partido->goles_visitante }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Agregar Gol -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-futbol"></i> Agregar Gol</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.partidos.agregar-gol', $partido) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="jugador_id_gol" class="form-label">Jugador *</label>
                        <select class="form-select @error('jugador_id') is-invalid @enderror" 
                                id="jugador_id_gol" name="jugador_id" required>
                            <option value="">Seleccionar jugador...</option>
                            <optgroup label="{{ $partido->equipoLocal->nombre }}">
                                @foreach($jugadoresLocal as $jugador)
                                    <option value="{{ $jugador->id }}">
                                        #{{ $jugador->numero }} - {{ $jugador->nombre }}
                                    </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="{{ $partido->equipoVisitante->nombre }}">
                                @foreach($jugadoresVisitante as $jugador)
                                    <option value="{{ $jugador->id }}">
                                        #{{ $jugador->numero }} - {{ $jugador->nombre }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('jugador_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="minuto_gol" class="form-label">Minuto *</label>
                        <input type="number" class="form-control @error('minuto') is-invalid @enderror" 
                               id="minuto_gol" name="minuto" min="1" max="120" required>
                        @error('minuto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-plus"></i> Agregar Gol
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Agregar Tarjeta -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-square"></i> Agregar Tarjeta</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.partidos.agregar-tarjeta', $partido) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="jugador_id_tarjeta" class="form-label">Jugador *</label>
                        <select class="form-select @error('jugador_id') is-invalid @enderror" 
                                id="jugador_id_tarjeta" name="jugador_id" required>
                            <option value="">Seleccionar jugador...</option>
                            <optgroup label="{{ $partido->equipoLocal->nombre }}">
                                @foreach($jugadoresLocal as $jugador)
                                    <option value="{{ $jugador->id }}">
                                        #{{ $jugador->numero }} - {{ $jugador->nombre }}
                                    </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="{{ $partido->equipoVisitante->nombre }}">
                                @foreach($jugadoresVisitante as $jugador)
                                    <option value="{{ $jugador->id }}">
                                        #{{ $jugador->numero }} - {{ $jugador->nombre }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('jugador_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo de Tarjeta *</label>
                        <select class="form-select @error('tipo') is-invalid @enderror" 
                                id="tipo" name="tipo" required>
                            <option value="">Seleccionar tipo...</option>
                            <option value="amarilla">Tarjeta Amarilla</option>
                            <option value="roja">Tarjeta Roja</option>
                        </select>
                        @error('tipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="minuto_tarjeta" class="form-label">Minuto *</label>
                        <input type="number" class="form-control @error('minuto') is-invalid @enderror" 
                               id="minuto_tarjeta" name="minuto" min="1" max="120" required>
                        @error('minuto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-plus"></i> Agregar Tarjeta
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <!-- Lista de Goles -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-futbol"></i> Goles del Partido ({{ $goles->count() }})</h5>
            </div>
            <div class="card-body">
                @if($goles->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Min</th>
                                    <th>Jugador</th>
                                    <th>Equipo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($goles->sortBy('minuto') as $gol)
                                <tr>
                                    <td><strong>{{ $gol->minuto }}'</strong></td>
                                    <td>
                                        #{{ $gol->jugador->numero }} {{ $gol->jugador->nombre }}
                                    </td>
                                    <td>
                                        <small>{{ $gol->jugador->equipo->nombre }}</small>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.partidos.eliminar-gol', $gol) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('¿Eliminar este gol?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-3">
                        <i class="fas fa-futbol fa-2x text-muted mb-2"></i>
                        <p class="text-muted mb-0">No hay goles registrados</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Lista de Tarjetas -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-square"></i> Tarjetas del Partido ({{ $tarjetas->count() }})</h5>
            </div>
            <div class="card-body">
                @if($tarjetas->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Min</th>
                                    <th>Tipo</th>
                                    <th>Jugador</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tarjetas->sortBy('minuto') as $tarjeta)
                                <tr>
                                    <td><strong>{{ $tarjeta->minuto }}'</strong></td>
                                    <td>
                                        <span class="badge bg-{{ $tarjeta->tipo == 'amarilla' ? 'warning text-dark' : 'danger' }}">
                                            {{ $tarjeta->tipo == 'amarilla' ? 'A' : 'R' }}
                                        </span>
                                    </td>
                                    <td>
                                        <small>
                                            #{{ $tarjeta->jugador->numero }} {{ $tarjeta->jugador->nombre }}<br>
                                            <em>{{ $tarjeta->jugador->equipo->nombre }}</em>
                                        </small>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.partidos.eliminar-tarjeta', $tarjeta) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('¿Eliminar esta tarjeta?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-3">
                        <i class="fas fa-square fa-2x text-muted mb-2"></i>
                        <p class="text-muted mb-0">No hay tarjetas registradas</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Estado del Partido</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.partidos.update', $partido) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="equipo_local_id" value="{{ $partido->equipo_local_id }}">
                    <input type="hidden" name="equipo_visitante_id" value="{{ $partido->equipo_visitante_id }}">
                    <input type="hidden" name="fecha" value="{{ $partido->fecha->format('Y-m-d\TH:i') }}">
                    
                    <div class="row align-items-end">
                        <div class="col-md-3">
                            <label for="estado" class="form-label">Cambiar Estado</label>
                            <select class="form-select" id="estado" name="estado">
                                <option value="programado" {{ $partido->estado == 'programado' ? 'selected' : '' }}>
                                    Programado
                                </option>
                                <option value="en_curso" {{ $partido->estado == 'en_curso' ? 'selected' : '' }}>
                                    En Curso
                                </option>
                                <option value="finalizado" {{ $partido->estado == 'finalizado' ? 'selected' : '' }}>
                                    Finalizado
                                </option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                        <div class="col-md-7 text-end">
                            <a href="{{ route('admin.partidos.show', $partido) }}" class="btn btn-info me-2">
                                <i class="fas fa-eye"></i> Ver Partido
                            </a>
                            <a href="{{ route('admin.partidos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver a Partidos
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Auto-actualizar la página cada 30 segundos si el partido está en curso
    var partidoEnCurso = "{{ $partido->estado == 'en_curso' ? '1' : '0' }}";
    if (partidoEnCurso === '1') {
        setTimeout(function() {
            location.reload();
        }, 30000);
    }

    // Limpiar formularios después de envío exitoso
    var success = "{{ session('success') ? '1' : '0' }}";
    if (success === '1') {
        document.getElementById('jugador_id_gol').value = '';
        document.getElementById('minuto_gol').value = '';
        document.getElementById('jugador_id_tarjeta').value = '';
        document.getElementById('tipo').value = '';
        document.getElementById('minuto_tarjeta').value = '';
    }
</script>
@endsection