<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 flex items-center justify-center p-4">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #3b82f6 0%, transparent 50%), radial-gradient(circle at 75% 75%, #1e40af 0%, transparent 50%);"></div>
    </div>
    
    <!-- Login Container -->
    <div class="relative w-full max-w-md">
        <!-- Decorative Elements -->
        <div class="absolute -top-4 -left-4 w-24 h-24 bg-blue-500 rounded-full opacity-20 animate-pulse-slow"></div>
        <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-blue-600 rounded-full opacity-15 animate-pulse-slow" style="animation-delay: 1s;"></div>
        
        <!-- Main Card -->
        <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl border border-white/20 p-8 animate-fade-in">
            <!-- Header -->
            <div class="text-center mb-8 animate-slide-up">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full mx-auto flex items-center justify-center mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-800 mb-2">Bienvenido</h1>
                <p class="text-slate-600">Inicia sesión en tu cuenta</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6" id="loginForm">
                @csrf
                
                <!-- Email Field -->
                <div class="group animate-slide-up" style="animation-delay: 0.2s;">
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2 transition-colors group-focus-within:text-blue-600">
                        Correo Electrónico
                    </label>
                    <div class="relative">
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            required 
                            autofocus
                            class="w-full px-4 py-3 pl-12 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white"
                            placeholder="tu@email.com"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="group animate-slide-up" style="animation-delay: 0.3s;">
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2 transition-colors group-focus-within:text-blue-600">
                        Contraseña
                    </label>
                    <div class="relative">
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required
                            class="w-full px-4 py-3 pl-12 pr-12 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white"
                            placeholder="••••••••"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg id="eyeIcon" class="h-5 w-5 text-slate-400 hover:text-slate-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between animate-slide-up" style="animation-delay: 0.4s;">
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 focus:ring-offset-0">
                        <span class="ml-2 text-sm text-slate-600">Recordarme</span>
                    </label>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800 transition-colors font-medium">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <!-- Submit Button -->
                <div class="animate-slide-up" style="animation-delay: 0.5s;">
                    <button 
                        type="submit" 
                        id="submitBtn"
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-[1.02] focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        <span id="btnText">Iniciar Sesión</span>
                        <svg id="spinner" class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <div class="mt-8 text-center animate-slide-up" style="animation-delay: 0.6s;">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-slate-500">¿No tienes cuenta?</span>
                    </div>
                </div>
                <div class="mt-6">
                    <a 
                        href="{{ route('register') }}" 
                        class="inline-flex items-center px-6 py-3 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-all duration-300 hover:border-blue-300 hover:text-blue-600 shadow-sm hover:shadow-md"
                    >
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Crear nueva cuenta
                    </a>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/login.js'])
</body>
</html>