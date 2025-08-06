@vite(['resources/css/navbar.css'])

<!-- Navigation -->
<nav class="gradient-bg text-white shadow-2xl navbar-shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo y navegación -->
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center space-x-3">
                    <i class="fas fa-futbol text-3xl logo-animation text-yellow-300"></i>
                    <div class="hidden sm:block">
                        <h1 class="text-xl font-bold tracking-wide">LIGA PRO</h1>
                        <p class="text-xs text-blue-200">Fútbol Profesional</p>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-2">
                        <a href="#" class="nav-link hover:bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium flex items-center space-x-2">
                            <i class="fas fa-home icon-hover"></i>
                            <span>INICIO</span>
                        </a>
                        <a href="#" class="nav-link hover:bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium flex items-center space-x-2">
                            <i class="fas fa-calendar-alt icon-hover"></i>
                            <span>PARTIDOS</span>
                        </a>
                        <a href="#" class="nav-link hover:bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium flex items-center space-x-2">
                            <i class="fas fa-table icon-hover"></i>
                            <span>TABLA</span>
                        </a>
                        <a href="#" class="nav-link hover:bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium flex items-center space-x-2">
                            <i class="fas fa-users icon-hover"></i>
                            <span>EQUIPOS</span>
                        </a>
                        <a href="#" class="nav-link hover:bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium flex items-center space-x-2">
                            <i class="fas fa-chart-bar icon-hover"></i>
                            <span>ESTADÍSTICAS</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Botones de usuario -->
            <div class="hidden md:block">
                @guest
                    <!-- Mostrar botones de Ingresar y Registrarse si el usuario no está autenticado -->
                    <div class="ml-4 flex items-center md:ml-6 space-x-4">
                        <a href="{{ route('login') }}" class="btn-primary text-blue-800 px-6 py-2 rounded-full font-semibold flex items-center space-x-2">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>INGRESAR</span>
                        </a>
                        <a href="{{ route('register') }}" class="btn-secondary px-6 py-2 rounded-full font-semibold flex items-center space-x-2">
                            <i class="fas fa-user-plus"></i>
                            <span>REGISTRARSE</span>
                        </a>
                    </div>
                @else
                    <!-- Mostrar icono de perfil si el usuario está autenticado -->
                    <div class="ml-4 flex items-center md:ml-6 relative">
                        <button id="profileButton" class="flex items-center space-x-2 text-white hover:text-gray-300 transition-all duration-300 p-2 rounded-full hover:bg-white/10">
                            <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-sm"></i>
                            </div>
                            <span class="hidden lg:block font-medium">{{ Auth::user()->name ?? 'Usuario' }}</span>
                            <i class="fas fa-chevron-down text-xs transition-transform duration-300" id="chevronIcon"></i>
                        </button>
                        
                        <!-- Modal de Perfil -->
                        <div id="profileModal" class="profile-modal absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl border border-gray-200 overflow-hidden">
                            <div class="px-4 py-3 bg-gradient-to-r from-blue-50 to-cyan-50 border-b border-gray-200">
                                <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name ?? 'Usuario' }}</p>
                                <p class="text-xs text-gray-600">{{ Auth::user()->email ?? 'usuario@ejemplo.com' }}</p>
                            </div>
                            <div class="py-2">
                                <a href="{{ route('admin.dashboard', Auth::user()) }}" class="dropdown-item flex items-center px-4 py-3 text-gray-700 text-sm">
                                    <i class="fas fa-user-circle mr-3 text-blue-500"></i>
                                    Perfil
                                </a>
                                <a href="#" class="dropdown-item flex items-center px-4 py-3 text-gray-700 text-sm">
                                    <i class="fas fa-cog mr-3 text-blue-500"></i>
                                    Configuración
                                </a>
                                <div class="border-t border-gray-200 mt-2 pt-2">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item flex items-center w-full px-4 py-3 text-gray-700 text-sm">
                                            <i class="fas fa-sign-out-alt mr-3 text-red-500"></i>
                                            Cerrar sesión
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>
            
            <!-- Botón menú móvil -->
            <div class="md:hidden">
                <button id="mobileMenuButton" class="mobile-menu-button p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <i class="fas fa-bars text-2xl" id="mobileMenuIcon"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú móvil -->
    <div id="mobileMenu" class="mobile-menu md:hidden bg-blue-900/95 backdrop-blur-sm">
        <div class="px-4 pt-2 pb-4 space-y-2">
            <!-- Enlaces de navegación móvil -->
            <a href="#" class="mobile-nav-item flex items-center px-4 py-3 text-white rounded-lg">
                <i class="fas fa-home mr-3 text-yellow-300"></i>
                INICIO
            </a>
            <a href="#" class="mobile-nav-item flex items-center px-4 py-3 text-white rounded-lg">
                <i class="fas fa-calendar-alt mr-3 text-yellow-300"></i>
                PARTIDOS
            </a>
            <a href="#" class="mobile-nav-item flex items-center px-4 py-3 text-white rounded-lg">
                <i class="fas fa-table mr-3 text-yellow-300"></i>
                TABLA
            </a>
            <a href="#" class="mobile-nav-item flex items-center px-4 py-3 text-white rounded-lg">
                <i class="fas fa-users mr-3 text-yellow-300"></i>
                EQUIPOS
            </a>
            <a href="#" class="mobile-nav-item flex items-center px-4 py-3 text-white rounded-lg">
                <i class="fas fa-chart-bar mr-3 text-yellow-300"></i>
                ESTADÍSTICAS
            </a>
            
            <!-- Botones de usuario móvil -->
            <div class="border-t border-blue-800 pt-4 mt-4">
                @guest
                    <div class="space-y-3">
                        <a href="{{ route('login') }}" class="flex items-center justify-center w-full bg-white text-blue-800 px-4 py-3 rounded-lg font-semibold">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            INGRESAR
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center justify-center w-full border border-white text-white px-4 py-3 rounded-lg font-semibold">
                            <i class="fas fa-user-plus mr-2"></i>
                            REGISTRARSE
                        </a>
                    </div>
                @else
                    <div class="space-y-2">
                        <div class="flex items-center px-4 py-3 bg-white/10 rounded-lg">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-white">{{ Auth::user()->name ?? 'Usuario' }}</p>
                                <p class="text-xs text-blue-200">{{ Auth::user()->email ?? 'usuario@ejemplo.com' }}</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.dashboard', Auth::user()) }}" class="mobile-nav-item flex items-center px-4 py-3 text-white rounded-lg">
                            <i class="fas fa-user-circle mr-3 text-yellow-300"></i>
                            Mi Perfil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="mobile-nav-item flex items-center w-full px-4 py-3 text-white rounded-lg">
                                <i class="fas fa-sign-out-alt mr-3 text-red-400"></i>
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
@vite('resources/js/navbar.js')