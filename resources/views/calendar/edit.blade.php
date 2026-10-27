@extends('layouts.app')

@section('title', 'Editar Publicación - Vant Calendar')

@section('content')
    <div class="max-w-3xl mx-auto">
        <!-- Encabezado y Menú Desplegable con Hover (Tres Puntos) -->
        <div class="flex justify-between items-center mb-6 bg-[#1C1C1E] p-5 rounded-xl border border-[#6E6E73] shadow-xl">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-[#F0F1F2] flex items-center gap-2">
                    Editar Publicación
                </h1>
                <p class="text-xs text-[#BFC0C0] mt-1">Modifica los detalles del contenido programado</p>
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

        <form action="{{ route('calendar.update', $calendar->id_calendar) }}" method="POST" enctype="multipart/form-data" class="bg-[#1C1C1E] rounded-lg shadow-xl p-6 border border-[#6E6E73] space-y-5">
            @csrf
            @method('PUT')

            <!-- Fecha y Hora -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Fecha de Publicación</label>
                    @php
                        $fechaActual = isset($calendar->date) ? $calendar->date->year . '-' . str_pad($calendar->date->month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($calendar->date->day, 2, '0', STR_PAD_LEFT) : '';
                    @endphp
                    <input type="date" name="fecha" value="{{ $fechaActual }}" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Hora (Formato Militar 24h)</label>
                    <input type="time" name="hora" value="{{ $calendar->date->hour ?? '' }}" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none">
                </div>
            </div>

            <!-- Red Social, Tipo y Recurso -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Red Social</label>
                    @php
                        $rs = $calendar->socialMedia;
                        $currentSocial = $rs ? ($rs->instagram ? 'Instagram' : ($rs->tiktok ? 'TikTok' : ($rs->x ? 'X' : ($rs->linkedin ? 'LinkedIn' : 'Facebook')))) : '';
                    @endphp
                    <select name="red_social" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none">
                        <option value="Instagram" {{ $currentSocial == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                        <option value="TikTok" {{ $currentSocial == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                        <option value="X" {{ $currentSocial == 'X' ? 'selected' : '' }}>X (Twitter)</option>
                        <option value="LinkedIn" {{ $currentSocial == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                        <option value="Facebook" {{ $currentSocial == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Tipo de Contenido</label>
                    @php
                        $ct = $calendar->contentType;
                        $currentType = $ct ? ($ct->community ? 'Community' : ($ct->marketing ? 'Marketing' : 'Institutional')) : '';
                    @endphp
                    <select name="tipo_contenido" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none">
                        <option value="Community" {{ $currentType == 'Community' ? 'selected' : '' }}>Community</option>
                        <option value="Marketing" {{ $currentType == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="Institutional" {{ $currentType == 'Institutional' ? 'selected' : '' }}>Institutional</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Recurso (Format)</label>
                    @php
                        $mr = $calendar->mediaResource;
                        $currentResource = $mr ? ($mr->reel ? 'Reel' : ($mr->carrusel ? 'Carrusel' : ($mr->static_post ? 'Post Estático' : 'Storie'))) : '';
                    @endphp
                    <select name="recurso" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none">
                        <option value="Reel" {{ $currentResource == 'Reel' ? 'selected' : '' }}>Reel</option>
                        <option value="Carrusel" {{ $currentResource == 'Carrusel' ? 'selected' : '' }}>Carrusel</option>
                        <option value="Post Estático" {{ $currentResource == 'Post Estático' ? 'selected' : '' }}>Post Estático</option>
                        <option value="Storie" {{ $currentResource == 'Storie' ? 'selected' : '' }}>Storie</option>
                    </select>
                </div>
            </div>

            <!-- Feed / Ubicación -->
            <div>
                <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Feed / Ubicación</label>
                <textarea name="feed" rows="2" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none">{{ $calendar->feed->feed_txt ?? '' }}</textarea>
            </div>

            <!-- Llamado a la Acción (CTA) -->
            <div>
                <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Llamado a la Acción (CTA)</label>
                <input type="text" name="cta" value="{{ $calendar->cta->cta_txt ?? '' }}" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none">
            </div>

            <!-- Copy -->
            <div>
                <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Copy (Texto de la publicación)</label>
                <textarea name="copy" rows="4" required class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2.5 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none">{{ $calendar->copyRecord->copy ?? '' }}</textarea>
            </div>

            <!-- Mockup Opcional -->
            <div>
                <label class="block text-sm font-medium text-[#BFC0C0] mb-1">Mockup / Archivo Visual <span class="text-[#6E6E73] text-xs">(Dejar en blanco para conservar el actual)</span></label>
                <input type="file" name="mockup" accept=".mov,.mp4,.jpeg,.jpg,.png" class="w-full bg-[#1C1C1E] border border-[#6E6E73] rounded p-2 text-[#F0F1F2] focus:border-[#5A738E] focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#5A738E] file:text-[#F0F1F2] hover:file:bg-[#5A738E]/80 cursor-pointer">
            </div>

            <button type="submit" class="w-full bg-[#5A738E] hover:bg-[#5A738E]/80 text-[#F0F1F2] font-bold py-3 px-4 rounded transition duration-200 shadow">
                Actualizar Registro
            </button>
        </form>
    </div>
@endsection