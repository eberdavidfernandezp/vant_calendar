@extends('layouts.app')

@section('title', 'Crear Publicación - Vant Calendar')

@section('content')
    <div class="max-w-3xl mx-auto">
        <!-- Encabezado y Menú Desplegable con Hover (Tres Puntos) -->
        <div class="flex justify-between items-center mb-6 bg-[#1C1C1E] p-5 rounded-xl border border-[#6E6E73] shadow-xl">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-[#F0F1F2] flex items-center gap-2">
                    Registrar Nuevo Contenido
                </h1>
                <p class="text-xs text-[#BFC0C0] mt-1">Añade una nueva publicación al calendario</p>
            </div>

            <!-- Contenedor con efecto Hover para desplegar de derecha a izquierda (Menú de Opciones con Iconos) -->
            <div class="group relative flex items-center justify-end">
                
                <!-- Panel Desplegable con las Opciones (Solo Iconos / Enlaces Visuales) -->
                <div class="absolute right-12 top-1/2 -translate-y-1/2 w-0 opacity-0 pointer-events-none group-hover:pointer-events-auto group-hover:w-[220px] group-hover:opacity-100 transition-all duration-300 ease-in-out bg-[#1C1C1E] border border-[#6E6E73] rounded-lg shadow-2xl p-2 z-40 overflow-hidden whitespace-nowrap flex items-center justify-around">
                    
                    <!-- Ver Dashboard -->
                    <a href="{{ route('dashboard') }}" class="p-2 text-[#F0F1F2] hover:text-[#5A738E] hover:bg-[#6E6E73]/20 rounded-md transition flex flex-col items-center gap-1" title="Ver Dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="text-[9px]">Dashboard</span>
                    </a>

                    <!-- Ver Tablero -->
                    <a href="{{ route('calendar.board') }}" class="p-2 text-[#F0F1F2] hover:text-[#5A738E] hover:bg-[#6E6E73]/20 rounded-md transition flex flex-col items-center gap-1" title="Ver Tablero">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span class="text-[9px]">Tablero</span>
                    </a>

                    <!-- Ver Lista -->
                    <a href="{{ route('calendar.index') }}" class="p-2 text-[#F0F1F2] hover:text-[#5A738E] hover:bg-[#6E6E73]/20 rounded-md transition flex flex-col items-center gap-1" title="Ver Lista">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <span class="text-[9px]">Lista</span>
                    </a>
                </div>

                <!-- Botón / Icono de los Tres Puntos (Activador Hover) -->
                <div class="bg-[#1C1C1E] hover:bg-[#6E6E73]/30 border border-[#6E6E73] text-[#F0F1F2] p-2.5 rounded-full shadow cursor-pointer transition flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#F0F1F2]" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </div>
            </div>
        </div>

        <form action="{{ route('calendar.store') }}" method="POST" enctype="multipart/form-data" class="bg-[#1C1C1E] rounded-lg shadow-xl p-6 border border-[#6E6E73] space-y-5">
            @csrf

            <!-- Fecha, Hora y Estado Inicial -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Fecha de Publicación</label>
                    <input type="date" name="fecha" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Hora (Formato Militar 24h)</label>
                    <input type="time" name="hora" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Estado Inicial</label>
                    <select name="status" class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none text-sm">
                        <option value="en_proceso" selected>En Proceso</option>
                        <option value="publicado">Publicado</option>
                    </select>
                </div>
            </div>

            <!-- Red Social, Tipo de Contenido y Recurso -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Red Social</label>
                    <select name="red_social" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none text-sm">
                        <option value="Instagram">Instagram</option>
                        <option value="TikTok">TikTok</option>
                        <option value="X">X (Twitter)</option>
                        <option value="LinkedIn">LinkedIn</option>
                        <option value="Facebook">Facebook</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Tipo de Contenido</label>
                    <select name="tipo_contenido" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none text-sm">
                        <option value="Community">Community</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Institutional">Institutional</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Recurso (Formato)</label>
                    <select name="recurso" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none text-sm">
                        <option value="Reel">Reel</option>
                        <option value="Carrusel">Carrusel</option>
                        <option value="Post Estático">Post Estático</option>
                        <option value="Storie">Storie</option>
                    </select>
                </div>
            </div>

            <!-- Feed / Ubicación -->
            <div>
                <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Feed / Ubicación</label>
                <textarea rows="3" name="feed" placeholder="Ej. Feed Principal, Stories, Reel Destacado..." required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none text-sm placeholder-[#6E6E73]"></textarea>
            </div>
            
            <!-- Copy de la Publicación -->
            <div>
                <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Copy (Texto de la publicación)</label>
                <textarea name="copy" rows="4" placeholder="Escribe aquí el texto del post..." required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none text-sm placeholder-[#6E6E73]"></textarea>
            </div>

            <!-- Llamado a la Acción (CTA) -->
            <div>
                <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Llamado a la Acción (CTA)</label>
                <input type="text" name="cta" placeholder="Ej. ¡Comenta abajo!, Link en bio..." required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none text-sm placeholder-[#6E6E73]">
            </div>

            <!-- Mockup Opcional con Vista Previa -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-[#BFC0C0] mb-1">
                    Mockup / Archivo Visual <span class="text-[#6E6E73] text-xs">(Opcional: .mov, .mp4, .jpeg, .jpg, .png)</span>
                </label>
                <input type="file" id="mockupInput" name="mockup" accept=".mov,.mp4,.jpeg,.jpg,.png" class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#5A738E] file:text-[#F0F1F2] hover:file:bg-[#5A738E]/80 cursor-pointer text-sm">
                
                <!-- Box de vista previa dinámica -->
                <div id="previewContainer" class="hidden mt-3 p-3 bg-[#1C1C1E] border border-[#6E6E73] rounded-lg flex flex-col items-center justify-center">
                    <p class="text-xs text-[#BFC0C0] mb-2">Vista previa del archivo seleccionado:</p>
                    
                    <!-- Preview Imagen -->
                    <img id="imagePreview" src="#" alt="Preview Mockup" class="hidden max-h-56 rounded border border-[#6E6E73] object-contain">
                    
                    <!-- Preview Video -->
                    <video id="videoPreview" controls class="hidden max-h-56 w-full rounded border border-[#6E6E73]"></video>
                </div>
            </div>

            <button type="submit" class="w-full bg-[#5A738E] hover:bg-[#5A738E]/80 text-[#F0F1F2] font-bold py-3 px-4 rounded transition duration-200 shadow">
                Guardar Registro
            </button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        const mockupInput = document.getElementById('mockupInput');
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');
        const videoPreview = document.getElementById('videoPreview');

        mockupInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                const fileType = file.type;
                const fileURL = URL.createObjectURL(file);

                previewContainer.classList.remove('hidden');

                if (fileType.startsWith('image/')) {
                    imagePreview.src = fileURL;
                    imagePreview.classList.remove('hidden');
                    videoPreview.classList.add('hidden');
                    videoPreview.pause();
                } else if (fileType.startsWith('video/') || file.name.endsWith('.mov')) {
                    videoPreview.src = fileURL;
                    videoPreview.classList.remove('hidden');
                    imagePreview.classList.add('hidden');
                } else {
                    previewContainer.classList.add('hidden');
                }
            } else {
                previewContainer.classList.add('hidden');
                imagePreview.classList.add('hidden');
                videoPreview.classList.add('hidden');
            }
        });
    </script>
@endpush