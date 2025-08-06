{{-- resources/views/admin/partidos/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Gestión de Partidos')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class="fas fa-futbol"></i> Gestión de Partidos</h3>
                <a href="{{ route('admin.partidos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Programar Partido
                </a>
            </div>
            <div class="card-body">
                @if($partidos->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Equipo Local</th>
                                    <th>Resultado</th>
                                    <th>Equipo Visitante</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partidos as $partido)
                                <tr>
                                    <td>{{ $partido->id }}</td>
                                    <td>{{ $partido->fecha->format('d/m/Y H:i') }}</td>
                                    <td>
                                        @if($partido->equipoLocal->escudo)
                                            <img src="{{ Storage::url($partido->equipoLocal->escudo) }}" alt="Escudo" 
                                                 width="20" height="20" class="me-1">
                                        @endif
                                        {{ $partido->equipoLocal->nombre }}
                                    </td>
                                    <td class="text-center">
                                        @if($partido->estado == 'finalizado')
                                            <strong>{{ $partido->goles_local }} - {{ $partido->goles_visitante }}</strong>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($partido->equipoVisitante->escudo)
                                            <img src="{{ Storage::url($partido->equipoVisitante->escudo) }}" alt="Escudo" 
                                                 width="20" height="20" class="me-1">
                                        @endif
                                        {{ $partido->equipoVisitante->nombre }}
                                    </td>
                                    <td>
                                        @php
                                            $badgeClass = match($partido->estado) {
                                                'programado' => 'bg-primary',
                                                'en_curso' => 'bg-warning text-dark',
                                                'finalizado' => 'bg-success',
                                                default => 'bg-secondary'
                                            };
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">{{ ucfirst(str_replace('_', ' ', $partido->estado)) }}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.partidos.show', $partido) }}" class="btn btn-sm btn-outline-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($partido->estado != 'finalizado')
                                                <a href="{{ route('admin.partidos.edit', $partido) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.partidos.resultado', $partido) }}" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-clipboard-list"></i>
                                            </a>
                                            <form action="{{ route('admin.partidos.destroy', $partido) }}" method="POST" class="d-inline"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este partido?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-futbol fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No hay partidos programados aún.</p>
                        <a href="{{ route('admin.partidos.create') }}" class="btn btn-primary">Programar Primer Partido</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

{{-- resources/views/admin/partidos/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Programar Partido')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"><i class="fas fa-calendar-plus"></i> Programar Nuevo Partido</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.partidos.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="equipo_local_id" class="form-label">Equipo Local *</label>
                        <select class="form-select @error('equipo_local_id') is-invalid @enderror" 
                                id="equipo_local_id" name="equipo_local_id" required>
                            <option value="">Seleccionar equipo local...</option>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}" {{ old('equipo_local_id') == $equipo->id ? 'selected' : '' }}>
                                    {{ $equipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('equipo_local_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="equipo_visitante_id" class="form-label">Equipo Visitante *</label>
                        <select class="form-select @error('equipo_visitante_id') is-invalid @enderror" 
                                id="equipo_visitante_id" name="equipo_visitante_id" required>
                            <option value="">Seleccionar equipo visitante...</option>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}" {{ old('equipo_visitante_id') == $equipo->id ? 'selected' : '' }}>
                                    {{ $equipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('equipo_visitante_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha y Hora del Partido *</label>
                        <input type="datetime-local" class="form-control @error('fecha') is-invalid @enderror" 
                               id="fecha" name="fecha" value="{{ old('fecha') }}" required>
                        @error('fecha')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.partidos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Programar Partido
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Evitar que el mismo equipo sea local y visitante
    document.getElementById('equipo_local_id').addEventListener('change', function() {
        const localId = this.value;
        const visitanteSelect = document.getElementById('equipo_visitante_id');
        
        Array.from(visitanteSelect.options).forEach(option => {
            if (option.value === localId) {
                option.disabled = true;
                if (option.selected) {
                    visitanteSelect.value = '';
                }
            } else {
                option.disabled = false;
            }
        });
    });

    document.getElementById('equipo_visitante_id').addEventListener('change', function() {
        const visitanteId = this.value;
        const localSelect = document.getElementById('equipo_local_id');
        
        Array.from(localSelect.options).forEach(option => {
            if (option.value === visitanteId) {
                option.disabled = true;
                if (option.selected) {
                    localSelect.value = '';
                }
            } else {
                option.disabled = false;
            }
        });
    });
</script>
@endsection

{{-- resources/views/admin/partidos/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Editar Partido')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"><i class="fas fa-edit"></i> Editar Partido</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.partidos.update', $partido) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="equipo_local_id" class="form-label">Equipo Local *</label>
                        <select class="form-select @error('equipo_local_id') is-invalid @enderror" 
                                id="equipo_local_id" name="equipo_local_id" required>
                            <option value="">Seleccionar equipo local...</option>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}" 
                                        {{ old('equipo_local_id', $partido->equipo_local_id) == $equipo->id ? 'selected' : '' }}>
                                    {{ $equipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('equipo_local_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="equipo_visitante_id" class="form-label">Equipo Visitante *</label>
                        <select class="form-select @error('equipo_visitante_id') is-invalid @enderror" 
                                id="equipo_visitante_id" name="equipo_visitante_id" required>
                            <option value="">Seleccionar equipo visitante...</option>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}" 
                                        {{ old('equipo_visitante_id', $partido->equipo_visitante_id) == $equipo->id ? 'selected' : '' }}>
                                    {{ $equipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('equipo_visitante_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha y Hora del Partido *</label>
                        <input type="datetime-local" class="form-control @error('fecha') is-invalid @enderror" 
                               id="fecha" name="fecha" 
                               value="{{ old('fecha', $partido->fecha->format('Y-m-d\TH:i')) }}" required>
                        @error('fecha')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado del Partido *</label>
                        <select class="form-select @error('estado') is-invalid @enderror" 
                                id="estado" name="estado" required>
                            <option value="programado" {{ old('estado', $partido->estado) == 'programado' ? 'selected' : '' }}>
                                Programado
                            </option>
                            <option value="en_curso" {{ old('estado', $partido->estado) == 'en_curso' ? 'selected' : '' }}>
                                En Curso
                            </option>
                            <option value="finalizado" {{ old('estado', $partido->estado) == 'finalizado' ? 'selected' : '' }}>
                                Finalizado
                            </option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.partidos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Actualizar Partido
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- resources/views/admin/partidos/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Detalle del Partido')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">
                    <i class="fas fa-futbol"></i> 
                    {{ $partido->equipoLocal->nombre }} vs {{ $partido->equipoVisitante->nombre }}
                </h3>
            </div>
            <div class="card-body">
                <div class="row text-center mb-4">
                    <div class="col-md-4">
                        <div class="text-center">
                            @if($partido->equipoLocal->escudo)
                                <img src="{{ Storage::url($partido->equipoLocal->escudo) }}" alt="Escudo" 
                                     width="80" height="80" class="mb-2">
                            @endif
                            <h4>{{ $partido->equipoLocal->nombre }}</h4>
                            <p class="text-muted">Local</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        @if($partido->estado == 'finalizado')
                            <div class="text-center">
                                <h1 class="display-4">{{ $partido->goles_local }} - {{ $partido->goles_visitante }}</h1>
                                <span class="badge bg-success">Finalizado</span>
                            </div>
                        @else
                            <div class="text-center">
                                <h2 class="text-muted">- vs -</h2>
                                <span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $partido->estado)) }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            @if($partido->equipoVisitante->escudo)
                                <img src="{{ Storage::url($partido->equipoVisitante->escudo) }}" alt="Escudo" 
                                     width="80" height="80" class="mb-2">
                            @endif
                            <h4>{{ $partido->equipoVisitante->nombre }}</h4>
                            <p class="text-muted">Visitante</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Fecha:</strong> {{ $partido->fecha->format('d/m/Y H:i') }}</p>
                        <p><strong>Estado:</strong> 
                            <span class="badge bg-{{ $partido->estado == 'finalizado' ? 'success' : ($partido->estado == 'en_curso' ? 'warning' : 'primary') }}">
                                {{ ucfirst(str_replace('_', ' ', $partido->estado)) }}
                            </span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.partidos.resultado', $partido) }}" class="btn btn-success">
                                <i class="fas fa-clipboard-list"></i> Gestionar Resultado
                            </a>
                            @if($partido->estado != 'finalizado')
                                <a href="{{ route('admin.partidos.edit', $partido) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Editar Partido
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($partido->goles->count() > 0)
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Goles del Partido</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Minuto</th>
                                <th>Jugador</th>
                                <th>Equipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partido->goles->sortBy('minuto') as $gol)
                            <tr>
                                <td><strong>{{ $gol->minuto }}'</strong></td>
                                <td>{{ $gol->jugador->nombre }} (#{{ $gol->jugador->numero }})</td>
                                <td>{{ $gol->jugador->equipo->nombre }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

        @if($partido->tarjetas->count() > 0)
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Tarjetas del Partido</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Minuto</th>
                                <th>Tipo</th>
                                <th>Jugador</th>
                                <th>Equipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partido->tarjetas->sortBy('minuto') as $tarjeta)
                            <tr>
                                <td><strong>{{ $tarjeta->minuto }}'</strong></td>
                                <td>
                                    <span class="badge bg-{{ $tarjeta->tipo == 'amarilla' ? 'warning text-dark' : 'danger' }}">
                                        {{ ucfirst($tarjeta->tipo) }}
                                    </span>
                                </td>
                                <td>{{ $tarjeta->jugador->nombre }} (#{{ $tarjeta->jugador->numero }})</td>
                                <td>{{ $tarjeta->jugador->equipo->nombre }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Información del Partido</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <strong>ID del Partido:</strong> #{{ $partido->id }}
                    </li>
                    <li class="mb-2">
                        <strong>Fecha programada:</strong><br>
                        {{ $partido->fecha->format('d/m/Y H:i') }}
                    </li>
                    <li class="mb-2">
                        <strong>Estado actual:</strong><br>
                        <span class="badge bg-{{ $partido->estado == 'finalizado' ? 'success' : ($partido->estado == 'en_curso' ? 'warning' : 'primary') }}">
                            {{ ucfirst(str_replace('_', ' ', $partido->estado)) }}
                        </span>
                    </li>
                    <li class="mb-2">
                        <strong>Goles marcados:</strong> {{ $partido->goles->count() }}
                    </li>
                    <li class="mb-2">
                        <strong>Tarjetas mostradas:</strong> {{ $partido->tarjetas->count() }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Acciones</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.partidos.resultado', $partido) }}" class="btn btn-success">
                        <i class="fas fa-clipboard-list"></i> Gestionar Resultado
                    </a>
                    @if($partido->estado != 'finalizado')
                        <a href="{{ route('admin.partidos.edit', $partido) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Editar Partido
                        </a>
                    @endif
                    <a href="{{ route('admin.equipos.show', $partido->equipoLocal) }}" class="btn btn-info">
                        <i class="fas fa-users"></i> Ver {{ $partido->equipoLocal->nombre }}
                    </a>
                    <a href="{{ route('admin.equipos.show', $partido->equipoVisitante) }}" class="btn btn-info">
                        <i class="fas fa-users"></i> Ver {{ $partido->equipoVisitante->nombre }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <a href="{{ route('admin.partidos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a Partidos
        </a>
    </div>
</div>
@endsection