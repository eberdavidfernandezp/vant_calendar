<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>VANT | VENEZUELA</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alata&family=League+Spartan:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('images/vant_logo.png') }}" type="image/x-icon">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Outfit', 'League Spartan', 'Alata', sans-serif;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-100 text-gray-900 m-0 min-h-screen flex flex-col justify-between selection:bg-[#5A738E] selection:text-white">
        
        <!-- Barra de Navegación con Menú Desplegable Lateral -->
        <nav class="bg-white border-b border-gray-200 relative z-50" x-data="{ mobileMenuOpen: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    
                    <!-- Logo / Marca -->
                    <div class="shrink-0 flex items-center">
                        <a href="/" class="flex items-center gap-2">
                            <span class="font-bold text-lg text-gray-800 tracking-wider">VANT CALENDAR</span>
                        </a>
                    </div>

                    <!-- Enlaces en Pantallas Grandes (Desktop) -->
                    <div class="hidden sm:flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                            {{ __('Log in') }}
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-[#5A738E] hover:bg-[#5A738E]/80 text-[#F0F1F2] text-xs font-semibold py-2 px-3 rounded-lg shadow transition duration-200">
                                {{ __('Register') }}
                            </a>
                        @endif
                    </div>

                    <!-- Botón Hamburguesa (Móvil / Pantallas Pequeñas) -->
                    <div class="flex items-center sm:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Fondo oscuro difuminado al abrir el menú móvil -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition-opacity ease-linear duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="mobileMenuOpen = false" 
                 class="fixed inset-0 bg-black/40 sm:hidden z-40">
            </div>

            <!-- Menú Desplegable Lateral de Derecha a Izquierda -->
            <div x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="translate-x-full"
                 class="fixed top-0 right-0 h-full w-72 bg-white shadow-2xl z-50 flex flex-col sm:hidden p-6">
                
                <!-- Cabecera del Menú Lateral -->
                <div class="flex items-center justify-between pb-6 border-b border-gray-200">
                    <span class="font-bold text-gray-800 tracking-wider">MENÚ</span>
                    <button @click="mobileMenuOpen = false" class="p-2 rounded-md text-gray-500 hover:bg-gray-100 transition">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Opciones (Login y Registrar) -->
                <div class="flex flex-col space-y-4 mt-6">
                    <a href="{{ route('login') }}" @click="mobileMenuOpen = false" class="text-base font-medium text-gray-700 hover:text-[#5A738E] py-2 transition">
                        {{ __('Log in') }}
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" @click="mobileMenuOpen = false" class="bg-[#5A738E] hover:bg-[#5A738E]/80 text-[#F0F1F2] text-center font-semibold py-2.5 px-4 rounded-lg shadow transition duration-200">
                            {{ __('Register') }}
                        </a>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Contenedor general con fondo totalmente claro y distribución flexible -->
        <div class="min-h-screen flex flex-col justify-between bg-gray-100 flex-grow">
            
            <!-- Espaciador superior -->
            <div></div>

            <!-- Bloque Central: Contenido y Formulario -->
            <div class="flex flex-col items-center justify-center px-4 py-4">
                <div class="w-full sm:max-w-md px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>

            <!-- Footer Copyright -->
            <footer class="bg-white border-t border-gray-200 py-4 text-center text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} VANT CALENDAR. by Eber Fernandez. Todos los derechos reservados.</p>
            </footer>

        </div>
    </body>
</html>