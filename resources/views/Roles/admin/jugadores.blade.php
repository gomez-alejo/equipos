{{-- resources/views/admin/jugadores/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Gestión de Jugadores')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class="fas fa-user"></i> Gestión de Jugadores</h3>
                <a href="{{ route('admin.jugadores.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Agregar Jugador
                </a>
            </div>
            <div class="card-body">
                @if($jugadores->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Número</th>
                                    <th>Nombre</th>
                                    <th>Equipo</th>
                                    <th>Goles</th>
                                    <th>Tarjetas</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jugadores as $jugador)
                                @php $stats = $jugador->getEstadisticas(); @endphp
                                <tr>
                                    <td>{{ $jugador->id }}</td>
                                    <td>
                                        <span class="badge bg-primary">#{{ $jugador->numero }}</span>
                                    </td>
                                    <td><strong>{{ $jugador->nombre }}</strong></td>
                                    <td>
                                        @if($jugador->equipo->escudo)
                                            <img src="{{ Storage::url($jugador->equipo->escudo) }}" alt="Escudo" 
                                                 width="20" height="20" class="me-1">
                                        @endif
                                        {{ $jugador->equipo->nombre }}
                                    </td>
                                    <td>
                                        <span class="badge bg-success">{{ $stats['goles'] }} goles</span>
                                    </td>
                                    <td>
                                        @if($stats['tarjetas_amarillas'] > 0)
                                            <span class="badge bg-warning text-dark me-1">{{ $stats['tarjetas_amarillas'] }} A</span>
                                        @endif
                                        @if($stats['tarjetas_rojas'] > 0)
                                            <span class="badge bg-danger">{{ $stats['tarjetas_rojas'] }} R</span>
                                        @endif
                                        @if($stats['tarjetas_amarillas'] == 0 && $stats['tarjetas_rojas'] == 0)
                                            <span class="text-muted">Sin tarjetas</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.jugadores.show', $jugador) }}" class="btn btn-sm btn-outline-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.jugadores.edit', $jugador) }}" class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.jugadores.destroy', $jugador) }}" method="POST" class="d-inline"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este jugador?')">
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
                        <i class="fas fa-user fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No hay jugadores registrados aún.</p>
                        <a href="{{ route('admin.jugadores.create') }}" class="btn btn-primary">Agregar Primer Jugador</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

{{-- resources/views/admin/jugadores/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Agregar Jugador')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"><i class="fas fa-user-plus"></i> Agregar Nuevo Jugador</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jugadores.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Jugador *</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="numero" class="form-label">Número de Camiseta *</label>
                        <input type="number" class="form-control @error('numero') is-invalid @enderror" 
                               id="numero" name="numero" value="{{ old('numero') }}" min="1" max="99" required>
                        <div class="form-text">Número entre 1 y 99</div>
                        @error('numero')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="equipo_id" class="form-label">Equipo *</label>
                        <select class="form-select @error('equipo_id') is-invalid @enderror" 
                                id="equipo_id" name="equipo_id" required>
                            <option value="">Seleccionar equipo...</option>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}" 
                                        {{ old('equipo_id', request('equipo_id')) == $equipo->id ? 'selected' : '' }}>
                                    {{ $equipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('equipo_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.jugadores.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Agregar Jugador
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- resources/views/admin/jugadores/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Editar Jugador')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"><i class="fas fa-edit"></i> Editar Jugador: {{ $jugador->nombre }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jugadores.update', $jugador) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Jugador *</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $jugador->nombre) }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="numero" class="form-label">Número de Camiseta *</label>
                        <input type="number" class="form-control @error('numero') is-invalid @enderror" 
                               id="numero" name="numero" value="{{ old('numero', $jugador->numero) }}" min="1" max="99" required>
                        <div class="form-text">Número entre 1 y 99</div>
                        @error('numero')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="equipo_id" class="form-label">Equipo *</label>
                        <select class="form-select @error('equipo_id') is-invalid @enderror" 
                                id="equipo_id" name="equipo_id" required>
                            <option value="">Seleccionar equipo...</option>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}" 
                                        {{ old('equipo_id', $jugador->equipo_id) == $equipo->id ? 'selected' : '' }}>
                                    {{ $equipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('equipo_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.jugadores.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Actualizar Jugador
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- resources/views/admin/jugadores/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Detalle del Jugador: ' . $jugador->nombre)

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Información del Jugador</h5>
            </div>
            <div class="card-body text-center">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3 mx-auto text-white" 
                     style="width: 80px; height: 80px;">
                    <h3 class="mb-0">#{{ $jugador->numero }}</h3>
                </div>
                
                <h3>{{ $jugador->nombre }}</h3>
                <p class="text-muted">
                    @if($jugador->equipo->escudo)
                        <img src="{{ Storage::url($jugador->equipo->escudo) }}" alt="Escudo" 
                             width="20" height="20" class="me-1">
                    @endif
                    {{ $jugador->equipo->nombre }}
                </p>
                
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.jugadores.edit', $jugador) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar Jugador
                    </a>
                    <a href="{{ route('admin.equipos.show', $jugador->equipo) }}" class="btn btn-info">
                        <i class="fas fa-users"></i> Ver Equipo
                    </a>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Estadísticas</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-12 mb-3">
                        <h2 class="text-success">{{ $estadisticas['goles'] }}</h2>
                        <small class="text-muted">Goles Marcados</small>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-6">
                        <h4 class="text-warning">{{ $estadisticas['tarjetas_amarillas'] }}</h4>
                        <small class="text-muted">Tarjetas Amarillas</small>
                    </div>
                    <div class="col-6">
                        <h4 class="text-danger">{{ $estadisticas['tarjetas_rojas'] }}</h4>
                        <small class="text-muted">Tarjetas Rojas</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Historial de Goles</h5>
            </div>
            <div class="card-body">
                @if($jugador->goles->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Partido</th>
                                    <th>Minuto</th>
                                    <th>Resultado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jugador->goles->sortByDesc('partido.fecha') as $gol)
                                <tr>
                                    <td>{{ $gol->partido->fecha->format('d/m/Y') }}</td>
                                    <td>
                                        {{ $gol->partido->equipoLocal->nombre }} vs {{ $gol->partido->equipoVisitante->nombre }}
                                    </td>
                                    <td>{{ $gol->minuto }}'</td>
                                    <td>{{ $gol->partido->goles_local }} - {{ $gol->partido->goles_visitante }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-futbol fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Este jugador no ha marcado goles aún.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Historial de Tarjetas</h5>
            </div>
            <div class="card-body">
                @if($jugador->tarjetas->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Partido</th>
                                    <th>Tipo</th>
                                    <th>Minuto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jugador->tarjetas->sortByDesc('partido.fecha') as $tarjeta)
                                <tr>
                                    <td>{{ $tarjeta->partido->fecha->format('d/m/Y') }}</td>
                                    <td>
                                        {{ $tarjeta->partido->equipoLocal->nombre }} vs {{ $tarjeta->partido->equipoVisitante->nombre }}
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $tarjeta->tipo == 'amarilla' ? 'warning text-dark' : 'danger' }}">
                                            {{ ucfirst($tarjeta->tipo) }}
                                        </span>
                                    </td>
                                    <td>{{ $tarjeta->minuto }}'</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-square fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Este jugador no tiene tarjetas.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <a href="{{ route('admin.jugadores.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a Jugadores
        </a>
    </div>
</div>
@endsection