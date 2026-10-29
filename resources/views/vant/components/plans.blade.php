<section id="plans" class="w-full bg-[#E5E5E7] py-16 px-6 md:px-16 text-[#121214] font-sans overflow-hidden select-none">
    <style>
        /* Tipografías corporativas VANT */
        .font-condensed {
            font-family: 'Oswald', sans-serif;
        }
        
        /* Texto vertical "AHORA" */
        .vertical-text {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
        }

        /* Suavidad de transiciones entre selecciones y hover */
        .plan-card {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
                        box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
                        filter 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        border-color 0.3s ease;
            will-change: transform, filter, box-shadow;
        }

        /* Estilo cuando una tarjeta está inactiva/opacada por hover en otra */
        .plan-card.dimmed {
            filter: opacity(0.65) grayscale(20%);
            transform: scale(0.96);
        }

        /* Tarjeta seleccionada activamente */
        .plan-card.selected {
            border: 3px solid #000000 !important;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.25);
        }
    </style>

    <div class="max-w-7xl mx-auto">
        <!-- TÍTULO PRINCIPAL -->
        <div class="mb-12 md:mb-16">
            <h2 class="text-3xl md:text-5xl font-black font-condensed tracking-tight uppercase text-black">
                ELIJE YA TU PLAN!
            </h2>
        </div>

        <!-- CONTENEDOR DE TARJETAS DE PLANES -->
        <div id="plans-container" class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8 items-center justify-center">
            
            <!-- 1. PLAN [ PRO ] -->
            <div data-plan="pro" 
                 class="plan-card relative bg-[#636366] text-black rounded-[28px] p-6 md:p-8 flex flex-col justify-between h-auto lg:min-h-[580px] shadow-lg border-2 border-transparent cursor-pointer">
                
                <div>
                    <!-- ENCABEZADO PLAN -->
                    <div class="text-center mb-6">
                        <h3 class="text-2xl md:text-3xl font-black font-condensed tracking-wider text-white">
                            [ PRO ]
                        </h3>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-300">PLAN</p>
                    </div>

                    <!-- DESCRIPCIÓN PRINCIPAL -->
                    <div class="mb-6 space-y-3 text-xs md:text-sm font-semibold text-gray-100">
                        <p class="font-bold text-sm md:text-base leading-tight text-white">
                            5 publicaciones semanales <br>
                            <span class="text-[11px] font-normal text-gray-300">(20 publicaciones/mes de alto impacto visual)</span>
                        </p>
                        <ul class="space-y-1 pl-2 text-gray-200">
                            <li>• 2x Reels de Alta Producción</li>
                            <li>• 2x Carruseles Estratégicos</li>
                            <li>• 1x Post Estático / Imagen Editorial</li>
                        </ul>
                    </div>

                    <!-- BONUS -->
                    <div class="border-t border-gray-500/40 pt-4">
                        <h4 class="text-base font-black font-condensed tracking-wide text-white mb-1">
                            BONUS
                        </h4>
                        <p class="text-xs font-bold text-white mb-2">+ 5 Stories diarias GRATIS</p>
                        <p class="text-[11px] text-gray-300 leading-tight">
                            Dinámicas interactivas + organización estratégica de Historias Destacadas (Servicios, Precios/FAQ, Testimonios y Contacto)
                        </p>
                    </div>
                </div>

                <!-- SECCIÓN DE PRECIO Y MÉTODOS DE PAGO (INFERIOR) -->
                <div class="mt-8 pt-4 relative flex justify-between items-end">
                    <!-- PRECIOS Y MÉTODOS -->
                    <div class="space-y-1">
                        <div class="flex items-baseline gap-2">
                            <span class="text-red-500 line-through text-lg md:text-xl font-bold font-condensed">$399<span class="text-xs">/mes</span></span>
                            <span class="text-xs font-black uppercase text-gray-300">ANTES</span>
                        </div>
                        <div class="flex items-baseline gap-1">
                            <span class="text-3xl md:text-4xl font-black font-condensed text-white">$350</span>
                            <span class="text-xs font-bold text-gray-200">/mes</span>
                        </div>
                        <div class="text-[9px] font-bold tracking-widest uppercase text-gray-300 leading-tight pt-1">
                            <p>BINANCE</p>
                            <p>PAGOMOVIL</p>
                            <p>EFECTIVO</p>
                        </div>
                    </div>

                    <!-- TEXTO VERTICAL DE IMPACTO -->
                    <div class="vertical-text text-2xl md:text-3xl font-black font-condensed tracking-widest text-white/90 pb-2">
                        AHORA
                    </div>
                </div>
            </div>

            <!-- 2. PLAN [ START ] (DESTACADO CENTRAL) -->
            <div data-plan="start" 
                 class="plan-card relative bg-[#C7C7CC] text-black rounded-[28px] p-6 md:p-8 flex flex-col justify-between h-auto lg:min-h-[640px] shadow-2xl border-2 border-transparent cursor-pointer lg:-translate-y-2">
                
                <div>
                    <!-- ENCABEZADO PLAN -->
                    <div class="text-center mb-6">
                        <h3 class="text-3xl md:text-4xl font-black font-condensed tracking-wider text-black">
                            [ START ]
                        </h3>
                        <p class="text-xs font-extrabold uppercase tracking-widest text-gray-700">PLAN</p>
                    </div>

                    <!-- DESCRIPCIÓN PRINCIPAL -->
                    <div class="mb-6 space-y-3 text-xs md:text-sm font-semibold text-gray-800">
                        <p class="font-bold text-base md:text-lg leading-tight text-black">
                            3 publicaciones semanales <br>
                            <span class="text-[11px] font-normal text-gray-700">(12 publicaciones/mes enfocadas en Alcance, Interacción y Conversión B2B/Local)</span>
                        </p>
                        <ul class="space-y-1 pl-2 text-gray-900 font-medium">
                            <li>• 1x Reel / TikTok / Video Vertical</li>
                            <li>• 1x Carrusel Informativo</li>
                            <li>• 1x Post Estático / Imagen Editorial</li>
                        </ul>
                    </div>

                    <!-- BONUS CON ACENTO AZUL -->
                    <div class="border-t border-gray-400/50 pt-4">
                        <h4 class="text-lg font-black font-condensed tracking-wide text-[#5A738E] mb-1">
                            BONUS
                        </h4>
                        <p class="text-xs md:text-sm font-bold text-black mb-2">+ 3 Stories diarias GRATIS</p>
                        <p class="text-[11px] text-gray-800 leading-tight font-medium">
                            Diseñadas para activación de comunidad (encuestas, preguntas abiertas, ofertas relámpago y CTAs directos al DM)
                        </p>
                    </div>
                </div>

                <!-- SECCIÓN DE PRECIO Y MÉTODOS DE PAGO -->
                <div class="mt-8 pt-4 relative flex justify-between items-end">
                    <div class="space-y-1">
                        <div class="flex items-baseline gap-2">
                            <span class="text-red-600 line-through text-xl md:text-2xl font-bold font-condensed">$239<span class="text-xs">/mes</span></span>
                            <span class="text-xs font-black uppercase text-gray-800">ANTES</span>
                        </div>
                        <div class="flex items-baseline gap-1">
                            <span class="text-4xl md:text-5xl font-black font-condensed text-black">$180</span>
                            <span class="text-xs font-bold text-gray-800">/mes</span>
                        </div>
                        <div class="text-[9px] font-bold tracking-widest uppercase text-gray-700 leading-tight pt-1">
                            <p>BINANCE</p>
                            <p>PAGOMOVIL</p>
                            <p>EFECTIVO</p>
                        </div>
                    </div>

                    <!-- TEXTO VERTICAL EN AZUL ACENTO -->
                    <div class="vertical-text text-3xl md:text-4xl font-black font-condensed tracking-widest text-[#5A738E] pb-2">
                        AHORA
                    </div>
                </div>
            </div>

            <!-- 3. PLAN [ PREMIUM ] -->
            <div data-plan="premium" 
                 class="plan-card relative bg-[#636366] text-black rounded-[28px] p-6 md:p-8 flex flex-col justify-between h-auto lg:min-h-[580px] shadow-lg border-2 border-transparent cursor-pointer">
                
                <div>
                    <!-- ENCABEZADO PLAN -->
                    <div class="text-center mb-6">
                        <h3 class="text-2xl md:text-3xl font-black font-condensed tracking-wider text-white">
                            [ PREMIUM ]
                        </h3>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-300">PLAN</p>
                    </div>

                    <!-- DESCRIPCIÓN PRINCIPAL -->
                    <div class="mb-6 space-y-3 text-xs md:text-sm font-semibold text-gray-100">
                        <p class="font-bold text-sm md:text-base leading-tight text-white uppercase tracking-wide">
                            PUBLICACION DIARIA <br>
                            <span class="text-[11px] font-normal text-gray-300 capitalize">(6 a 7 publicaciones semanales / +26 piezas al mes)</span>
                        </p>
                        <ul class="space-y-1 pl-2 text-gray-200">
                            <li>• 3x Reels de Alta Producción</li>
                            <li>• 2x Carruseles Avanzados de Venta</li>
                            <li>• 2x Posts Estáticos / Fotografía de Autor</li>
                        </ul>
                    </div>

                    <!-- BONUS -->
                    <div class="border-t border-gray-500/40 pt-4">
                        <h4 class="text-base font-black font-condensed tracking-wide text-white mb-1">
                            BONUS
                        </h4>
                        <p class="text-xs font-bold text-white mb-1">+ Stories ilimitadas GRATIS</p>
                        <p class="text-xs font-bold text-white mb-2">+ Cobertura de Eventos/Lanzamientos</p>
                        <p class="text-[11px] text-gray-300 leading-tight">
                            Cobertura en tiempo real de eventos de la marca, lanzamientos o promociones especiales directamente en historias sin costo adicional.
                        </p>
                    </div>
                </div>

                <!-- SECCIÓN DE PRECIO Y MÉTODOS DE PAGO -->
                <div class="mt-8 pt-4 relative flex justify-between items-end">
                    <div class="space-y-1">
                        <div class="flex items-baseline gap-2">
                            <span class="text-red-500 line-through text-lg md:text-xl font-bold font-condensed">$680<span class="text-xs">/mes</span></span>
                            <span class="text-xs font-black uppercase text-gray-300">ANTES</span>
                        </div>
                        <div class="flex items-baseline gap-1">
                            <span class="text-3xl md:text-4xl font-black font-condensed text-white">$599</span>
                            <span class="text-xs font-bold text-gray-200">/mes</span>
                        </div>
                        <div class="text-[9px] font-bold tracking-widest uppercase text-gray-300 leading-tight pt-1">
                            <p>BINANCE</p>
                            <p>PAGOMOVIL</p>
                            <p>EFECTIVO</p>
                        </div>
                    </div>

                    <div class="vertical-text text-2xl md:text-3xl font-black font-condensed tracking-widest text-white/90 pb-2">
                        AHORA
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SCRIPT JS INTERACTIVO PARA EFECTOS HOVER Y SELECCIÓN -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const planCards = document.querySelectorAll('.plan-card');
        let activeSelectedPlan = null;

        planCards.forEach(card => {
            // Efecto Hover: Agranda la tarjeta enfocada y atenúa ligeramente las hermanas
            card.addEventListener('mouseenter', function () {
                planCards.forEach(c => {
                    if (c !== card) {
                        c.classList.add('dimmed');
                    } else {
                        c.style.transform = card.dataset.plan === 'start' && window.innerWidth >= 1024 
                            ? 'scale(1.05) translateY(-8px)' 
                            : 'scale(1.04)';
                    }
                });
            });

            // Al salir del hover
            card.addEventListener('mouseleave', function () {
                planCards.forEach(c => {
                    c.classList.remove('dimmed');
                    if (!c.classList.contains('selected')) {
                        c.style.transform = '';
                    }
                });
            });

            // Clic para Selección
            card.addEventListener('click', function () {
                planCards.forEach(c => c.classList.remove('selected'));
                card.classList.add('selected');
                activeSelectedPlan = card.dataset.plan;

                // Si hay un chat de cotización o controlador, se puede enviar el evento
                console.log("Plan VANT Seleccionado:", activeSelectedPlan.toUpperCase());
            });
        });
    });
</script>