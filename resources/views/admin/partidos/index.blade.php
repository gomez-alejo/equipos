{{-- resources/views/admin/partidos/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Gestión de Partidos')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-blue-100 to-indigo-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-blue-600 rounded-xl shadow-lg">
                        <i class="fas fa-futbol text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Gestión de Partidos</h1>
                        <p class="text-gray-600 mt-1">Administra todos los partidos del torneo</p>
                    </div>
                </div>
                <a href="{{ route('admin.partidos.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl focus:ring-4 focus:ring-blue-100 transition-all duration-200 group">
                    <i class="fas fa-plus mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                    Programar Partido
                </a>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg backdrop-blur-sm">
                            <i class="fas fa-calendar-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-white">Lista de Partidos</h2>
                            <p class="text-blue-100 text-sm">Todos los encuentros programados y disputados</p>
                        </div>
                    </div>
                    <div class="hidden sm:flex items-center space-x-2 text-blue-100">
                        <i class="fas fa-database text-sm"></i>
                        <span class="text-sm font-medium">{{ $partidos->count() }} partidos</span>
                    </div>
                </div>
            </div>

            <!-- Content Body -->
            <div class="p-8">
                @if($partidos->count() > 0)
                    <!-- Desktop Table -->
                    <div class="hidden lg:block overflow-hidden rounded-xl border border-gray-200">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">
                                        <i class="fas fa-hashtag mr-2 text-blue-600"></i>ID
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">
                                        <i class="fas fa-calendar mr-2 text-blue-600"></i>Fecha
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">
                                        <i class="fas fa-home mr-2 text-blue-600"></i>Equipo Local
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">
                                        <i class="fas fa-trophy mr-2 text-blue-600"></i>Resultado
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">
                                        <i class="fas fa-plane mr-2 text-blue-600"></i>Equipo Visitante
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">
                                        <i class="fas fa-flag mr-2 text-blue-600"></i>Estado
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">
                                        <i class="fas fa-cogs mr-2 text-blue-600"></i>Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($partidos as $partido)
                                <tr class="hover:bg-blue-50/50 transition-colors duration-200 group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                                <span class="text-blue-700 font-semibold text-sm">{{ $partido->id }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $partido->fecha->format('d/m/Y') }}</div>
                                        <div class="text-sm text-gray-500">{{ $partido->fecha->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            @if($partido->equipoLocal->escudo)
                                                <div class="w-8 h-8 rounded-full overflow-hidden ring-2 ring-blue-100">
                                                    <img src="{{ Storage::url($partido->equipoLocal->escudo) }}" alt="Escudo" 
                                                         class="w-full h-full object-cover">
                                                </div>
                                            @else
                                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                    <i class="fas fa-shield-alt text-blue-600 text-sm"></i>
                                                </div>
                                            @endif
                                            <span class="text-sm font-medium text-gray-900">{{ $partido->equipoLocal->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if($partido->estado == 'finalizado')
                                            <div class="inline-flex items-center space-x-2 bg-green-50 px-3 py-1 rounded-lg border border-green-200">
                                                <span class="text-lg font-bold text-green-800">{{ $partido->goles_local }}</span>
                                                <span class="text-gray-400">-</span>
                                                <span class="text-lg font-bold text-green-800">{{ $partido->goles_visitante }}</span>
                                            </div>
                                        @else
                                            <div class="inline-flex items-center space-x-2 bg-gray-50 px-3 py-1 rounded-lg border border-gray-200">
                                                <span class="text-gray-400 font-medium">vs</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            @if($partido->equipoVisitante->escudo)
                                                <div class="w-8 h-8 rounded-full overflow-hidden ring-2 ring-blue-100">
                                                    <img src="{{ Storage::url($partido->equipoVisitante->escudo) }}" alt="Escudo" 
                                                         class="w-full h-full object-cover">
                                                </div>
                                            @else
                                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                    <i class="fas fa-shield-alt text-blue-600 text-sm"></i>
                                                </div>
                                            @endif
                                            <span class="text-sm font-medium text-gray-900">{{ $partido->equipoVisitante->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @php
                                            $statusConfig = match($partido->estado) {
                                                'programado' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => 'fa-calendar', 'label' => 'Programado'],
                                                'en_curso' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => 'fa-play', 'label' => 'En Curso'],
                                                'finalizado' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => 'fa-check', 'label' => 'Finalizado'],
                                                default => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => 'fa-question', 'label' => 'Desconocido']
                                            };
                                        @endphp
                                        <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-semibold {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }}">
                                            <i class="fas {{ $statusConfig['icon'] }}"></i>
                                            <span>{{ $statusConfig['label'] }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-1">
                                            <!-- Ver -->
                                            <a href="{{ route('admin.partidos.show', $partido) }}" 
                                               class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors duration-200 group/btn" 
                                               title="Ver detalles">
                                                <i class="fas fa-eye group-hover/btn:scale-110 transition-transform duration-200"></i>
                                            </a>
                                            
                                            <!-- Editar (solo si no está finalizado) -->
                                            @if($partido->estado != 'finalizado')
                                                <a href="{{ route('admin.partidos.edit', $partido) }}" 
                                                   class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg transition-colors duration-200 group/btn" 
                                                   title="Editar partido">
                                                    <i class="fas fa-edit group-hover/btn:scale-110 transition-transform duration-200"></i>
                                                </a>
                                            @endif
                                            
                                            <!-- Resultado -->
                                            <a href="{{ route('admin.partidos.resultado', $partido) }}" 
                                               class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition-colors duration-200 group/btn" 
                                               title="Gestionar resultado">
                                                <i class="fas fa-clipboard-list group-hover/btn:scale-110 transition-transform duration-200"></i>
                                            </a>
                                            
                                            <!-- Eliminar -->
                                            <form action="{{ route('admin.partidos.destroy', $partido) }}" method="POST" class="inline"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este partido?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors duration-200 group/btn" 
                                                        title="Eliminar partido">
                                                    <i class="fas fa-trash group-hover/btn:scale-110 transition-transform duration-200"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Cards -->
                    <div class="lg:hidden space-y-4">
                        @foreach($partidos as $partido)
                        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-200">
                            <!-- Header -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <span class="text-blue-700 font-semibold text-xs">#{{ $partido->id }}</span>
                                    </div>
                                    @php
                                        $statusConfig = match($partido->estado) {
                                            'programado' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => 'fa-calendar'],
                                            'en_curso' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => 'fa-play'],
                                            'finalizado' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => 'fa-check'],
                                            default => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => 'fa-question']
                                        };
                                    @endphp
                                    <div class="inline-flex items-center space-x-1 px-2 py-1 rounded-full text-xs font-medium {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }}">
                                        <i class="fas {{ $statusConfig['icon'] }}"></i>
                                        <span>{{ ucfirst(str_replace('_', ' ', $partido->estado)) }}</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm font-medium text-gray-900">{{ $partido->fecha->format('d/m/Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $partido->fecha->format('H:i') }}</div>
                                </div>
                            </div>

                            <!-- Teams -->
                            <div class="flex items-center justify-between mb-4">
                                <!-- Equipo Local -->
                                <div class="flex items-center space-x-3 flex-1">
                                    @if($partido->equipoLocal->escudo)
                                        <div class="w-10 h-10 rounded-full overflow-hidden ring-2 ring-blue-100">
                                            <img src="{{ Storage::url($partido->equipoLocal->escudo) }}" alt="Escudo" 
                                                 class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-shield-alt text-blue-600"></i>
                                        </div>
                                    @endif
                                    <span class="text-sm font-medium text-gray-900 truncate">{{ $partido->equipoLocal->nombre }}</span>
                                </div>

                                <!-- Resultado -->
                                <div class="flex-shrink-0 mx-4">
                                    @if($partido->estado == 'finalizado')
                                        <div class="inline-flex items-center space-x-2 bg-green-50 px-3 py-1 rounded-lg">
                                            <span class="text-sm font-bold text-green-800">{{ $partido->goles_local }}</span>
                                            <span class="text-gray-400">-</span>
                                            <span class="text-sm font-bold text-green-800">{{ $partido->goles_visitante }}</span>
                                        </div>
                                    @else
                                        <div class="bg-gray-100 px-3 py-1 rounded-lg">
                                            <span class="text-xs text-gray-500">vs</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Equipo Visitante -->
                                <div class="flex items-center space-x-3 flex-1 justify-end">
                                    <span class="text-sm font-medium text-gray-900 truncate">{{ $partido->equipoVisitante->nombre }}</span>
                                    @if($partido->equipoVisitante->escudo)
                                        <div class="w-10 h-10 rounded-full overflow-hidden ring-2 ring-blue-100">
                                            <img src="{{ Storage::url($partido->equipoVisitante->escudo) }}" alt="Escudo" 
                                                 class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-shield-alt text-blue-600"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center justify-center space-x-2 pt-4 border-t border-gray-100">
                                <a href="{{ route('admin.partidos.show', $partido) }}" 
                                   class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                                    <i class="fas fa-eye mr-2"></i>
                                    <span class="text-sm font-medium">Ver</span>
                                </a>
                                
                                @if($partido->estado != 'finalizado')
                                    <a href="{{ route('admin.partidos.edit', $partido) }}" 
                                       class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-yellow-50 text-yellow-700 rounded-lg hover:bg-yellow-100 transition-colors duration-200">
                                        <i class="fas fa-edit mr-2"></i>
                                        <span class="text-sm font-medium">Editar</span>
                                    </a>
                                @endif
                                
                                <a href="{{ route('admin.partidos.resultado', $partido) }}" 
                                   class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-green-50 text-green-700 rounded-lg hover:bg-green-100 transition-colors duration-200">
                                    <i class="fas fa-clipboard-list mr-2"></i>
                                    <span class="text-sm font-medium">Resultado</span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="mb-6">
                            <div class="mx-auto w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-futbol text-4xl text-blue-600"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No hay partidos programados</h3>
                            <p class="text-gray-600 max-w-md mx-auto">
                                Comienza creando tu primer partido para gestionar el calendario de encuentros del torneo.
                            </p>
                        </div>
                        <a href="{{ route('admin.partidos.create') }}" 
                           class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl focus:ring-4 focus:ring-blue-100 transition-all duration-200 group">
                            <i class="fas fa-plus mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                            Programar Primer Partido
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Stats Cards (if there are matches) -->
        @if($partidos->count() > 0)
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <i class="fas fa-calendar text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Programados</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $partidos->where('estado', 'programado')->count() }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-yellow-100 rounded-lg">
                        <i class="fas fa-play text-yellow-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">En Curso</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $partidos->where('estado', 'en_curso')->count() }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <i class="fas fa-check text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Finalizados</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $partidos->where('estado', 'finalizado')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    /* Custom hover effects */
    .group:hover .group-hover\:scale-110 {
        transform: scale(1.1);
    }
    
    .group\/btn:hover .group-hover\/btn\:scale-110 {
        transform: scale(1.1);
    }
    
    /* Smooth transitions */
    * {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Table row hover effect */
    tbody tr:hover {
        background-color: rgba(59, 130, 246, 0.03);
    }
    
    /* Enhanced shadow on card hover */
    .hover\:shadow-md:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
</style>
@endsection