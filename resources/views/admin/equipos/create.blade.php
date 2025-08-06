{{-- resources/views/admin/equipos/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Crear Equipo')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-gradient-to-r from-blue-800/30 to-indigo-800/30 backdrop-blur-sm border border-blue-700/30 rounded-2xl p-6 shadow-2xl">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl shadow-lg">
                        <i class="fas fa-plus text-2xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">Crear Nuevo Equipo</h1>
                        <p class="text-blue-200/80">Agrega un nuevo equipo al torneo</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.equipos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    <!-- Team Name Field -->
                    <div class="space-y-2">
                        <label for="nombre" class="block text-sm font-semibold text-white mb-3 flex items-center space-x-2">
                            <i class="fas fa-futbol text-blue-400"></i>
                            <span>Nombre del Equipo</span>
                            <span class="text-red-400">*</span>
                        </label>
                        
                        <div class="relative">
                            <input type="text" 
                                   class="w-full px-4 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm
                                          @error('nombre') border-red-500 bg-red-500/10 @enderror" 
                                   id="nombre" 
                                   name="nombre" 
                                   value="{{ old('nombre') }}" 
                                   placeholder="Ingresa el nombre del equipo"
                                   required>
                            
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <i class="fas fa-shield-alt text-white/30"></i>
                            </div>
                        </div>
                        
                        @error('nombre')
                            <div class="flex items-center space-x-2 mt-2 p-3 bg-red-500/20 border border-red-500/30 rounded-lg">
                                <i class="fas fa-exclamation-triangle text-red-400"></i>
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Team Shield Upload Field -->
                    <div class="space-y-2">
                        <label for="escudo" class="block text-sm font-semibold text-white mb-3 flex items-center space-x-2">
                            <i class="fas fa-image text-blue-400"></i>
                            <span>Escudo del Equipo</span>
                        </label>
                        
                        <div class="relative">
                            <!-- Custom File Upload Area -->
                            <div class="border-2 border-dashed border-white/30 rounded-xl p-8 bg-white/5 hover:bg-white/10 transition-all duration-300 cursor-pointer group" 
                                 onclick="document.getElementById('escudo').click()">
                                <div class="text-center">
                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-cloud-upload-alt text-2xl text-white"></i>
                                    </div>
                                    <h4 class="text-white font-semibold mb-2">Subir Escudo</h4>
                                    <p class="text-white/60 text-sm mb-2">Haz clic para seleccionar una imagen</p>
                                    <p class="text-white/40 text-xs">JPG, PNG, GIF - Máximo 2MB</p>
                                </div>
                            </div>
                            
                            <input type="file" 
                                   class="hidden @error('escudo') border-red-500 @enderror" 
                                   id="escudo" 
                                   name="escudo" 
                                   accept="image/*"
                                   onchange="previewImage(this)">
                        </div>
                        
                        <!-- Image Preview Area -->
                        <div id="imagePreview" class="hidden mt-4">
                            <div class="bg-white/10 border border-white/20 rounded-xl p-4 flex items-center space-x-4">
                                <img id="previewImg" src="" alt="Preview" class="w-16 h-16 object-cover rounded-lg border-2 border-white/30">
                                <div class="flex-1">
                                    <p class="text-white font-medium" id="fileName"></p>
                                    <p class="text-white/60 text-sm" id="fileSize"></p>
                                </div>
                                <button type="button" onclick="removeImage()" class="text-red-400 hover:text-red-300 p-2 hover:bg-red-500/20 rounded-lg transition-colors duration-300">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-2 mt-3 p-3 bg-blue-500/20 border border-blue-500/30 rounded-lg">
                            <i class="fas fa-info-circle text-blue-400"></i>
                            <span class="text-blue-400 text-sm">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</span>
                        </div>
                        
                        @error('escudo')
                            <div class="flex items-center space-x-2 mt-2 p-3 bg-red-500/20 border border-red-500/30 rounded-lg">
                                <i class="fas fa-exclamation-triangle text-red-400"></i>
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-4 pt-8 border-t border-white/10">
                        <a href="{{ route('admin.equipos.index') }}" 
                           class="inline-flex items-center justify-center space-x-2 px-6 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl border border-white/20 hover:border-white/30 transition-all duration-300 backdrop-blur-sm group">
                            <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform duration-300"></i>
                            <span>Volver</span>
                        </a>
                        
                        <button type="submit" 
                                class="inline-flex items-center justify-center space-x-2 px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-transparent">
                            <i class="fas fa-save"></i>
                            <span>Crear Equipo</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Help Section -->
        <div class="mt-8">
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl">
                <h4 class="text-lg font-semibold text-white mb-4 flex items-center space-x-2">
                    <i class="fas fa-lightbulb text-yellow-400"></i>
                    <span>Consejos</span>
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-start space-x-3 p-4 bg-white/5 rounded-lg border border-white/10">
                        <i class="fas fa-check-circle text-green-400 mt-1"></i>
                        <div>
                            <p class="text-white font-medium mb-1">Nombre claro</p>
                            <p class="text-white/70 text-sm">Usa un nombre distintivo y fácil de recordar para el equipo.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 p-4 bg-white/5 rounded-lg border border-white/10">
                        <i class="fas fa-image text-blue-400 mt-1"></i>
                        <div>
                            <p class="text-white font-medium mb-1">Escudo de calidad</p>
                            <p class="text-white/70 text-sm">Sube una imagen con buena resolución para mejor presentación.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('fileName').textContent = file.name;
            document.getElementById('fileSize').textContent = formatFileSize(file.size);
            document.getElementById('imagePreview').classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }
}

function removeImage() {
    document.getElementById('escudo').value = '';
    document.getElementById('imagePreview').classList.add('hidden');
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}
</script>
@endsection