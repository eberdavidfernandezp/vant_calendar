<header class="fixed top-0 left-0 w-full z-40 px-6 md:px-12 py-4 flex justify-between items-center border-b border-[#6E6E73]/20 shadow-xl main-header-vant" style="background-color: #1C1C1E !important;">
    
    <!-- LOGO PRINCIPAL (ESCRITORIO) -->
    <a href="{{ route('vant.home') }}" class="flex items-center group py-1">
        <img src="{{ asset('images/vant_logo_white.png') }}" alt="VANT | VENEZUELA" class="h-8 md:h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
    </a>

    <!-- NAVEGACIÓN HORIZONTAL DE ESCRITORIO -->
    <nav class="desktop-nav flex items-center text-xs font-bold tracking-widest uppercase">
        <a href="#proyectos" class="relative text-[#BFC0C0] hover:text-[#5A738E] transition-colors duration-300 py-2 group whitespace-nowrap" style="margin-right: 2.2rem;">
            Sistemas
            <span class="absolute bottom-0 left-0 w-0 h-[2px] bg-[#5A738E] transition-all duration-300 group-hover:w-full"></span>
        </a>
        <a href="#about" class="relative text-[#BFC0C0] hover:text-[#5A738E] transition-colors duration-300 py-2 group whitespace-nowrap" style="margin-right: 2.2rem;">
            Quiénes Somos
            <span class="absolute bottom-0 left-0 w-0 h-[2px] bg-[#5A738E] transition-all duration-300 group-hover:w-full"></span>
        </a>
        <a href="#estrategias" class="relative text-[#BFC0C0] hover:text-[#5A738E] transition-colors duration-300 py-2 group whitespace-nowrap" style="margin-right: 2.2rem;">
            Estrategias
            <span class="absolute bottom-0 left-0 w-0 h-[2px] bg-[#5A738E] transition-all duration-300 group-hover:w-full"></span>
        </a>
        <a href="{{ route('vant.portfolio') }}" class="relative text-[#BFC0C0] hover:text-[#5A738E] transition-colors duration-300 py-2 group whitespace-nowrap" style="margin-right: 2.2rem;">
            Portfolio
            <span class="absolute bottom-0 left-0 w-0 h-[2px] bg-[#5A738E] transition-all duration-300 group-hover:w-full"></span>
        </a>
        <a href="/" class="relative text-[#5A738E] hover:text-[#F0F1F2] transition-colors duration-300 py-2 group whitespace-nowrap" style="margin-right: 2.5rem;">
            VANT Calendar
            <span class="absolute bottom-0 left-0 w-0 h-[2px] bg-[#F0F1F2] transition-all duration-300 group-hover:w-full"></span>
        </a>
        <a href="{{ route('vant.chat') }}" class="px-5 py-2.5 rounded-full border border-[#5A738E] text-[#5A738E] hover:bg-[#5A738E] hover:text-[#1C1C1E] transition-all duration-300 shadow-sm whitespace-nowrap">
            [ Cotizar ]
        </a>
    </nav>
</header>

<!-- MENÚ MÓVIL GESTIONADO POR JS PURO (AISLADO, SÓLIDO Y 100% INTERACTIVO) -->
<div id="vantMobileMenu" 
     style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: #1C1C1E; z-index: 99999; transform: translateX(100%); transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1); display: flex; flex-direction: column; justify-content: space-between; padding: 2rem; pointer-events: auto;">
    
    <div>
        <!-- ENCABEZADO DENTRO DEL MENÚ MÓVIL CON BOTÓN DE CIERRE -->
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid rgba(110, 110, 115, 0.3); padding-bottom: 1rem; margin-bottom: 2.5rem;">
            <img src="{{ asset('images/vant_logo_white.png') }}" alt="VANT | VENEZUELA" style="height: 2rem; width: auto; object-fit: contain;">
            <button type="button" id="vantCloseBtn" style="background: transparent; border: none; color: #BFC0C0; cursor: pointer; padding: 0.5rem;" aria-label="Cerrar Menú">
                <svg style="width: 2rem; height: 2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- LISTA DE OPCIONES MÓVIL -->
        <nav style="display: flex; flex-direction: column; gap: 2rem; font-size: 1rem; font-weight: bold; letter-spacing: 0.1em; text-transform: uppercase;">
            <a href="{{ route('vant.portfolio') }}" class="vant-nav-link" style="color: #BFC0C0; text-decoration: none;">Portfolio</a>
            <a href="/" class="vant-nav-link" style="color: #5A738E; text-decoration: none;">VANT Calendar</a>
            <a href="#proyectos" class="vant-nav-link" style="color: #BFC0C0; text-decoration: none;">Sistemas</a>
            <a href="#about" class="vant-nav-link" style="color: #BFC0C0; text-decoration: none;">Quiénes Somos</a>
            <a href="#estrategias" class="vant-nav-link" style="color: #BFC0C0; text-decoration: none;">Estrategias</a>
        </nav>
    </div>

    <!-- BOTÓN COTIZAR INFERIOR -->
    <div style="padding-top: 1.5rem; border-top: 1px solid rgba(110, 110, 115, 0.3); padding-bottom: 1rem;">
        <a href="{{ route('vant.chat') }}" class="vant-nav-link" style="display: block; text-align: center; width: 100%; padding: 1rem; border-radius: 9999px; border: 1px solid #5A738E; color: #5A738E; background: transparent; font-weight: bold; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; text-decoration: none;">
            [ Cotizar ]
        </a>
    </div>
</div>

<!-- SCRIPT JS NATIVO PARA GESTIÓN DE GESTOS Y CLICS -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menu = document.getElementById('vantMobileMenu');
        const closeBtn = document.getElementById('vantCloseBtn');
        const navLinks = document.querySelectorAll('.vant-nav-link');

        let startX = 0;
        let currentX = 0;
        let isDragging = false;

        function openMenu() {
            menu.style.transition = 'transform 0.3s cubic-bezier(0.16, 1, 0.3, 1)';
            menu.style.transform = 'translateX(0)';
        }

        function closeMenu() {
            menu.style.transition = 'transform 0.3s cubic-bezier(0.16, 1, 0.3, 1)';
            menu.style.transform = 'translateX(100%)';
        }

        // Evento botón cerrar
        if (closeBtn) {
            closeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                closeMenu();
            });
        }

        // Cerrar al hacer clic en cualquier enlace
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                closeMenu();
            });
        });

        // Gestos táctiles nativos en tiempo real
        window.addEventListener('touchstart', function(e) {
            const touchX = e.touches[0].clientX;
            const screenWidth = window.innerWidth;
            const menuTransform = window.getComputedStyle(menu).transform;
            const isOpen = menuTransform !== 'none' && !menuTransform.includes('matrix(1, 0, 0, 1, 440') && menu.style.transform === 'translateX(0px)';

            if (!isOpen && touchX > screenWidth - 60) {
                isDragging = true;
                startX = touchX;
                menu.style.transition = 'none';
            } else if (isOpen) {
                isDragging = true;
                startX = touchX;
                menu.style.transition = 'none';
            }
        });

        window.addEventListener('touchmove', function(e) {
            if (!isDragging) return;
            const touchX = e.touches[0].clientX;
            const screenWidth = window.innerWidth;
            const deltaX = touchX - startX;

            const menuTransform = window.getComputedStyle(menu).transform;
            const isOpen = menu.style.transform === 'translateX(0px)';

            if (!isOpen) {
                let progress = (deltaX / screenWidth) * 100;
                let translate = Math.min(100, Math.max(0, 100 + progress));
                menu.style.transform = `translateX(${translate}%)`;
            } else {
                let progress = (deltaX / screenWidth) * 100;
                let translate = Math.min(100, Math.max(0, progress));
                menu.style.transform = `translateX(${translate}%)`;
            }
        });

        window.addEventListener('touchend', function(e) {
            if (!isDragging) return;
            isDragging = false;

            const matrix = window.getComputedStyle(menu).transform;
            // Extraer translación X actual de la matriz CSS
            let currentTranslate = 100;
            if (matrix && matrix !== 'none') {
                const values = matrix.split(',')[4];
                currentTranslate = (parseFloat(values) / window.innerWidth) * 100;
            }

            if (currentTranslate < 70) {
                openMenu();
            } else {
                closeMenu();
            }
        });
    });
</script>

<!-- REGLA CSS DE CONTROL RESPONSIVE -->
<style>
    @media (max-width: 1024px) {
        .main-header-vant {
            background: transparent !important;
            border-bottom: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            height: 0 !important;
            overflow: hidden;
            pointer-events: none;
        }
        .desktop-nav {
            display: none !important;
        }
    }
</style>