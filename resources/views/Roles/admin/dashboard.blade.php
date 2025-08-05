@extends('layouts.app')

@section('title', 'Panel de Administración')

@vite(['resources/css/admin.css'])

@section('content')


<div class="min-h-screen bg-gray-50">
    <!-- Header con bienvenida -->
    <div class="gradient-bg text-white py-8 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="fade-in">
                <h1 class="text-4xl font-bold mb-2">¡Bienvenido, {{ Auth::user()->name ?? 'Usuario' }} 👋</h1>
                <p class="text-xl opacity-90">Panel de control de la Liga de Fútbol</p>
                <div class="mt-4 flex items-center space-x-4 text-sm">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-calendar-alt"></i>
                        <span>{{ date('d/m/Y') }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-clock"></i>
                        <span id="current-time"></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-400 rounded-full pulse-animation"></div>
                        <span>Sistema Activo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Cards de estadísticas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Equipos -->
            <div class="gradient-card rounded-2xl p-6 text-white card-hover fade-in fade-in-delay-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-80">Total Equipos</p>
                        <p class="text-3xl font-bold">{{ $totalEquipos ?? '24' }}</p>
                        <p class="text-xs mt-1 opacity-70">+2 este mes</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-users text-2xl icon-rotate"></i>
                    </div>
                </div>
            </div>

            <!-- Partidos Jugados -->
            <div class="gradient-card-2 rounded-2xl p-6 text-white card-hover fade-in fade-in-delay-2">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-80">Partidos Jugados</p>
                        <p class="text-3xl font-bold">{{ $partidosJugados ?? '156' }}</p>
                        <p class="text-xs mt-1 opacity-70">+12 esta semana</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-futbol text-2xl icon-rotate"></i>
                    </div>
                </div>
            </div>

            <!-- Usuarios Registrados -->
            <div class="gradient-card-3 rounded-2xl p-6 text-white card-hover fade-in fade-in-delay-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-80">Usuarios Activos</p>
                        <p class="text-3xl font-bold">{{ $usuariosActivos ?? '1,247' }}</p>
                        <p class="text-xs mt-1 opacity-70">+87 hoy</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-user-friends text-2xl icon-rotate"></i>
                    </div>
                </div>
            </div>

            <!-- Goles Total -->
            <div class="gradient-card-4 rounded-2xl p-6 text-white card-hover fade-in fade-in-delay-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-80">Total Goles</p>
                        <p class="text-3xl font-bold">{{ $totalGoles ?? '1,892' }}</p>
                        <p class="text-xs mt-1 opacity-70">+45 esta fecha</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-trophy text-2xl icon-rotate"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección principal con grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Gráfico de rendimiento -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl p-6 card-hover fade-in">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Estadísticas de la Liga</h3>
                    <div class="flex space-x-2">
                        <button class="bg-blue-100 text-blue-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-200 transition-colors">
                            Semanal
                        </button>
                        <button class="bg-gray-100 text-gray-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
                            Mensual
                        </button>
                    </div>
                </div>
                
                <!-- Gráfico simple con barras -->
                <div class="chart-container p-6">
                    <div class="flex items-end justify-between h-full space-x-2">
                        <div class="flex flex-col items-center">
                            <div class="chart-bar w-8 rounded-t-lg mb-2" style="height: 60%"></div>
                            <span class="text-white text-xs">Lun</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="chart-bar w-8 rounded-t-lg mb-2" style="height: 80%"></div>
                            <span class="text-white text-xs">Mar</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="chart-bar w-8 rounded-t-lg mb-2" style="height: 45%"></div>
                            <span class="text-white text-xs">Mié</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="chart-bar w-8 rounded-t-lg mb-2" style="height: 90%"></div>
                            <span class="text-white text-xs">Jue</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="chart-bar w-8 rounded-t-lg mb-2" style="height: 70%"></div>
                            <span class="text-white text-xs">Vie</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="chart-bar w-8 rounded-t-lg mb-2" style="height: 85%"></div>
                            <span class="text-white text-xs">Sáb</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="chart-bar w-8 rounded-t-lg mb-2" style="height: 65%"></div>
                            <span class="text-white text-xs">Dom</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel de acciones rápidas -->
            <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Acciones Rápidas</h3>
                <div class="space-y-4">
                    <button class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-4 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 flex items-center justify-center space-x-2 transform hover:scale-105">
                        <i class="fas fa-plus"></i>
                        <span>Nuevo Partido</span>
                    </button>
                    
                    <button class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 px-4 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 flex items-center justify-center space-x-2 transform hover:scale-105">
                        <i class="fas fa-users"></i>
                        <span>Gestionar Equipos</span>
                    </button>
                    
                    <button class="w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white py-3 px-4 rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-300 flex items-center justify-center space-x-2 transform hover:scale-105">
                        <i class="fas fa-chart-line"></i>
                        <span>Ver Reportes</span>
                    </button>
                    
                    <button class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 px-4 rounded-xl hover:from-orange-600 hover:to-orange-700 transition-all duration-300 flex items-center justify-center space-x-2 transform hover:scale-105">
                        <i class="fas fa-cog"></i>
                        <span>Configuración</span>
                    </button>
                </div>

                <!-- Notificaciones -->
                <div class="mt-8">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="font-semibold text-gray-800">Notificaciones</h4>
                        <span class="notification-badge bg-red-500 text-white text-xs px-2 py-1 rounded-full">3</span>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 p-3 bg-blue-50 rounded-lg">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-800">Nuevo partido programado</p>
                                <p class="text-xs text-gray-500">Hace 5 min</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-green-50 rounded-lg">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-800">Equipo registrado</p>
                                <p class="text-xs text-gray-500">Hace 15 min</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-yellow-50 rounded-lg">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-800">Mantenimiento programado</p>
                                <p class="text-xs text-gray-500">Hace 1 hora</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de últimos partidos -->
        <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in mb-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Últimos Partidos</h3>
                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium flex items-center space-x-1">
                    <span>Ver todos</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Fecha</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Equipos</th>
                            <th class="text-center py-3 px-4 font-semibold text-gray-700">Resultado</th>
                            <th class="text-center py-3 px-4 font-semibold text-gray-700">Estado</th>
                            <th class="text-center py-3 px-4 font-semibold text-gray-700">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="text-sm">
                                    <div class="font-medium text-gray-900">25/07/2024</div>
                                    <div class="text-gray-500">15:30</div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-2">
                                    <span class="font-medium">Barcelona FC</span>
                                    <span class="text-gray-500">vs</span>
                                    <span class="font-medium">Real Madrid</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">2 - 1</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Finalizado</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-800">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="text-sm">
                                    <div class="font-medium text-gray-900">24/07/2024</div>
                                    <div class="text-gray-500">18:00</div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-2">
                                    <span class="font-medium">Atletico Madrid</span>
                                    <span class="text-gray-500">vs</span>
                                    <span class="font-medium">Valencia CF</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">0 - 0</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">En vivo</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-800">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@vite(['resources/js/admin.js'])