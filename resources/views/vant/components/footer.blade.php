<style>
    .contactFood {
        height: 200rem;
        background-color: #E5E5E7;
    }

    .huella {
        display: none;
    }

    .finalContact {
        margin-bottom: 100rem;
    }

    .min-h-screen {
        min-height: 60vh;
    }

    @media (min-width: 1024px) {
        .huella {
            margin-top: 0;
            filter: opacity(100%);
            display: block;
        }
        .finalContact {
            margin-bottom: 0;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .contactFood {
            height: 200rem;
            background-color: #E5E5E7;
        }
    }
</style>
<section class="relative w-full min-h-screen flex items-center justify-center px-6 md:px-24 py-16 overflow-hidden contactFoot">

    <!-- CONTENEDOR PRINCIPAL DOS COLUMNAS -->
    <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

        <!-- COLUMNA IZQUIERDA: TEXTO MANIFIESTO Y CONTACTO -->
        <div class="flex flex-col space-y-8 z-10">
            <!-- CITA / MANIFIESTO -->
            <div class="cita">
                <h2 class="text-3xl md:text-5xl font-extrabold text-[#1C1C1E] tracking-tight uppercase leading-tight font-condensed">
                    “Crea tu identidad con nosotros, la imagen de tu marca siempre hablará por ti“
                </h2>
            </div>
            <!-- BLOQUE CONTÁCTANOS -->
            <div class="space-y-4 pt-4 finalContact">
                <div class="inline-block border-b-2 border-[#5A738E] pb-1">
                    <h3 class="text-xl md:text-2xl font-black text-[#1C1C1E] tracking-widest uppercase">
                        CONTACTANOS
                    </h3>
                </div>

                <div class="flex flex-col space-y-2 text-base md:text-lg font-bold text-[#1C1C1E] tracking-wider">
                    <!-- Instagram -->
                    <a href="https://instagram.com/vant_vzla" target="_blank" class="flex items-center space-x-3 hover:text-[#5A738E] transition-colors duration-300 w-fit group">
                        <svg class="w-6 h-6 text-[#1C1C1E] group-hover:text-[#5A738E] transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                        </svg>
                        <span>@vant_vzla</span>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/584120770039" target="_blank" class="flex items-center space-x-3 hover:text-[#5A738E] transition-colors duration-300 w-fit group">
                        <svg class="w-6 h-6 text-[#1C1C1E] group-hover:text-[#5A738E] transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                        </svg>
                        <span>+584120770039</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- COLUMNA DERECHA: HUELLA DIGITAL ESTÉTICA BRUTALISTA -->
        <div class="flex justify-center md:justify-end items-center z-10 huella">
            <div class="w-72 md:w-96 opacity-85 mix-blend-multiply transition-transform duration-500 hover:scale-105">
                <!-- Asegúrate de ubicar tu imagen de huella en public/images/fingerprint.png o ajusta la ruta -->
                <img src="{{ asset('images/huella.svg') }}" alt="VANT Huella Digital" class="w-full h-auto object-contain huella_svg">
            </div>
        </div>

    </div>

    <!-- ELEMENTO DECORATIVO DE FONDO (GRADIENTE SUTIL) -->
    <div class="absolute inset-0 bg-gradient-to-tr from-[#dedfe2] to-[#f4f4f5] pointer-events-none z-0"></div>
</section>