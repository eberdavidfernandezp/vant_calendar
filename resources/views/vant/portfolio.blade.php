<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VANT | VENEZUELA — Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Outfit', sans-serif; background-color: #1C1C1E; color: #F0F1F2; } </style>
</head>
<body class="min-h-screen flex flex-col justify-between p-6 md:p-12">
    <header class="flex justify-between items-center border-b border-[#6E6E73]/30 pb-6">
        <h1 class="text-xl font-bold tracking-wider">VANT | VENEZUELA</h1>
        <a href="{{ route('vant.home') }}" class="flex items-center">
    <x-application-logo class="w-24 h-auto text-[#F0F1F2]" />
</a>
        <a href="{{ route('vant.home') }}" class="text-xs text-[#5A738E] hover:underline">[VOLVER AL INICIO]</a>
    </header>

    <main class="max-w-4xl mx-auto py-12">
        <span class="text-xs font-mono bg-[#2C2C2E] border border-[#6E6E73]/40 px-3 py-1 rounded text-[#5A738E]">VITRINA DE ARQUITECTURA DIGITAL</span>
        <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mt-6 mb-8">Sistemas Ejecutados</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-[#2C2C2E]/40 border border-[#6E6E73]/40 p-6 rounded-xl">
                <p class="text-xs text-[#5A738E] font-mono mb-2">SYS_WEB // ALTO RENDIMIENTO</p>
                <h3 class="text-xl font-bold mb-2">Plataformas Corporativas</h3>
                <p class="text-sm text-[#BFC0C0]">Desarrollo a medida con optimización de carga extrema, arquitectura limpia y flujos de conversión directos.</p>
            </div>
            <div class="bg-[#2C2C2E]/40 border border-[#6E6E73]/40 p-6 rounded-xl">
                <p class="text-xs text-[#5A738E] font-mono mb-2">SYS_VISUAL // IDENTIDAD</p>
                <h3 class="text-xl font-bold mb-2">Sistemas de Marca Gélidos</h3>
                <p class="text-sm text-[#BFC0C0]">Diseño de identidades gráficas intencionales basadas en psicología conductual y brutalismo minimalista.</p>
            </div>
        </div>
    </main>

    <footer class="text-center text-xs text-[#6E6E73] border-t border-[#6E6E73]/30 pt-4">
        <p>&copy; {{ date('Y') }} VANT | VENEZUELA.</p>
    </footer>
</body>
</html>