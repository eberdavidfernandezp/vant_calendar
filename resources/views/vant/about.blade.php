<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VANT | VENEZUELA — Quiénes Somos</title>
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

    <main class="max-w-3xl mx-auto py-12">
        <span class="text-xs font-mono bg-[#2C2C2E] border border-[#6E6E73]/40 px-3 py-1 rounded text-[#5A738E]">MANIFIESTO TÉCNICO</span>
        <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mt-6 mb-6">No hacemos ruido. Construimos activos digitales.</h2>
        <p class="text-[#BFC0C0] text-base md:text-lg leading-relaxed mb-6">
            En un mercado saturado de agencias que priorizan la decoración visual sobre la rentabilidad, en <strong>VANT</strong> operamos bajo una premisa matemática y arquitectónica.
        </p>
        <p class="text-[#BFC0C0] text-base md:text-lg leading-relaxed mb-8">
            Desde Mérida para toda Venezuela, unimos el desarrollo web de alto rendimiento y la psicología de marcas para crear infraestructuras que facturan y resisten el paso del tiempo.
        </p>
        <a href="{{ route('vant.chat') }}" class="inline-block bg-[#5A738E] text-white px-8 py-3 rounded font-bold hover:bg-[#5A738E]/80 transition">
            Iniciar Conversación / Cotizar
        </a>
    </main>

    <footer class="text-center text-xs text-[#6E6E73] border-t border-[#6E6E73]/30 pt-4">
        <p>&copy; {{ date('Y') }} VANT | VENEZUELA.</p>
    </footer>
</body>
</html>