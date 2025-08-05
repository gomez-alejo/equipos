<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'blue-primary': '#1e3a8a',
                        'blue-secondary': '#1e40af', 
                        'blue-dark': '#1e293b',
                        'gray-primary': '#64748b',
                        'gray-light': '#f1f5f9',
                        'blue-accent': '#3b82f6'
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
                        'scale-in': 'scaleIn 0.5s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(50px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        scaleIn: {
                            '0%': { opacity: '0', transform: 'scale(0.95)' },
                            '100%': { opacity: '1', transform: 'scale(1)' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-dark via-blue-primary to-blue-secondary flex items-center justify-center p-4">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #3b82f6 0%, transparent 50%), radial-gradient(circle at 75% 75%, #1e40af 0%, transparent 50%);"></div>
    </div>
    
    <!-- Register Container -->
    <div class="relative w-full max-w-lg">
        <!-- Decorative Elements -->
        <div class="absolute -top-6 -left-6 w-28 h-28 bg-blue-accent rounded-full opacity-20 animate-pulse-slow"></div>
        <div class="absolute -bottom-6 -right-6 w-36 h-36 bg-blue-secondary rounded-full opacity-15 animate-pulse-slow" style="animation-delay: 1.5s;"></div>
        
        <!-- Main Card -->
        <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl border border-white/20 p-8 animate-fade-in">
            <!-- Header -->
            <div class="text-center mb-8 animate-slide-up">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-secondary to-blue-primary rounded-full mx-auto flex items-center justify-center mb-4 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-blue-dark mb-2">Crear Cuenta</h1>
                <p class="text-gray-primary">Únete a nuestra plataforma</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6" id="registerForm">
                @csrf
                
                <!-- Name Field -->
                <div class="group animate-slide-up" style="animation-delay: 0.1s;">
                    <label for="name" class="block text-sm font-semibold text-blue-dark mb-2 transition-colors group-focus-within:text-blue-accent">
                        Nombre Completo
                    </label>
                    <div class="relative">
                        <input 
                            id="name" 
                            type="text" 
                            name="name" 
                            required 
                            autofocus
                            class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-accent focus:border-blue-accent transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white"
                            placeholder="Tu nombre completo"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-primary group-focus-within:text-blue-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="group animate-slide-up" style="animation-delay: 0.2s;">
                    <label for="email" class="block text-sm font-semibold text-blue-dark mb-2 transition-colors group-focus-within:text-blue-accent">
                        Correo Electrónico
                    </label>
                    <div class="relative">
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            required
                            class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-accent focus:border-blue-accent transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white"
                            placeholder="tu@email.com"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-primary group-focus-within:text-blue-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="group animate-slide-up" style="animation-delay: 0.3s;">
                    <label for="password" class="block text-sm font-semibold text-blue-dark mb-2 transition-colors group-focus-within:text-blue-accent">
                        Contraseña
                    </label>
                    <div class="relative">
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required
                            class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-accent focus:border-blue-accent transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white"
                            placeholder="••••••••"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-primary group-focus-within:text-blue-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg id="eyeIcon" class="h-5 w-5 text-gray-primary hover:text-blue-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="group animate-slide-up" style="animation-delay: 0.4s;">
                    <label for="password-confirm" class="block text-sm font-semibold text-blue-dark mb-2 transition-colors group-focus-within:text-blue-accent">
                        Confirmar Contraseña
                    </label>
                    <div class="relative">
                        <input 
                            id="password-confirm" 
                            type="password" 
                            name="password_confirmation" 
                            required
                            class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-accent focus:border-blue-accent transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white"
                            placeholder="••••••••"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-primary group-focus-within:text-blue-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg id="eyeIconConfirm" class="h-5 w-5 text-gray-primary hover:text-blue-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Role Field -->
                <div class="group animate-slide-up" style="animation-delay: 0.5s;">
                    <label for="role" class="block text-sm font-semibold text-blue-dark mb-2 transition-colors group-focus-within:text-blue-accent">
                        Rol en la Plataforma
                    </label>
                    <div class="relative">
                        <select 
                            id="role" 
                            name="role" 
                            required
                            class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-accent focus:border-blue-accent transition-all duration-300 bg-white/80 backdrop-blur-sm hover:bg-white appearance-none cursor-pointer"
                        >
                            <option value="" disabled selected>Selecciona tu rol</option>
                            <option value="administrador">👨‍💼 Administrador</option>
                            <option value="árbitro">⚽ Árbitro</option>
                            <option value="aficionado">🏆 Aficionado</option>
                        </select>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-primary group-focus-within:text-blue-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="animate-slide-up" style="animation-delay: 0.6s;">
                    <label class="flex items-start space-x-3">
                        <input type="checkbox" required class="mt-1 rounded border-gray-300 text-blue-accent focus:ring-blue-accent focus:ring-offset-0">
                        <span class="text-sm text-gray-primary">
                            Acepto los 
                            <a href="#" class="text-blue-accent hover:text-blue-secondary font-medium transition-colors">términos y condiciones</a> 
                            y la 
                            <a href="#" class="text-blue-accent hover:text-blue-secondary font-medium transition-colors">política de privacidad</a>
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="animate-slide-up" style="animation-delay: 0.7s;">
                    <button 
                        type="submit" 
                        id="submitBtn"
                        class="w-full bg-gradient-to-r from-blue-secondary to-blue-primary hover:from-blue-primary hover:to-blue-dark text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-[1.02] focus:ring-2 focus:ring-blue-accent focus:ring-offset-2"
                    >
                        <span id="btnText">Crear Cuenta</span>
                        <svg id="spinner" class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Login Link -->
            <div class="mt-8 text-center animate-slide-up" style="animation-delay: 0.8s;">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-primary">¿Ya tienes cuenta?</span>
                    </div>
                </div>
                <div class="mt-6">
                    <a 
                        href="{{ route('login') }}" 
                        class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-blue-dark bg-white hover:bg-gray-light transition-all duration-300 hover:border-blue-accent hover:text-blue-accent shadow-sm hover:shadow-md"
                    >
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Iniciar Sesión
                    </a>
                </div>
            </div>
        </div>

        <!-- Progress Indicator -->
        <div class="mt-6 flex justify-center space-x-2 animate-scale-in" style="animation-delay: 1s;">
            <div class="w-2 h-2 bg-blue-accent rounded-full"></div>
            <div class="w-2 h-2 bg-blue-accent/50 rounded-full"></div>
            <div class="w-2 h-2 bg-blue-accent/30 rounded-full"></div>
        </div>
    </div>

@vite(['resources/js/register.js'])
</body>
</html>