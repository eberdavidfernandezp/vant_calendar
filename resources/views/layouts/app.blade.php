<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      x-data="{ 
          darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) 
      }"
      x-init="$watch('darkMode', val => { localStorage.setItem('theme', val ? 'dark' : 'light'); });"
      :class="{ 'dark': darkMode }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Vant Calendar')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alata&family=League+Spartan:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link class="" rel="icon" type="image/svg+xml" href="{{ asset('images/vant_logo_white.svg') }}">

        <!-- Scripts & Styles (Vite / Tailwind) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Outfit', 'League Spartan', 'Alata', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-100 dark:bg-[#121212] text-gray-900 dark:text-[#F0F1F2] antialiased min-h-screen flex flex-col selection:bg-[#5A738E] selection:text-white transition-colors duration-300">
        
        <!-- Barra de Navegación con Botón de Cambio de Tema -->
        <nav class="bg-white dark:bg-[#1C1C1E] border-b border-gray-200 dark:border-[#6E6E73]/30 transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    
                    <!-- Navegación de Autenticación de Breeze -->
                    <div class="flex items-center space-x-8">
                        @include('layouts.navigation')
                    </div>

                    <!-- Controles de la derecha: Botón de Tema -->
                    <div class="flex items-center space-x-4">
                        <!-- BOTÓN CAMBIAR DE TEMA (CLARO / OSCURO) -->
                        <button @click="darkMode = !darkMode" 
                                class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition focus:outline-none"
                                title="Cambiar tema">
                            <!-- Ícono de Sol (Modo Oscuro activo) -->
                            <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <!-- Ícono de Luna (Modo Claro activo) -->
                            <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>
        </nav>

        <!-- Contenido Principal Dinámico -->
        <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>

        <!-- Footer Copyright -->
        <footer class="bg-white dark:bg-[#1C1C1E] border-t border-gray-200 dark:border-[#6E6E73]/30 py-6 mt-12 text-center text-xs text-gray-500 dark:text-[#BFC0C0] transition-colors duration-300">
            <p>&copy; {{ date('Y') }} VANT CALENDAR. by Eber Fernandez. Todos los derechos reservados.</p>
        </footer>

        @stack('scripts')
    </body>
</html>