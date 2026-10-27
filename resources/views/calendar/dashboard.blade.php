@extends('layouts.app')

@section('title', 'Dashboard General - Vant Calendar')

@section('content')
    <div class="space-y-6">
        <!-- Cabecera Principal y Navegación -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-[#1C1C1E] p-5 rounded-xl border border-[#6E6E73] shadow-xl">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-[#F0F1F2] flex items-center gap-2">
                    Dashboard
                </h1>
                <p class="text-xs text-[#BFC0C0] mt-1">Centro de control, analítica y alertas de contenidos</p>
            </div>

            <!-- Selector de Mes y Menú Desplegable con Hover (Tres Puntos) -->
            <div class="flex flex-wrap items-center gap-3">
                
                <!-- Selector de Mes con Hover en Flechas -->
                <div class="group relative flex items-center justify-center bg-[#1C1C1E] border border-[#6E6E73]/60 rounded-lg px-6 py-2 shadow-sm min-w-[180px]">
                    <a href="{{ route('dashboard', ['year' => $prevMonth->year, 'month' => $prevMonth->format('m')]) }}" 
                       class="absolute left-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-[#F0F1F2] hover:text-[#5A738E] p-1 font-bold text-sm" title="Mes Anterior">
                        ‹
                    </a>

                    <span class="text-xs font-semibold text-[#F0F1F2] uppercase tracking-wider text-center">
                        {{ $monthName }}
                    </span>

                    <a href="{{ route('dashboard', ['year' => $nextMonth->year, 'month' => $nextMonth->format('m')]) }}" 
                       class="absolute right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-[#F0F1F2] hover:text-[#5A738E] p-1 font-bold text-sm" title="Mes Siguiente">
                        ›
                    </a>
                </div>

                <!-- Contenedor con efecto Hover para desplegar de derecha a izquierda (Menú de Opciones con Iconos) -->
                <div class="group relative flex items-center justify-end">
                    
                    <!-- Panel Desplegable con las Opciones (Solo Iconos / Enlaces Visuales) -->
                    <div class="absolute right-12 top-1/2 -translate-y-1/2 w-0 opacity-0 pointer-events-none group-hover:pointer-events-auto group-hover:w-[220px] group-hover:opacity-100 transition-all duration-300 ease-in-out bg-[#1C1C1E] border border-[#6E6E73] rounded-lg shadow-2xl p-2 z-40 overflow-hidden whitespace-nowrap flex items-center justify-around">
                        
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

                        <!-- Registrar Evento -->
                        <a href="{{ route('calendar.create') }}" class="p-2 text-[#F0F1F2] hover:text-[#5A738E] hover:bg-[#6E6E73]/20 rounded-md transition flex flex-col items-center gap-1" title="Registrar Contenido">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <span class="text-[9px]">Nuevo</span>
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
        </div>

        <!-- Sección de KPIs e Insights del Mes -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Planificados -->
            <div class="bg-[#1C1C1E] p-5 rounded-xl border border-[#6E6E73] shadow-md flex flex-col justify-between">
                <span class="text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Planificados (Mes)</span>
                <div class="flex items-baseline justify-between mt-3">
                    <span class="text-3xl font-extrabold text-[#F0F1F2]">{{ $totalPlanned }}</span>
                    <span class="text-xs text-[#5A738E] font-medium bg-[#5A738E]/20 px-2 py-0.5 rounded">Total objetivo</span>
                </div>
            </div>

            <!-- Publicados Exitosamente -->
            <div class="bg-[#1C1C1E] p-5 rounded-xl border border-[#6E6E73] shadow-md flex flex-col justify-between">
                <span class="text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Ejecutados Exitosamente</span>
                <div class="flex items-baseline justify-between mt-3">
                    <span class="text-3xl font-extrabold text-green-400">{{ $publishedCount }}</span>
                    <span class="text-xs text-green-300 bg-green-950/60 border border-green-800/60 px-2 py-0.5 rounded">Completados</span>
                </div>
            </div>

            <!-- En Proceso / Pendientes -->
            <div class="bg-[#1C1C1E] p-5 rounded-xl border border-[#6E6E73] shadow-md flex flex-col justify-between">
                <span class="text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">En Proceso (Pendientes)</span>
                <div class="flex items-baseline justify-between mt-3">
                    <span class="text-3xl font-extrabold text-yellow-400">{{ $inProcessCount }}</span>
                    <span class="text-xs text-yellow-300 bg-yellow-950/60 border border-yellow-800/60 px-2 py-0.5 rounded">Por publicar</span>
                </div>
            </div>

            <!-- Tasa de Éxito -->
            <div class="bg-[#1C1C1E] p-5 rounded-xl border border-[#6E6E73] shadow-md flex flex-col justify-between">
                <span class="text-xs uppercase tracking-wider text-[#BFC0C0] font-semibold">Tasa de Cumplimiento</span>
                <div class="flex items-baseline justify-between mt-3">
                    <span class="text-3xl font-extrabold text-[#F0F1F2]">{{ $successRate }}%</span>
                    <div class="w-24 bg-[#6E6E73]/30 rounded-full h-2.5 overflow-hidden border border-[#6E6E73]/50">
                        <div class="bg-[#5A738E] h-2.5 rounded-full" style="width: {{ $successRate }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel de Advertencias y Tareas Pendientes -->
        <div class="bg-[#1C1C1E] rounded-xl shadow-xl p-5 border border-[#6E6E73]">
            <div class="flex justify-between items-center mb-4 pb-2 border-b border-[#6E6E73]/40">
                <h2 class="text-lg font-semibold text-[#F0F1F2] flex items-center gap-2">
                    ⚠️ Advertencias y Contenidos En Proceso
                </h2>
                <span class="text-xs bg-yellow-950/60 text-yellow-300 border border-yellow-800/60 px-2.5 py-1 rounded-full font-semibold">
                    {{ $pendingAlerts->count() }} pendientes de atención
                </span>
            </div>

            @if($pendingAlerts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                    @foreach($pendingAlerts as $alert)
                        @php
                            $socialName = 'General';
                            $badgeClass = 'bg-gray-800 text-gray-300';
                            if ($alert->socialMedia) {
                                if ($alert->socialMedia->instagram) { $socialName = 'Instagram'; $badgeClass = 'bg-pink-950 text-pink-300 border border-pink-800'; }
                                elseif ($alert->socialMedia->tiktok) { $socialName = 'TikTok'; $badgeClass = 'bg-gray-950 text-cyan-300 border border-cyan-800'; }
                                elseif ($alert->socialMedia->x) { $socialName = 'X'; $badgeClass = 'bg-gray-900 text-gray-100 border border-gray-600'; }
                                elseif ($alert->socialMedia->linkedin) { $socialName = 'LinkedIn'; $badgeClass = 'bg-blue-950 text-blue-300 border border-blue-800'; }
                                elseif ($alert->socialMedia->facebook) { $socialName = 'Facebook'; $badgeClass = 'bg-indigo-950 text-indigo-300 border border-indigo-800'; }
                            }
                        @endphp
                        <div class="bg-[#6E6E73]/10 border border-[#6E6E73]/40 p-3.5 rounded-lg flex flex-col justify-between hover:border-[#5A738E] transition">
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="{{ $badgeClass }} text-[10px] px-2 py-0.5 rounded-full font-semibold">
                                        {{ $socialName }}
                                    </span>
                                    <span class="text-xs text-[#BFC0C0] font-medium">
                                        {{ $alert->date->day ?? '?' }}/{{ $alert->date->month ?? '?' }}/{{ $alert->date->year ?? '?' }} - {{ $alert->date->hour ?? '' }}
                                    </span>
                                </div>
                                <p class="text-xs text-[#F0F1F2] line-clamp-2 mb-3">
                                    {{ $alert->copyRecord->copy ?? 'Sin copy registrado' }}
                                </p>
                            </div>
                            <div class="flex justify-between items-center pt-2 border-t border-[#6E6E73]/30">
                                <span class="text-[10px] text-yellow-400 font-semibold flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-400 animate-pulse"></span> Requiere acción
                                </span>
                                <a href="{{ route('calendar.show', $alert->id_calendar) }}" class="text-xs text-[#5A738E] hover:underline font-bold">
                                    Revisar →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="py-8 text-center text-[#BFC0C0] text-sm italic">
                    ¡Excelente trabajo! No hay publicaciones pendientes o en proceso para este mes. Todo está al día. 🚀
                </div>
            @endif
        </div>
    </div>
@endsection