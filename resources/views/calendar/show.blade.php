@extends('layouts.app')

@section('title', 'Detalle de Publicación - Vant Calendar')

@section('content')
    <div class="max-w-3xl mx-auto">
        <!-- Encabezado y Menú Desplegable con Hover (Tres Puntos) -->
        <div class="flex justify-between items-center mb-6 bg-[#1C1C1E] p-5 rounded-xl border border-[#6E6E73] shadow-xl">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-[#F0F1F2] flex items-center gap-2">
                    Detalles de la Publicación
                </h1>
                <p class="text-xs text-[#BFC0C0] mt-1">Información detallada del contenido seleccionado</p>
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

        <!-- Tarjeta Principal de Información -->
        <div class="bg-[#1C1C1E] rounded-lg shadow-xl p-6 border border-[#6E6E73] space-y-6">
            
            <!-- Fila 0: Estado Interactivo -->
            <div class="flex justify-between items-center bg-[#6E6E73]/20 p-4 rounded border border-[#6E6E73]">
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Estado Actual</span>
                    <span class="text-xs text-[#F0F1F2]">Haz clic en el botón para alternar el estatus rápidamente</span>
                </div>
                <div>
                    <form action="{{ route('calendar.toggleStatus', $calendar->id_calendar) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" title="Haz clic para alternar el estado" class="focus:outline-none transition transform hover:scale-105">
                            @if($calendar->status === 'publicado')
                                <span class="bg-green-950 text-green-300 border border-green-800 py-1.5 px-3 rounded-full text-xs font-semibold inline-flex items-center gap-1.5 cursor-pointer shadow">
                                    <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span> Publicado 
                                </span>
                            @else
                                <span class="bg-yellow-950 text-yellow-300 border border-yellow-800 py-1.5 px-3 rounded-full text-xs font-semibold inline-flex items-center gap-1.5 cursor-pointer shadow">
                                    <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span> En Proceso 
                                </span>
                            @endif
                        </button>
                    </form>
                </div>
            </div>

            <!-- Fila 1: Fecha, Hora y Red Social -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-b border-[#6E6E73]/40 pb-4">
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Fecha</span>
                    <span class="text-lg font-medium text-[#F0F1F2]">
                        {{ isset($calendar->date) ? $calendar->date->day . '/' . $calendar->date->month . '/' . $calendar->date->year : 'N/A' }}
                    </span>
                </div>
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Hora (24h)</span>
                    <span class="text-lg font-medium text-[#F0F1F2]">{{ $calendar->date->hour ?? 'N/A' }}</span>
                </div>
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Red Social</span>
                    @php
                        $badgeClasses = 'bg-gray-700 text-gray-300';
                        $socialName = 'N/A';
                        if ($calendar->socialMedia) {
                            if ($calendar->socialMedia->instagram) { $socialName = 'Instagram'; $badgeClasses = 'bg-pink-950 text-pink-300 border border-pink-800'; }
                            elseif ($calendar->socialMedia->tiktok) { $socialName = 'TikTok'; $badgeClasses = 'bg-gray-950 text-cyan-300 border border-cyan-800'; }
                            elseif ($calendar->socialMedia->x) { $socialName = 'X'; $badgeClasses = 'bg-gray-900 text-gray-100 border border-gray-600'; }
                            elseif ($calendar->socialMedia->linkedin) { $socialName = 'LinkedIn'; $badgeClasses = 'bg-blue-950 text-blue-300 border border-blue-800'; }
                            elseif ($calendar->socialMedia->facebook) { $socialName = 'Facebook'; $badgeClasses = 'bg-indigo-950 text-indigo-300 border border-indigo-800'; }
                        }
                    @endphp
                    <span class="inline-block mt-1 {{ $badgeClasses }} py-1 px-3 rounded-full text-xs font-semibold">
                        {{ $socialName }}
                    </span>
                </div>
            </div>

            <!-- Fila 2: Tipo de Contenido y Recurso -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-b border-[#6E6E73]/40 pb-4">
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Tipo de Contenido</span>
                    <span class="text-[#F0F1F2]">
                        @if($calendar->contentType)
                            @if($calendar->contentType->community) Community 
                            @elseif($calendar->contentType->marketing) Marketing 
                            @elseif($calendar->contentType->institutional) Institutional 
                            @else N/A @endif
                        @else N/A @endif
                    </span>
                </div>
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Formato / Recurso</span>
                    <span class="text-[#F0F1F2]">
                        @if($calendar->mediaResource)
                            @if($calendar->mediaResource->reel) Reel 
                            @elseif($calendar->mediaResource->carrusel) Carrusel 
                            @elseif($calendar->mediaResource->static_post) Post Estático 
                            @elseif($calendar->mediaResource->storie) Storie 
                            @else General @endif
                        @else N/A @endif
                    </span>
                </div>
            </div>

            <!-- Fila 3: Feed y CTA -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-b border-[#6E6E73]/40 pb-4">
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Feed / Ubicación</span>
                    <span class="text-[#F0F1F2]">{{ $calendar->feed->feed_txt ?? 'N/A' }}</span>
                </div>
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Llamado a la Acción (CTA)</span>
                    <span class="inline-block mt-1 bg-[#6E6E73]/30 text-[#F0F1F2] border border-[#6E6E73] px-2.5 py-1 rounded text-xs">
                        {{ $calendar->cta->cta_txt ?? 'N/A' }}
                    </span>
                </div>
            </div>

            <!-- Fila 4: Copy completo -->
            <div class="border-b border-[#6E6E73]/40 pb-4">
                <span class="block text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold mb-1">Copy de la Publicación</span>
                <div class="bg-[#1C1C1E] p-4 rounded border border-[#6E6E73] text-[#F0F1F2] whitespace-pre-wrap text-sm leading-relaxed">
                    {{ $calendar->copyRecord->copy ?? 'N/A' }}
                </div>
            </div>

            <!-- Fila 5: Mockup / Archivo Visual Completo -->
            <div>
                <span class="block text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold mb-2">Mockup / Archivo Visual</span>
                @if(!empty($calendar->mockup) && !empty(trim($calendar->mockup->mockup)))
                    @php
                        $filePath = $calendar->mockup->mockup;
                        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                    @endphp

                    <div class="bg-[#1C1C1E] p-4 rounded border border-[#6E6E73] flex flex-col items-center justify-center">
                        @if(in_array($extension, ['jpeg', 'jpg', 'png']))
                            <a href="{{ asset($filePath) }}" target="_blank" title="Abrir imagen en tamaño completo">
                                <img src="{{ asset($filePath) }}" alt="Mockup Completo" class="max-h-96 rounded border border-[#6E6E73] object-contain hover:opacity-95 transition shadow-md">
                            </a>
                        @elseif(in_array($extension, ['mp4', 'mov']))
                            <video src="{{ asset($filePath) }}" controls class="max-h-96 w-full rounded border border-[#6E6E73] shadow-md"></video>
                        @else
                            <a href="{{ asset($filePath) }}" target="_blank" class="text-[#5A738E] hover:text-[#F0F1F2] underline text-sm">
                                Descargar o Ver Archivo Adjunto
                            </a>
                        @endif
                    </div>
                @else
                    <span class="text-[#6E6E73] text-sm italic">No se adjuntó ningún archivo multimedia para este evento.</span>
                @endif
            </div>

            <!-- Botones de Acción Inferiores -->
            <div class="flex justify-end space-x-3 pt-2">
                <a href="{{ route('calendar.edit', $calendar->id_calendar) }}" class="bg-[#5A738E] hover:bg-[#5A738E]/80 text-[#F0F1F2] px-4 py-2 rounded text-sm font-semibold transition shadow">
                    Editar Publicación
                </a>
                <form action="{{ route('calendar.destroy', $calendar->id_calendar) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este evento?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-900/80 hover:bg-red-900 text-[#F0F1F2] px-4 py-2 rounded text-sm font-semibold transition border border-red-700 shadow">
                        Eliminar
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection