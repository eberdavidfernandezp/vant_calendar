<!-- NAVEGACIÓN SUPERIOR CON CAMBIO DE CONTRASTE AUTOMÁTICO -->
<header id="vant-main-header" class="fixed top-0 left-0 w-full z-40 px-6 md:px-16 py-8 flex justify-end items-center transition-transform duration-300 pointer-events-auto" style="background-color: transparent !important;">
    
    <!-- NAVEGACIÓN HORIZONTAL DE ESCRITORIO -->
    <div class="desktop-nav">
        <nav id="desktopNavMenu" class="flex items-center space-x-6 md:space-x-10 text-xs md:text-sm font-extrabold tracking-wider uppercase text-black transition-colors duration-300">
            <a href="{{ route('vant.home') }}" class="vant-nav-item border-b-2 border-current pb-0.5 tracking-widest font-black transition-colors duration-300">HOME</a>
            <a href="#" class="vant-nav-item hover:opacity-70 transition opacity-80">PORTFOLIO</a>
            <a href="{{ route('calendar.index') }}" class="vant-nav-item hover:opacity-70 transition opacity-80 vantcalendar">VANT CALENDAR</a>
            <!-- Agregada la clase nav-theme-light por defecto aquí -->
            <a href="{{ route('vant.home') }}#plans" id="vantPlansBtn" class="vant-nav-btn border-2 px-4 py-1.5 rounded-full font-bold transition-all tracking-widest nav-theme-light">
                [ PLANS ]
            </a>
        </nav>
    </div>

</header>

<!-- MENÚ MÓVIL -->
<div id="vantMobileMenu" 
     style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: #1C1C1E; z-index: 99999; transform: translateX(100%); transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1); display: flex; flex-direction: column; justify-content: space-between; padding: 2rem; pointer-events: auto;">
    <div>
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid rgba(110, 110, 115, 0.3); padding-bottom: 1rem; margin-bottom: 2.5rem;">
            <img class="logoMobile" src="{{ asset('images/vant_logo_white.svg') }}" alt="">
            <button type="button" id="vantCloseBtn" style="background: transparent; border: none; color: #BFC0C0; cursor: pointer; padding: 0.5rem;" aria-label="Cerrar Menú">
                <svg style="width: 2rem; height: 2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <nav style="display: flex; flex-direction: column; gap: 2rem; font-size: 1rem; font-weight: bold; letter-spacing: 0.1em; text-transform: uppercase;">
            <a href="{{ route('vant.home') }}" class="vant-nav-link" style="color: #F0F1F2; text-decoration: none;">HOME</a>
            <a href="#" class="vant-nav-link" style="color: #BFC0C0; text-decoration: none;">PORTFOLIO</a>
            <a href="{{ route('calendar.index') }}" class="vant-nav-link" style="color: #5A738E; text-decoration: none;">VANT CALENDAR</a>
        </nav>
    </div>
    <div style="padding-top: 1.5rem; border-top: 1px solid rgba(110, 110, 115, 0.3); padding-bottom: 1rem;">
        <a href="{{ route('vant.home') }}#plans" class="vant-nav-link" style="display: block; text-align: center; width: 100%; padding: 1rem; border-radius: 9999px; border: 2px solid #F0F1F2; color: #1C1C1E; background: #F0F1F2; font-weight: bold; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; text-decoration: none;">
            [ PLANS ]
        </a>
    </div>
</div>

<!-- SCRIPT DE CONTROL DE CONTRASTE Y SCROLL -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menu = document.getElementById('vantMobileMenu');
        const openBtn = document.getElementById('vantOpenMenuBtn');
        const closeBtn = document.getElementById('vantCloseBtn');
        const navLinks = document.querySelectorAll('.vant-nav-link');
        const header = document.getElementById('vant-main-header');
        const desktopNavMenu = document.getElementById('desktopNavMenu');
        const plansBtn = document.getElementById('vantPlansBtn');

        let startX = 0;
        let isDragging = false;
        let lastScrollTop = 0;
        let scrollTimer = null;

        // 1. Control de Scroll Inteligente (Ocultar/Mostrar barra)
        window.addEventListener('scroll', function () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            clearTimeout(scrollTimer);

            if (scrollTop > lastScrollTop && scrollTop > 300) {
                header.style.transform = "translateY(-100%)";
            } else {
                header.style.transform = "translateY(0)";
                if (scrollTop > 100) {
                    scrollTimer = setTimeout(() => {
                        header.style.transform = "translateY(-100%)";
                    }, 5000);
                }
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;

            // 2. Detección dinámica de contraste
            const darkSections = document.querySelectorAll('.bg-vant-gradient, .bg-dark, section[data-theme="dark"]');
            let isOverDark = false;

            const headerRect = header.getBoundingClientRect();
            const headerMiddleY = headerRect.top + (headerRect.height / 2);

            darkSections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top <= headerMiddleY && rect.bottom >= headerMiddleY) {
                    isOverDark = true; 
                }
            });

            // Aplicar clases de estado
            if (scrollTop > 450 || isOverDark) {
                desktopNavMenu.classList.remove('text-black');
                desktopNavMenu.classList.add('text-white');
                plansBtn.classList.remove('nav-theme-light');
                plansBtn.classList.add('nav-theme-dark');
            } else {
                desktopNavMenu.classList.remove('text-white');
                desktopNavMenu.classList.add('text-black');
                plansBtn.classList.remove('nav-theme-dark');
                plansBtn.classList.add('nav-theme-light');
            }
        });

        // Funciones del menú móvil lateral con gestos
        function openMenu() {
            menu.style.transition = 'transform 0.3s cubic-bezier(0.16, 1, 0.3, 1)';
            menu.style.transform = 'translateX(0)';
        }

        function closeMenu() {
            menu.style.transition = 'transform 0.3s cubic-bezier(0.16, 1, 0.3, 1)';
            menu.style.transform = 'translateX(100%)';
        }

        if (openBtn) openBtn.addEventListener('click', (e) => { e.preventDefault(); openMenu(); });
        if (closeBtn) closeBtn.addEventListener('click', (e) => { e.preventDefault(); closeMenu(); });
        navLinks.forEach(link => link.addEventListener('click', () => closeMenu()));

        // Gestos táctiles
        window.addEventListener('touchstart', (e) => {
            const touchX = e.touches[0].clientX;
            const screenWidth = window.innerWidth;
            const menuTransform = window.getComputedStyle(menu).transform;
            const isOpen = menuTransform !== 'none' && menu.style.transform === 'translateX(0px)';

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

        window.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            const touchX = e.touches[0].clientX;
            const screenWidth = window.innerWidth;
            const deltaX = touchX - startX;
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

        window.addEventListener('touchend', () => {
            if (!isDragging) return;
            isDragging = false;
            const matrix = window.getComputedStyle(menu).transform;
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

<style>
    .vantcalendar{
        color: #5A738E;
    }

    /* ESTILOS DE CONTRASTE DINÁMICO PARA EL BOTÓN PLANS */
    .nav-theme-light {
        border-color: #000000 !important;
        color: #000000 !important;
        background-color: transparent !important;
    }
    .nav-theme-light:hover {
        background-color: #000000 !important;
        color: #ffffff !important;
    }

    .nav-theme-dark {
        border-color: #FFFFFF !important;
        color: #FFFFFF !important;
        background-color: transparent !important;
    }
    .nav-theme-dark:hover {
        background-color: #FFFFFF !important;
        color: #000000 !important;
    }
    .logoMobile{
        width: 8rem;
    }

    @media (max-width: 768px) {
        .desktop-nav {
            display: none !important;
        }
        .mobile-toggle-btn {
            display: flex !important;
        }
    }
    @media (min-width: 769px) {
        .mobile-toggle-btn {
            display: none !important;
        }
    }
</style>