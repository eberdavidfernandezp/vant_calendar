<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VANT | VENEZUELA</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Oswald:wght@500;600;700&family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0d0e10;
            color: #121214;
            overflow-x: hidden;
        }

        .font-condensed {
            font-family: 'Oswald', sans-serif;
        }


    /* Regla exclusiva para PC (pantallas mayores a 1024px) */
    @media (min-width: 1024px) {
        .navBar{
            position: fixed;
            margin-top: 2rem;
        }
    }
    </style>
</head>
<body class="min-h-screen relative flex flex-col justify-between selection:bg-black selection:text-white">


    @include('vant.components.navbar')

    @include('vant.components.inicio')

    @include('vant.components.hero')

    @include('vant.components.plans')

    @include('vant.components.footer')
    <!-- PIE DE PÁGINA TRANSPARENTE -->
    <footer class="relative z-10 w-full px-6 md:px-16 py-4 text-right text-[10px] font-mono text-gray-400">
        <p>&copy; {{ date('Y') }} VANT | VENEZUELA. by Eber Fernandez. Todos los derechos reservados.</p>
    </footer>

</body>
</html>