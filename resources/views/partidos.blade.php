@extends('layouts.app')

@section('title', 'Inicio')

@vite(['resources/css/home.css'])

@section('content')
    <style>
        /* Estilos personalizados adicionales */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #1e293b;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }
    </style>
   <!-- Main Content -->
    <div class="flex">
        <!-- Sidebar for filters -->
        <aside class="w-64 bg-white/10 backdrop-blur-sm p-4 custom-scrollbar">
            <h2 class="text-xl font-bold mb-4">Filtros</h2>
            <div class="mb-4">
                <label for="team-filter" class="block text-sm font-medium mb-2">Equipo</label>
                <select id="team-filter" class="w-full p-2 rounded bg-white/20">
                    <option value="">Todos los equipos</option>
                    <option value="team1">Equipo 1</option>
                    <option value="team2">Equipo 2</option>
                    <option value="team3">Equipo 3</option>
                    <option value="team4">Equipo 4</option>
                    <option value="team5">Equipo 5</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="date-filter" class="block text-sm font-medium mb-2">Fecha</label>
                <input type="date" id="date-filter" class="w-full p-2 rounded bg-white/20">
            </div>
            <div class="mb-4">
                <label for="status-filter" class="block text-sm font-medium mb-2">Estado</label>
                <select id="status-filter" class="w-full p-2 rounded bg-white/20">
                    <option value="">Todos los estados</option>
                    <option value="completed">Completado</option>
                    <option value="upcoming">Próximo</option>
                    <option value="live">En Vivo</option>
                </select>
            </div>
            <button id="apply-filters" class="w-full bg-blue-600 hover:bg-blue-700 p-2 rounded">Aplicar Filtros</button>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6 custom-scrollbar">
            <h1 class="text-3xl font-bold mb-6">Partidos de Fútbol</h1>

            <!-- Matches Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Match Card 1 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold">E1</span>
                            </div>
                            <span class="font-medium">Equipo 1</span>
                        </div>
                        <span class="text-gray-400">vs</span>
                        <div class="flex items-center">
                            <span class="font-medium mr-3">Equipo 2</span>
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">E2</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-400">Fecha: 2023-10-10</p>
                        <p class="text-gray-400">Resultado: 2 - 1</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Ver Detalles</button>
                    </div>
                </div>

                <!-- Match Card 2 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold">E3</span>
                            </div>
                            <span class="font-medium">Equipo 3</span>
                        </div>
                        <span class="text-gray-400">vs</span>
                        <div class="flex items-center">
                            <span class="font-medium mr-3">Equipo 4</span>
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">E4</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-400">Fecha: 2023-10-11</p>
                        <p class="text-gray-400">Resultado: 3 - 3</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Ver Detalles</button>
                    </div>
                </div>

                <!-- Match Card 3 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold">E5</span>
                            </div>
                            <span class="font-medium">Equipo 5</span>
                        </div>
                        <span class="text-gray-400">vs</span>
                        <div class="flex items-center">
                            <span class="font-medium mr-3">Equipo 6</span>
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">E6</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-400">Fecha: 2023-10-12</p>
                        <p class="text-gray-400">Resultado: 0 - 1</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Ver Detalles</button>
                    </div>
                </div>

                <!-- Match Card 4 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold">E7</span>
                            </div>
                            <span class="font-medium">Equipo 7</span>
                        </div>
                        <span class="text-gray-400">vs</span>
                        <div class="flex items-center">
                            <span class="font-medium mr-3">Equipo 8</span>
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">E8</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-400">Fecha: 2023-10-13</p>
                        <p class="text-gray-400">Resultado: 4 - 2</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Ver Detalles</button>
                    </div>
                </div>

                <!-- Match Card 5 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold">E9</span>
                            </div>
                            <span class="font-medium">Equipo 9</span>
                        </div>
                        <span class="text-gray-400">vs</span>
                        <div class="flex items-center">
                            <span class="font-medium mr-3">Equipo 10</span>
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">E10</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-400">Fecha: 2023-10-14</p>
                        <p class="text-gray-400">Resultado: 1 - 0</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Ver Detalles</button>
                    </div>
                </div>

                <!-- Match Card 6 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold">E11</span>
                            </div>
                            <span class="font-medium">Equipo 11</span>
                        </div>
                        <span class="text-gray-400">vs</span>
                        <div class="flex items-center">
                            <span class="font-medium mr-3">Equipo 12</span>
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">E12</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-400">Fecha: 2023-10-15</p>
                        <p class="text-gray-400">Resultado: 2 - 2</p>
                        <button class="mt-2 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Ver Detalles</button>
                    </div>
                </div>
            </div>

            <!-- Standings Table -->
            <div class="mt-10">
                <h2 class="text-2xl font-bold mb-4">Tabla de Posiciones</h2>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left p-2">Posición</th>
                                <th class="text-left p-2">Equipo</th>
                                <th class="text-left p-2">PJ</th>
                                <th class="text-left p-2">G</th>
                                <th class="text-left p-2">E</th>
                                <th class="text-left p-2">P</th>
                                <th class="text-left p-2">Pts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2">1</td>
                                <td class="p-2">Equipo 1</td>
                                <td class="p-2">10</td>
                                <td class="p-2">7</td>
                                <td class="p-2">2</td>
                                <td class="p-2">1</td>
                                <td class="p-2">23</td>
                            </tr>
                            <tr>
                                <td class="p-2">2</td>
                                <td class="p-2">Equipo 2</td>
                                <td class="p-2">10</td>
                                <td class="p-2">5</td>
                                <td class="p-2">3</td>
                                <td class="p-2">2</td>
                                <td class="p-2">18</td>
                            </tr>
                            <tr>
                                <td class="p-2">3</td>
                                <td class="p-2">Equipo 3</td>
                                <td class="p-2">10</td>
                                <td class="p-2">4</td>
                                <td class="p-2">4</td>
                                <td class="p-2">2</td>
                                <td class="p-2">16</td>
                            </tr>
                            <tr>
                                <td class="p-2">4</td>
                                <td class="p-2">Equipo 4</td>
                                <td class="p-2">10</td>
                                <td class="p-2">4</td>
                                <td class="p-2">3</td>
                                <td class="p-2">3</td>
                                <td class="p-2">15</td>
                            </tr>
                            <tr>
                                <td class="p-2">5</td>
                                <td class="p-2">Equipo 5</td>
                                <td class="p-2">10</td>
                                <td class="p-2">3</td>
                                <td class="p-2">4</td>
                                <td class="p-2">3</td>
                                <td class="p-2">13</td>
                            </tr>
                            <tr>
                                <td class="p-2">6</td>
                                <td class="p-2">Equipo 6</td>
                                <td class="p-2">10</td>
                                <td class="p-2">3</td>
                                <td class="p-2">3</td>
                                <td class="p-2">4</td>
                                <td class="p-2">12</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>


@endsection