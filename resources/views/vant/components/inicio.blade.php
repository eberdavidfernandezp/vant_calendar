<style>
            /* Fondo de degradado exacto de la maqueta original (Claro a oscuro) */
        .bg-vant-gradient {
            background: linear-gradient(180deg, #e5e5e7 0%, #b8b9be 40%, #52545b 75%, #0d0e10 100%);
        }

        /* Silueta de la imagen a la izquierda */
        .stairs-background {
            background-image: url('{{ asset("images/background.png") }}');
            background-size: cover;
            background-position: left center;
            mix-blend-mode: multiply;
            opacity: 0.35;
            filter: grayscale(100%) contrast(150%);
        }
        /* Estilos base (móviles y tablets) */
    .vant-pc-logo {
        width: 28rem;
        margin-left: auto;
        margin-right: auto;
    }
    .supText{
        margin-top: -4rem;
    }
    .supText_2{
        font-size: medium;
    }
    .inferiorText_2{
        font-size: medium;
    }
     /* Regla exclusiva para PC (pantallas mayores a 1024px) */
    @media (min-width: 1024px) {
        .vant-pc-logo {
            width: 40rem;           /* Ancho exclusivo para PC */
            transform: translateX(-50px); /* Ajuste manual horizontal en px */
            margin-top: -12rem;         /* Ajuste manual vertical */
        }
        .supText{
            margin-top: 2rem;
        }
        .inferiorText{
            margin-top: -15rem; 
        }
    }
</style>
<section class="relative w-full h-screen overflow-hidden bg-vant-gradient flex flex-col justify-between px-6 md:px-16 py-6">
<!-- CONTENIDO PRINCIPAL -->
 <div class="absolute inset-0 w-1/2 md:w-1/3 h-full stairs-background pointer-events-none z-0"></div>
 
    <main class="relative z-10 w-full px-6 md:px-16 my-auto py-12 flex flex-col justify-between">
        
        <!-- TEXTO SUPERIOR DERECHO (MANIFIESTO CORTANTE) -->
         <div class="supText">
        <div class="flex justify-end mb-12 md:mb-20">
            <div class="max-w-md text-right font-condensed text-black uppercase text-sm md:text-lg leading-tight font-bold tracking-wide">
                <p class="supText_2">NO CREAMOS CONTENIDO SIN PROPÓSITO.</p>
                <p class="supText_2">DISEÑAMOS ESTRUCTURAS DIGITALES Y ESTRATEGIAS DE MARCA PENSADAS PARA FACTURAR.</p>
            </div>
        </div>
    </div>

        <!-- LOGOTIPO Y MARCA CENTRAL (LOGO VANT + BARRA SUPERIOR) -->
        <div class="w-full flex flex-col items-center justify-center my-8">
            <div class="vant-title-container text-center">
                <!-- Barra superior sobre el logo -->
                <a href="{{ route('vant.home') }}" class="inline-block pt-3">
                    <img src="{{ asset('images/vant_logo.svg') }}" alt="VANT" class="vant-pc-logo h-auto object-contain">
                </a>
            </div>
        </div>

        <!-- TEXTO INFERIOR DERECHO (ORIGEN) -->
        <div class="flex justify-end mt-12 md:mt-24">
            <div class="inferiorText">
            <div class="text-right font-condensed text-white uppercase text-xs md:text-base font-bold tracking-wider space-y-1">
                <div class="inferiorText_2">
                    <p class="text-gray-200">HECHO EN VENEZUELA.</p>
                </div>
                <div class="inferiorText_2">
                <p class="text-gray-300">DISEÑADO PARA COMPETIR SIN FRONTERAS.</p>
                </div>
            </div>
        </div>
        </div>
    </main>
</section>