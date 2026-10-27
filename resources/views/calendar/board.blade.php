@extends('layouts.app')

@section('title', 'Calendario - Tablero Apple Style')

@section('content')
<!-- Cabecera Principal y Navegación -->
<div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-[#1C1C1E] p-5 rounded-xl border border-[#6E6E73] shadow-xl mb-6">
    <div>
        <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-[#F0F1F2] flex items-center gap-2">
            Calendario
        </h1>
        <p class="text-xs text-[#BFC0C0] mt-1">Centro de control, analítica y alertas de contenidos</p>
    </div>

    <!-- Selector de Mes y Menú Desplegable con Hover (Tres Puntos) -->
    <div class="flex flex-wrap items-center gap-3">
        
        <!-- Selector de Mes con Flechas Dinámicas en Hover -->
        <div class="group relative flex items-center justify-center bg-[#1C1C1E] border border-[#6E6E73]/50 rounded-lg px-6 py-2 shadow-sm min-w-[200px]">
            <a href="{{ route('calendar.board', ['year' => $prevMonth->year, 'month' => $prevMonth->format('m')]) }}" 
               class="absolute left-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-[#F0F1F2] hover:text-[#5A738E] p-1 font-bold text-sm" title="Mes Anterior">
                ‹
            </a>

            <span class="text-xs sm:text-sm font-semibold text-[#F0F1F2] uppercase tracking-wider text-center">
                {{ $monthName }}
            </span>

            <a href="{{ route('calendar.board', ['year' => $nextMonth->year, 'month' => $nextMonth->format('m')]) }}" 
               class="absolute right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-[#F0F1F2] hover:text-[#5A738E] p-1 font-bold text-sm" title="Mes Siguiente">
                ›
            </a>
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

<!-- Cuadrícula del Calendario Estilo Apple -->
<div class="bg-[#1C1C1E] rounded-xl shadow-2xl border border-[#6E6E73]/40 overflow-hidden w-full">
    <div class="grid grid-cols-7 border-b border-[#6E6E73]/30 text-center text-[9px] sm:text-[11px] font-medium text-[#BFC0C0] py-2.5 tracking-wider">
        <div>LUN</div>
        <div>MAR</div>
        <div>MIÉ</div>
        <div>JUE</div>
        <div>VIE</div>
        <div>SÁB</div>
        <div>DOM</div>
    </div>

    <div class="grid grid-cols-7 auto-rows-fr bg-[#6E6E73]/20 gap-[1px]">
        @for ($i = 1; $i < $firstDayOfWeek; $i++)
            <div class="bg-[#1C1C1E]/60 min-h-[85px] sm:min-h-[130px] p-1 sm:p-2 opacity-30"></div>
        @endfor

        @for ($day = 1; $day <= $daysInMonth; $day++)
            @php
                $dayEvents = $eventsByDay[$day] ?? collect();
                $isToday = ($day == date('j') && $month == date('m') && $year == date('Y'));
            @endphp

            <div class="bg-[#1C1C1E] min-h-[85px] sm:min-h-[130px] p-1 sm:p-2 flex flex-col justify-between transition hover:bg-[#6E6E73]/10 overflow-hidden">
                <div class="flex justify-between items-center mb-1">
                    <span class="text-[11px] sm:text-xs font-medium {{ $isToday ? 'bg-[#5A738E] text-[#F0F1F2] w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center rounded-full shadow-sm' : 'text-[#F0F1F2]' }}">
                        {{ $day }}
                    </span>
                    @if($dayEvents->count() > 0)
                        <span class="text-[8px] sm:text-[9px] text-[#BFC0C0] font-light hidden sm:inline">
                            {{ $dayEvents->count() }} {{ $dayEvents->count() == 1 ? 'post' : 'posts' }}
                        </span>
                    @endif
                </div>

                <div class="space-y-1 overflow-y-auto max-h-[60px] sm:max-h-[105px] pr-0.5">
                    @foreach($dayEvents as $event)
                        @php
                            $badgeStyle = 'bg-[#6E6E73]/30 text-[#F0F1F2] border border-[#6E6E73]/50';
                            $socialName = '';
                            if ($event->socialMedia) {
                                if ($event->socialMedia->instagram) { $socialName = 'IG'; $badgeStyle = 'bg-pink-950/60 text-pink-300 border border-pink-800/60'; }
                                elseif ($event->socialMedia->tiktok) { $socialName = 'TK'; $badgeStyle = 'bg-cyan-950/60 text-cyan-300 border border-cyan-800/60'; }
                                elseif ($event->socialMedia->x) { $socialName = 'X'; $badgeStyle = 'bg-zinc-800 text-zinc-200 border border-zinc-700'; }
                                elseif ($event->socialMedia->linkedin) { $socialName = 'IN'; $badgeStyle = 'bg-blue-950/60 text-blue-300 border border-blue-800/60'; }
                                elseif ($event->socialMedia->facebook) { $socialName = 'FB'; $badgeStyle = 'bg-indigo-950/60 text-indigo-300 border border-indigo-800/60'; }
                            }
                        @endphp

                        <a href="{{ route('calendar.show', $event->id_calendar) }}" class="block {{ $badgeStyle }} px-1 py-0.5 sm:py-1 rounded text-left transition hover:brightness-125 shadow-sm group">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-[8px] sm:text-[9px] font-bold tracking-wider">
                                    {{ $socialName }}
                                </span>
                                <span class="text-[7px] sm:text-[8px] text-[#BFC0C0] hidden sm:inline">
                                    {{ $event->date->hour ?? '' }}
                                </span>
                            </div>
                            <p class="text-[9px] sm:text-[10px] text-[#F0F1F2] truncate mt-0.5 font-normal">
                                {{ $event->copyRecord->copy ?? 'Sin copy' }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection