<style>
    .bg-vant-gradient2 {
        background: linear-gradient(180deg, #0d0e10 0%, #52545b 60%, #b8b9be 75%, #e5e5e7 100%);
    }

    .space-y-6 {
        margin-left: 2rem;
        margin-right: 2rem;
    }

    .vant_logo_bg {
        margin-top: -25rem;
    }

    .btn-vant-action:hover {
        color: #B20000;
    }

    .description{
        color: #e5e5e7;
    }

    @media (min-width: 1024px) {
        .space-y-1> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.25rem
                    /* 4px */
                    * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.25rem
                    /* 4px */
                    * var(--tw-space-y-reverse));
        }

        .vant_logo_bg {
            margin-top: 0rem;
        }
    }
</style>

<section id="proyectos" style="scroll-margin-top: 100px; margin-top: 50px;" class="bg-vant-gradient2 relative px-6 md:px-24 py-16 flex-grow flex flex-col justify-center">
    <!-- TITULAR DE FONDO ENORME -->
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none overflow-hidden opacity-5 vant_logo_bg">
        <img src="{{ asset('images/vant_logo_white.svg') }}" alt="">
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">

        <div class="lg:col-span-5 space-y-6">
            <div>
                <h2 class="text-3xl md:text-5xl font-condensed font-bold text-[#F0F1F2] tracking-wide uppercase mt-2 leading-tight">
                    QUIENES <span class="text-[#5A738E]">SOMOS.</span>
                </h2>
                <span class="text-xs font-mono text-[#5A738E] tracking-widest uppercase">[No hacemos ruido. Construimos activos Digitales.]</span>
            </div>

            <div class="space-y-1">
                <p class="description">
                    En un mercado saturado de agencias que priorizan la decoración visual sobre la rentabilidad, en VANT operamos bajo una premisa matemática, arquitectónica y de ingeniería visual.
                    <br>
                    No diseñamos solo por estética ni creamos contenido para llenar un feed vacío: estructuramos sistemas digitales de alto rendimiento.
                    <br>
                    Creados y operados desde las montañas de Mérida para toda Venezuela y Latinoamérica, unimos el desarrollo web avanzado y la psicología de marcas para construir infraestructuras corporativas sólidas, capaces de facturar y resistir el paso del tiempo.
                </p>
            </div>
            <!-- <div class="space-y-1">
                <p class="text-xs font-mono text-[#6E6E73] uppercase tracking-wider">INVERSIÓN BASE DESDE</p>
                <p class="text-2xl md:text-3xl font-bold text-[#F0F1F2]">$500 <span class="text-xs text-[#BFC0C0] font-normal">USD / PROYECTO</span></p>
            </div> -->

            <div>
                <a href="{{ route('vant.chat') }}" class="btn-vant-action inline-block px-8 py-3 text-xs font-bold tracking-widest uppercase rounded-lg">
                    INICIAR AUDITORÍA / PROYECTO
                </a>
            </div>
        </div>

        <div class="lg:col-span-7 relative flex justify-center items-center">
            <div class="relative w-full max-w-xl">
                <div class="relative z-10 rounded-2xl overflow-hidden border border-[#6E6E73]/40 shadow-2xl vant-glass p-4">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80" alt="VANT Architecture" class="w-full h-72 md:h-96 object-cover rounded-xl grayscale hover:grayscale-0 transition duration-500">
                </div>
                <div class="absolute -inset-4 bg-[#5A738E]/15 blur-3xl rounded-full -z-10"></div>
            </div>
        </div>
    </div>
</section>