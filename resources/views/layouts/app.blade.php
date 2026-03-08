<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYBOLO.ID - Solusi IT Terpadu</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Domine:wght@400..700&family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --font-title: 'Plus Jakarta Sans', sans-serif;
            --font-body: 'Domine', serif;
            --brand-blue: #00AEEF;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        body {
            font-family: var(--font-body);
            background-color: #ffffff;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        nav,
        button,
        .font-title {
            font-family: var(--font-title);
        }

        .bg-brand-blue {
            background-color: var(--brand-blue);
        }

        .text-brand-blue {
            color: var(--brand-blue);
        }

        /* Navbar Logic */
        .nav-sticky-active {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.1);
            padding-top: 0.75rem !important;
            padding-bottom: 0.75rem !important;
        }

        .nav-sticky-active .nav-link {
            color: #1f2937 !important;
        }

        .nav-hidden {
            transform: translateY(-100%);
            opacity: 0;
        }

        /* Mobile Menu */
        #mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            width: 300px;
            height: 100vh;
            background: white;
            z-index: 100;
            padding: 2rem;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #menu-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 90;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s ease;
        }

        #menu-backdrop.active {
            opacity: 1;
            pointer-events: auto;
        }
    </style>

    @stack('styles')
</head>

<body class="antialiased">
    <div id="menu-backdrop"></div>

    <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-6 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#home" class="z-[110]">
                <img src="{{ asset('img/mybolo.png') }}" alt="Logo" class="h-10 md:h-14 transition-all"
                    id="nav-logo">
            </a>

            <div class="hidden md:flex items-center space-x-10">
                <a href="#home"
                    class="nav-link text-white font-bold text-sm uppercase tracking-widest hover:text-brand-blue transition">Home</a>
                <a href="#services"
                    class="nav-link text-white font-bold text-sm uppercase tracking-widest hover:text-brand-blue transition">Layanan</a>
                <a href="#team"
                    class="nav-link text-white font-bold text-sm uppercase tracking-widest hover:text-brand-blue transition">Tentang</a>
                <a href="#contact"
                    class="bg-brand-blue text-white px-8 py-3 rounded-full font-bold text-sm hover:bg-blue-600 transition shadow-lg shadow-blue-400/20">HUBUNGI
                    KAMI</a>
            </div>

            <button id="menu-btn" class="md:hidden z-[110] p-2">
                <div class="w-7 h-0.5 mb-1.5 bg-white transition-all" id="bar1"></div>
                <div class="w-7 h-0.5 mb-1.5 bg-white transition-all" id="bar2"></div>
                <div class="w-7 h-0.5 bg-white transition-all" id="bar3"></div>
            </button>
        </div>

        <div id="mobile-menu" class="translate-x-full md:hidden flex flex-col">
            <div class="mt-12 space-y-6">
                <p class="text-xs font-black text-gray-300 tracking-[0.3em] uppercase">Navigation</p>
                <a href="#home" class="block text-2xl font-bold text-gray-800 border-b border-gray-100 pb-4">Home</a>
                <a href="#services"
                    class="block text-2xl font-bold text-gray-800 border-b border-gray-100 pb-4">Layanan</a>
                <a href="#team"
                    class="block text-2xl font-bold text-gray-800 border-b border-gray-100 pb-4">Tentang</a>
                <a href="#contact"
                    class="block bg-brand-blue text-white text-center py-4 rounded-2xl font-bold mt-10">Hubungi Kami</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-white py-20">
        <div class="container mx-auto px-6 text-center text-xs text-slate-500 tracking-[0.5em] uppercase">
            &copy; 2026 MYBOLO.ID — Premium IT Solutions
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Navbar & Mobile Menu Logic
        const navbar = document.getElementById('navbar');
        const navLogo = document.getElementById('nav-logo');
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const backdrop = document.getElementById('menu-backdrop');
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            const isScrolled = currentScroll > 100;

            if (isScrolled) {
                navbar.classList.add('nav-sticky-active');
                if (navLogo) navLogo.style.filter = 'brightness(0)';
                document.querySelectorAll('#menu-btn div').forEach(b => b.style.backgroundColor = '#1f2937');
            } else {
                navbar.classList.remove('nav-sticky-active');
                if (navLogo) navLogo.style.filter = 'none';
                document.querySelectorAll('#menu-btn div').forEach(b => b.style.backgroundColor = 'white');
            }

            if (currentScroll > lastScroll && currentScroll > 500) {
                navbar.classList.add('nav-hidden');
            } else {
                navbar.classList.remove('nav-hidden');
            }
            lastScroll = currentScroll;
        });

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('translate-x-full');
            backdrop.classList.toggle('active');
            menuBtn.classList.toggle('open');
            if (menuBtn.classList.contains('open')) {
                document.getElementById('bar1').style.transform = 'translateY(8px) rotate(45deg)';
                document.getElementById('bar2').style.opacity = '0';
                document.getElementById('bar3').style.transform = 'translateY(-8px) rotate(-45deg)';
            } else {
                document.getElementById('bar1').style.transform = 'none';
                document.getElementById('bar2').style.opacity = '1';
                document.getElementById('bar3').style.transform = 'none';
            }
        });
        backdrop.addEventListener('click', () => menuBtn.click());
    </script>

    @stack('scripts')
</body>

</html>
