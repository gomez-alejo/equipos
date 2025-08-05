@extends('layouts.app')

@section('title', 'Inicio')

@vite(['resources/css/home.css'])

@section('content')
        <!-- Hero Section -->
    <section class="gradient-bg text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 py-24 sm:px-6 lg:px-8">
            <div class="text-center animate-fade-in">
                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                    LIGA DE
                    <span class="block text-yellow-400">FÚTBOL</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                    La plataforma definitiva para gestionar tu liga de fútbol. Equipos, jugadores, partidos y estadísticas en un solo lugar.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-yellow-400 text-blue-900 px-8 py-4 rounded-lg font-bold text-lg hover:bg-yellow-300 transition-colors transform hover:scale-105">
                        <i class="fas fa-play mr-2"></i>COMENZAR AHORA
                    </button>
                    <button class="border-2 border-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-blue-900 transition-colors">
                        <i class="fas fa-info-circle mr-2"></i>MÁS INFORMACIÓN
                    </button>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#f3f4f6"/>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-slide-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Gestiona tu Liga Profesionalmente</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Todas las herramientas que necesitas para administrar tu liga de fútbol de manera eficiente
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-xl p-8 shadow-lg card-hover text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-users text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Gestión de Equipos</h3>
                    <p class="text-gray-600">Registra y administra todos los equipos de tu liga con información completa</p>
                </div>

                <div class="bg-white rounded-xl p-8 shadow-lg card-hover text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-running text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Jugadores</h3>
                    <p class="text-gray-600">Mantén un registro detallado de todos los jugadores y sus estadísticas</p>
                </div>

                <div class="bg-white rounded-xl p-8 shadow-lg card-hover text-center">
                    <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-alt text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Calendario</h3>
                    <p class="text-gray-600">Programa partidos y mantén a todos informados sobre próximos encuentros</p>
                </div>

                <div class="bg-white rounded-xl p-8 shadow-lg card-hover text-center">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-chart-bar text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Estadísticas</h3>
                    <p class="text-gray-600">Analiza el rendimiento con estadísticas detalladas y tablas de posiciones</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Players Section -->
    <section class="gradient-bg py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">Jugadores Destacados</h2>
                <p class="text-xl text-blue-100">Los mejores talentos de la liga</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- Player Cards -->
                <div class="player-card rounded-2xl p-6 text-center text-white floating">
                    <div class="w-20 h-20 bg-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-2xl"></i>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-full px-3 py-1 text-sm font-bold mb-3">9</div>
                    <h3 class="font-bold text-lg">Álvaro Morata</h3>
                    <p class="text-blue-200 text-sm">Delantero</p>
                </div>

                <div class="player-card rounded-2xl p-6 text-center text-white floating" style="animation-delay: 0.2s;">
                    <div class="w-20 h-20 bg-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-2xl"></i>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-full px-3 py-1 text-sm font-bold mb-3">10</div>
                    <h3 class="font-bold text-lg">Eden Hazard</h3>
                    <p class="text-blue-200 text-sm">Mediocampista</p>
                </div>

                <div class="player-card rounded-2xl p-6 text-center text-white floating" style="animation-delay: 0.4s;">
                    <div class="w-20 h-20 bg-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-2xl"></i>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-full px-3 py-1 text-sm font-bold mb-3">18</div>
                    <h3 class="font-bold text-lg">Olivier Giroud</h3>
                    <p class="text-blue-200 text-sm">Delantero</p>
                </div>

                <div class="player-card rounded-2xl p-6 text-center text-white floating" style="animation-delay: 0.6s;">
                    <div class="w-20 h-20 bg-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-2xl"></i>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-full px-3 py-1 text-sm font-bold mb-3">24</div>
                    <h3 class="font-bold text-lg">Gary Cahill</h3>
                    <p class="text-blue-200 text-sm">Defensor</p>
                </div>

                <div class="player-card rounded-2xl p-6 text-center text-white floating" style="animation-delay: 0.8s;">
                    <div class="w-20 h-20 bg-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-2xl"></i>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-full px-3 py-1 text-sm font-bold mb-3">22</div>
                    <h3 class="font-bold text-lg">Davide Zappacosta</h3>
                    <p class="text-blue-200 text-sm">Defensor</p>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mt-12">
                <button class="bg-white bg-opacity-20 backdrop-blur-sm px-6 py-2 rounded-full text-white font-semibold hover:bg-opacity-30 transition-all">
                    TODOS
                </button>
                <button class="bg-white bg-opacity-10 backdrop-blur-sm px-6 py-2 rounded-full text-white font-semibold hover:bg-opacity-30 transition-all">
                    PORTEROS
                </button>
                <button class="bg-white bg-opacity-10 backdrop-blur-sm px-6 py-2 rounded-full text-white font-semibold hover:bg-opacity-30 transition-all">
                    DEFENSORES
                </button>
                <button class="bg-white bg-opacity-10 backdrop-blur-sm px-6 py-2 rounded-full text-white font-semibold hover:bg-opacity-30 transition-all">
                    MEDIOCAMPISTAS
                </button>
                <button class="bg-white bg-opacity-10 backdrop-blur-sm px-6 py-2 rounded-full text-white font-semibold hover:bg-opacity-30 transition-all">
                    DELANTEROS
                </button>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Estadísticas de la Liga</h2>
                <p class="text-xl text-gray-600">Números que hablan por sí solos</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-2xl p-8 card-hover">
                        <i class="fas fa-trophy text-4xl mb-4"></i>
                        <div class="text-4xl font-bold mb-2" id="teams-count">0</div>
                        <p class="text-blue-100">Equipos Registrados</p>
                    </div>
                </div>

                <div class="text-center">
                    <div class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-2xl p-8 card-hover">
                        <i class="fas fa-users text-4xl mb-4"></i>
                        <div class="text-4xl font-bold mb-2" id="players-count">0</div>
                        <p class="text-green-100">Jugadores Activos</p>
                    </div>
                </div>

                <div class="text-center">
                    <div class="bg-gradient-to-r from-yellow-600 to-yellow-800 text-white rounded-2xl p-8 card-hover">
                        <i class="fas fa-futbol text-4xl mb-4"></i>
                        <div class="text-4xl font-bold mb-2" id="matches-count">0</div>
                        <p class="text-yellow-100">Partidos Jugados</p>
                    </div>
                </div>

                <div class="text-center">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-800 text-white rounded-2xl p-8 card-hover">
                        <i class="fas fa-fire text-4xl mb-4"></i>
                        <div class="text-4xl font-bold mb-2" id="goals-count">0</div>
                        <p class="text-purple-100">Goles Marcados</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@vite('resources/js/home.js')
