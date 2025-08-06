{{-- resources/views/admin/equipos/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Gestión de Equipos')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class="fas fa-users"></i> Gestión de Equipos</h3>
                <a href="{{ route('admin.equipos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Crear Equipo
                </a>
            </div>
            <div class="card-body">
                @if($equipos->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Escudo</th>
                                    <th>Nombre</th>
                                    <th>Jugadores</th>
                                    <th>Fecha Creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($equipos as $equipo)
                                <tr>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.jugadores.show', $jugador) }}" class="btn btn-sm btn-outline-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.jugadores.edit', $jugador) }}" class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
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
                        <p class="text-muted">Este equipo no tiene jugadores registrados.</p>
                        <a href="{{ route('admin.jugadores.create') }}?equipo_id={{ $equipo->id }}" class="btn btn-primary">
                            Agregar Primer Jugador
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <a href="{{ route('admin.equipos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a Equipos
        </a>
    </div>
</div>
@endsection{{ $equipo->id }}</td>
                                    <td>
                                        @if($equipo->escudo)
                                            <img src="{{ Storage::url($equipo->escudo) }}" alt="Escudo de {{ $equipo->nombre }}" 
                                                 width="40" height="40" class="rounded">
                                        @else
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-center" 
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-image text-white"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td><strong>{{ $equipo->nombre }}</strong></td>
                                    <td>
                                        <span class="badge bg-info">{{ $equipo->jugadores_count }} jugadores</span>
                                    </td>
                                    <td>{{ $equipo->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.equipos.show', $equipo) }}" class="btn btn-sm btn-outline-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.equipos.edit', $equipo) }}" class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.equipos.destroy', $equipo) }}" method="POST" class="d-inline"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este equipo?')">
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
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No hay equipos registrados aún.</p>
                        <a href="{{ route('admin.equipos.create') }}" class="btn btn-primary">Crear Primer Equipo</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

{{-- resources/views/admin/equipos/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Crear Equipo')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"><i class="fas fa-plus"></i> Crear Nuevo Equipo</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.equipos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Equipo *</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="escudo" class="form-label">Escudo del Equipo</label>
                        <input type="file" class="form-control @error('escudo') is-invalid @enderror" 
                               id="escudo" name="escudo" accept="image/*">
                        <div class="form-text">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</div>
                        @error('escudo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.equipos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Crear Equipo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- resources/views/admin/equipos/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Editar Equipo')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"><i class="fas fa-edit"></i> Editar Equipo: {{ $equipo->nombre }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.equipos.update', $equipo) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Equipo *</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $equipo->nombre) }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="escudo" class="form-label">Escudo del Equipo</label>
                        
                        @if($equipo->escudo)
                            <div class="mb-2">
                                <p class="mb-1">Escudo actual:</p>
                                <img src="{{ Storage::url($equipo->escudo) }}" alt="Escudo actual" 
                                     width="80" height="80" class="rounded border">
                            </div>
                        @endif
                        
                        <input type="file" class="form-control @error('escudo') is-invalid @enderror" 
                               id="escudo" name="escudo" accept="image/*">
                        <div class="form-text">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</div>
                        @error('escudo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.equipos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Actualizar Equipo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection