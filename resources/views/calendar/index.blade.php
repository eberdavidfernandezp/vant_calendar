@extends('layouts.app')

@section('title', 'Lista de Contenidos - Vant Calendar')

@section('content')
        <!-- Cabecera Principal y Navegación -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4 bg-[#1C1C1E] p-5 rounded-xl border border-[#6E6E73] shadow-xl">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-[#F0F1F2] flex items-center gap-2">
                    Lista de Contenidos
                </h1>
                <p class="text-xs text-[#BFC0C0] mt-1">Centro de control, analítica y alertas de contenidos</p>
            </div>
            
            <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                <!-- Contenedor con efecto Hover para desplegar la Lupa / Filtros -->
                <div class="group relative flex items-center justify-end">
                    <!-- Panel Desplegable con Filtro de Estado -->
                    <div class="absolute right-12 top-1/2 -translate-y-1/2 w-0 opacity-0 pointer-events-none group-hover:pointer-events-auto group-hover:w-[420px] group-hover:opacity-100 transition-all duration-300 ease-in-out bg-[#1C1C1E] border border-[#6E6E73] rounded-lg shadow-2xl p-2 z-40 overflow-hidden whitespace-nowrap">
                        <form method="GET" action="{{ route('calendar.index') }}" class="flex items-center gap-2 w-full">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por copy, CTA o feed..." class="w-full bg-[#1C1C1E] text-[#F0F1F2] border border-[#6E6E73] rounded p-1.5 text-xs focus:border-[#5A738E] focus:outline-none placeholder-[#BFC0C0]">
                            
                            <!-- Filtro por Estado -->
                            <select name="status" onchange="this.form.submit()" class="bg-[#1C1C1E] text-[#F0F1F2] border border-[#6E6E73] rounded p-1.5 text-xs focus:border-[#5A738E] focus:outline-none">
                                <option value="">Estado: Todos</option>
                                <option value="publicado" {{ request('status') == 'publicado' ? 'selected' : '' }}>Publicado</option>
                                <option value="en_proceso" {{ request('status') == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                            </select>

                            <select name="sort" onchange="this.form.submit()" class="bg-[#1C1C1E] text-[#F0F1F2] border border-[#6E6E73] rounded p-1.5 text-xs focus:border-[#5A738E] focus:outline-none">
                                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Próximos</option>
                                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Recientes</option>
                            </select>

                            @if(request('search') || request('sort') || request('status'))
                                <a href="{{ route('calendar.index') }}" class="bg-[#6E6E73] hover:bg-[#BFC0C0] text-[#1C1C1E] font-bold px-2 py-1.5 rounded text-xs transition">
                                    X
                                </a>
                            @endif
                        </form>
                    </div>

                    <!-- Botón / Icono de la Lupa -->
                    <div class="bg-[#1C1C1E] hover:bg-[#6E6E73]/30 border border-[#6E6E73] text-[#F0F1F2] p-2.5 rounded-full shadow cursor-pointer transition flex items-center justify-center relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#F0F1F2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        @if(request('search') || request('sort') || request('status'))
                            <span class="absolute -top-1 -right-1 w-3 h-3 bg-[#5A738E] rounded-full border-2 border-[#1C1C1E]"></span>
                        @endif
                    </div>
                </div>

                <!-- Contenedor con efecto Hover para el Menú Desplegable Principal (Tres Puntos) -->
                <div class="group relative flex items-center justify-end">
                    
                    <!-- Panel Desplegable con las Opciones -->
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

        <!-- Mensajes de éxito -->
        @if(session('success'))
            <div class="bg-[#5A738E]/20 border border-[#5A738E] text-[#1C1C1E] px-4 py-3 rounded mb-6 text-sm flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove();" class="text-[#1C1C1E] hover:text-[#BFC0C0] font-bold">&times;</button>
            </div>
        @endif

        <!-- Tabla de Contenidos Optimizada -->
        <div class="bg-[#1C1C1E] rounded-lg shadow-xl p-4 md:p-6 border border-[#6E6E73]">
            <h2 class="text-lg md:text-xl font-semibold mb-4 text-[#F0F1F2]">Programación de Publicaciones</h2>
            
            <div class="overflow-x-auto -mx-4 md:mx-0">
                <div class="inline-block min-w-full align-middle px-4 md:px-0">
                    <table class="min-w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-[#6E6E73] text-[#F0F1F2] text-xs md:text-sm uppercase tracking-wider">
                                <th class="py-3 px-3">Fecha & Hora</th>
                                <th class="py-3 px-3">Red Social</th>
                                <th class="py-3 px-3 hidden lg:table-cell">Feed</th>
                                <th class="py-3 px-3 hidden lg:table-cell">Recurso</th>
                                <th class="py-3 px-3 max-w-xs">Copy</th>
                                <th class="py-3 px-3 hidden md:table-cell">CTA</th>
                                <th class="py-3 px-3">Mockup</th>
                                <th class="py-3 px-3">Estado</th>
                                <th class="py-3 px-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#6E6E73]/40">
                            @forelse($records as $record)
                                <tr onclick="navigateToDetail(event, '{{ route('calendar.show', $record->id_calendar) }}')" 
                                    class="hover:bg-[#6E6E73]/20 cursor-pointer text-xs md:text-sm transition duration-150">
                                    
                                    <!-- Fecha con Día de la Semana y Hora -->
                                    <td class="py-3 px-3 text-[#F0F1F2] font-medium whitespace-nowrap">
                                        @if(isset($record->date))
                                            @php
                                                try {
                                                    $dateObj = \Carbon\Carbon::create($record->date->year, $record->date->month, $record->date->day);
                                                    $dateObj->setLocale('es');
                                                    $formattedDate = ucfirst($dateObj->isoFormat('ddd, D/MM/YYYY'));
                                                } catch (\Exception $e) {
                                                    $formattedDate = $record->date->day . '/' . $record->date->month . '/' . $record->date->year;
                                                }
                                            @endphp
                                            <span class="text-[#F0F1F2] font-semibold">{{ $formattedDate }}</span>
                                        @else
                                            <span class="text-[#BFC0C0]">N/A</span>
                                        @endif
                                        <span class="block text-[10px] md:text-xs text-[#BFC0C0]">{{ $record->date->hour ?? '' }}</span>
                                    </td>

                                    <!-- Red Social con Colores Distintivos -->
                                    <td class="py-3 px-3 whitespace-nowrap">
                                        @php
                                            $badgeClasses = 'bg-gray-700 text-gray-300';
                                            $socialName = 'N/A';
                                            if ($record->socialMedia) {
                                                if ($record->socialMedia->instagram) { $socialName = 'Instagram'; $badgeClasses = 'bg-pink-950 text-pink-300 border border-pink-800'; }
                                                elseif ($record->socialMedia->tiktok) { $socialName = 'TikTok'; $badgeClasses = 'bg-gray-950 text-cyan-300 border border-cyan-800'; }
                                                elseif ($record->socialMedia->x) { $socialName = 'X'; $badgeClasses = 'bg-gray-900 text-gray-100 border border-gray-600'; }
                                                elseif ($record->socialMedia->linkedin) { $socialName = 'LinkedIn'; $badgeClasses = 'bg-blue-950 text-blue-300 border border-blue-800'; }
                                                elseif ($record->socialMedia->facebook) { $socialName = 'Facebook'; $badgeClasses = 'bg-indigo-950 text-indigo-300 border border-indigo-800'; }
                                            }
                                        @endphp
                                        <span class="{{ $badgeClasses }} py-0.5 px-2.5 rounded-full text-[10px] md:text-xs font-semibold">
                                            {{ $socialName }}
                                        </span>
                                    </td>

                                    <!-- Feed -->
                                    <td class="py-3 px-3 text-[#BFC0C0] whitespace-normal break-words max-w-xs hidden lg:table-cell">
                                        {{ $record->feed->feed_txt ?? 'N/A' }}
                                    </td>

                                    <!-- Recurso -->
                                    <td class="py-3 px-3 text-[#BFC0C0] whitespace-nowrap hidden lg:table-cell">
                                        @if($record->mediaResource)
                                            @if($record->mediaResource->reel) Reel 
                                            @elseif($record->mediaResource->carrusel) Carrusel 
                                            @elseif($record->mediaResource->static_post) Post Estático 
                                            @elseif($record->mediaResource->storie) Storie 
                                            @else General @endif
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <!-- Copy -->
                                    <td class="py-3 px-3 text-[#F0F1F2] whitespace-normal break-words max-w-xs text-xs">
                                        {{ $record->copyRecord->copy ?? 'N/A' }}
                                    </td>

                                    <!-- CTA -->
                                    <td class="py-3 px-3 text-[#BFC0C0] whitespace-normal break-words max-w-xs hidden md:table-cell">
                                        <span class="bg-[#6E6E73]/30 text-[#F0F1F2] px-2 py-0.5 rounded text-[10px] md:text-xs inline-block border border-[#6E6E73]">
                                            {{ $record->cta->cta_txt ?? 'N/A' }}
                                        </span>
                                    </td>

                                    <!-- Mockup (Miniatura) -->
                                    <td class="py-3 px-3 text-[#BFC0C0] whitespace-nowrap">
                                        @if(!empty($record->mockup) && !empty(trim($record->mockup->mockup)))
                                            @php
                                                $filePath = $record->mockup->mockup;
                                                $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                                            @endphp

                                            @if(in_array($extension, ['jpeg', 'jpg', 'png']))
                                                <a href="{{ asset($filePath) }}" target="_blank" title="Ver imagen completa" onclick="event.stopPropagation();">
                                                    <img src="{{ asset($filePath) }}" alt="Mockup" class="w-10 h-10 md:w-12 md:h-12 object-cover rounded border border-[#6E6E73] hover:border-[#F0F1F2] transition shadow">
                                                </a>
                                            @elseif(in_array($extension, ['mp4', 'mov']))
                                                <a href="{{ asset($filePath) }}" target="_blank" title="Ver video" onclick="event.stopPropagation();">
                                                    <video src="{{ asset($filePath) }}" class="w-10 h-10 md:w-12 md:h-12 object-cover rounded border border-[#6E6E73] hover:border-[#F0F1F2] transition shadow" muted></video>
                                                </a>
                                            @else
                                                <a href="{{ asset($filePath) }}" target="_blank" class="text-[#F0F1F2] hover:underline text-xs" onclick="event.stopPropagation();">
                                                    Archivo
                                                </a>
                                            @endif
                                        @else
                                            <span class="text-[#6E6E73] text-[10px] md:text-xs">Sin archivo</span>
                                        @endif
                                    </td>

                                    <!-- Estado Interactivo -->
                                    <td class="py-3 px-3 whitespace-nowrap" onclick="event.stopPropagation();">
                                        <form action="{{ route('calendar.toggleStatus', $record->id_calendar) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" title="Haz clic para alternar el estado" class="focus:outline-none transition transform hover:scale-105">
                                                @if($record->status === 'publicado')
                                                    <span class="bg-green-950 text-green-300 border border-green-800 py-1 px-2.5 rounded-full text-[10px] md:text-xs font-semibold inline-flex items-center gap-1 cursor-pointer">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span> Publicado 
                                                    </span>
                                                @else
                                                    <span class="bg-yellow-950 text-yellow-300 border border-yellow-800 py-1 px-2.5 rounded-full text-[10px] md:text-xs font-semibold inline-flex items-center gap-1 cursor-pointer">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-400 animate-pulse"></span> En Proceso 
                                                    </span>
                                                @endif
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Acciones (Menú de tres puntos) -->
                                    <td class="py-3 px-3 text-center whitespace-nowrap relative" onclick="event.stopPropagation();">
                                        <div class="relative inline-block text-left">
                                            <button onclick="toggleDropdown(event, 'menu-{{ $record->id_calendar }}')" class="text-[#F0F1F2] hover:text-white focus:outline-none p-1.5 md:p-2 rounded-full hover:bg-[#6E6E73]/40 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#F0F1F2]" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                </svg>
                                            </button>

                                            <div id="menu-{{ $record->id_calendar }}" class="dropdown-menu hidden absolute right-0 mt-2 w-36 rounded-md shadow-lg bg-[#1C1C1E] border border-[#6E6E73] ring-1 ring-black ring-opacity-5 z-50 divide-y divide-[#6E6E73]">
                                                <div class="py-1">
                                                    <a href="{{ route('calendar.show', $record->id_calendar) }}" class="block px-4 py-2 text-xs text-[#F0F1F2] hover:bg-[#5A738E]/30 text-left">
                                                        Ver Detalles
                                                    </a>
                                                </div>
                                                <div class="py-1">
                                                    <a href="{{ route('calendar.edit', $record->id_calendar) }}" class="block px-4 py-2 text-xs text-[#F0F1F2] hover:bg-[#5A738E]/30 text-left">
                                                        Editar
                                                    </a>
                                                </div>
                                                <div class="py-1">
                                                    <form action="{{ route('calendar.destroy', $record->id_calendar) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este evento?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full text-left px-4 py-2 text-xs text-red-400 hover:bg-red-950/40">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="py-8 text-center text-[#BFC0C0] text-sm">
                                        No se encontraron publicaciones registradas con esos criterios.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    <script>
        function navigateToDetail(event, url) {
            window.location.href = url;
        }

        function toggleDropdown(event, menuId) {
            event.stopPropagation();
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu.id !== menuId) {
                    menu.classList.add('hidden');
                }
            });
            const menu = document.getElementById(menuId);
            menu.classList.toggle('hidden');
        }

        window.addEventListener('click', function(e) {
            if (!e.target.closest('button')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        });
    </script>
@endpush