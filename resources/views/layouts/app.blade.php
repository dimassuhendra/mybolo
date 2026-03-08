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

        /* Navbar Scrolled Logic */
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

        /* Hero Switcher UI */
        .hero-indicator {
            width: 40px;
            height: 3px;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hero-nav.active .hero-indicator {
            width: 80px;
            background: var(--brand-blue);
        }

        /* Custom Marquee */
        @keyframes marquee {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .animate-marquee {
            animation: marquee 40s linear infinite;
        }

        /* Bento Grid Helper */
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
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

        /* Progress Bar Base Styles */
        /* Animasi heroProgress dicabut agar bisa dikontrol dinamis oleh JS di Blade */
        .hero-nav .progress-container {
            width: 80px;
            height: 2px;
            background: rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            margin-top: 8px;
        }

        .progress-bar {
            width: 0%;
            height: 100%;
            background-color: var(--brand-blue);
            /* Transisi dikontrol oleh JavaScript di company_profile */
        }

        .bento-mask {
            clip-path: inset(0 0 0 0 round 2rem);
        }
    </style>
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
        <div class="container mx-auto px-6 grid md:grid-cols-3 gap-12">
            <div>
                <img src="{{ asset('img/mybolo.png') }}" class="h-12 mb-6 brightness-0 invert">
                <p class="text-slate-400 leading-relaxed">{{ $settings['address'] ?? '' }}</p>
            </div>
            <div class="md:text-center">
                <h4 class="font-bold mb-6 uppercase tracking-widest">Quick Links</h4>
                <div class="flex flex-col space-y-4 text-slate-400">
                    <a href="#home">Home</a>
                    <a href="#services">Layanan</a>
                    <a href="#team">Tentang Kami</a>
                </div>
            </div>
            <div class="md:text-right">
                <h4 class="font-bold mb-6 uppercase tracking-widest">Connect</h4>
                <p class="text-slate-400 mb-4">{{ $settings['phone'] ?? '' }}</p>
                <div class="flex md:justify-end space-x-4">
                    <a href="#"
                        class="w-10 h-10 rounded-full border border-slate-700 flex items-center justify-center hover:bg-brand-blue transition"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#"
                        class="w-10 h-10 rounded-full border border-slate-700 flex items-center justify-center hover:bg-brand-blue transition"><i
                            class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <div
            class="container mx-auto px-6 mt-20 pt-8 border-t border-slate-800 text-center text-xs text-slate-500 tracking-[0.5em] uppercase">
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
                navLogo.style.filter = 'brightness(0)';
                document.querySelectorAll('#menu-btn div').forEach(b => b.style.backgroundColor = '#1f2937');
            } else {
                navbar.classList.remove('nav-sticky-active');
                navLogo.style.filter = 'none';
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
</body>

</html>
