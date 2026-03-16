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
            /* Pastikan menggunakan unit vh yang benar */
            background: white;
            z-index: 100;
            padding: 2rem;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            /* Hapus display flex !important dari sini */
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

        #menu-btn.open #bar1 {
            transform: translateY(8px) rotate(45deg);
            background-color: #1f2937 !important;
        }

        #menu-btn.open #bar2 {
            opacity: 0;
        }

        #menu-btn.open #bar3 {
            transform: translateY(-8px) rotate(-45deg);
            background-color: #1f2937 !important;
        }

        /* Style Testimonial Section */
        .swiper-pagination-bullet {
            background: #fff !important;
            opacity: 0.5;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
            width: 30px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        /* Style untuk button translate */
        /* Merapikan pembungkus bendera */
        .gtranslate_wrapper {
            display: flex !important;
            align-items: center;
            gap: 12px;
            justify-content: center; /* Agar rapi saat di menu mobile */
            /* Jarak antar bendera */
            margin-left: 15px;
        }

        /* Efek hover agar lebih interaktif */
        .gtranslate_wrapper a {
            transition: transform 0.3s ease, filter 0.3s ease;
            display: inline-block;
            line-net-height: 0;
        }

        .gtranslate_wrapper a:hover {
            transform: scale(1.2);
            /* Membesar sedikit saat disentuh */
            filter: brightness(1.1);
        }

        /* Sembunyikan tooltip/teks bawaan jika muncul */
        .gt_selector {
            display: none !important;
        }

        /* Menghilangkan sisa-sisa banner Google */
        body {
            top: 0 !important;
        }

        .skiptranslate iframe {
            display: none !important;
        }
    </style>

    @stack('styles')
</head>

<body class="antialiased">
    <div id="menu-backdrop"></div>

    <nav id="navbar" class="fixed w-full z-[100] transition-all duration-500 py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#home" class="z-[110]">
                <img src="{{ asset('img/mybolo-new.png') }}" alt="Logo" class="h-6 md:h-8 transition-all"
                    id="nav-logo">
            </a>

            <div class="hidden md:flex items-center space-x-8">
                <a href="#home"
                    class="nav-link text-white font-bold text-sm uppercase tracking-widest hover:text-brand-blue transition">Home</a>
                <a href="#services"
                    class="nav-link text-white font-bold text-sm uppercase tracking-widest hover:text-brand-blue transition">Service</a>
                <a href="#testimonials"
                    class="nav-link text-white font-bold text-sm uppercase tracking-widest hover:text-brand-blue transition">Testimonials</a>
                <a href="#partners"
                    class="nav-link text-white font-bold text-sm uppercase tracking-widest hover:text-brand-blue transition">Partner</a>
                <a href="#contact"
                    class="bg-brand-blue text-white px-5 py-1 rounded-full font-bold text-sm hover:bg-blue-600 transition shadow-lg shadow-blue-400/20">CONTACT</a>

                <div class="gtranslate_wrapper"></div>
            </div>

            <button id="menu-btn" class="md:hidden z-[110] relative p-2">
                <div class="w-6 h-0.5 mb-1.5 bg-white transition-all duration-300" id="bar1"></div>
                <div class="w-6 h-0.5 mb-1.5 bg-white transition-all duration-300" id="bar2"></div>
                <div class="w-6 h-0.5 bg-white transition-all duration-300" id="bar3"></div>
            </button>
        </div>

        <div id="mobile-menu"
            class="fixed top-0 right-0 w-[300px] h-full bg-white translate-x-full z-[100] p-8 shadow-2xl overflow-y-auto">
            <div class="mt-16 space-y-6 flex flex-col">
                <p class="text-xs font-black text-gray-400 tracking-[0.3em] uppercase mb-4">Navigation</p>

                <a href="#home"
                    class="mobile-link block text-2xl font-bold text-gray-800 border-b border-gray-100 pb-4">Home</a>
                <a href="#services"
                    class="mobile-link block text-2xl font-bold text-gray-800 border-b border-gray-100 pb-4">Service</a>
                <a href="#testimonials"
                    class="mobile-link block text-2xl font-bold text-gray-800 border-b border-gray-100 pb-4">Testimonials</a>
                <a href="#partners"
                    class="mobile-link block text-2xl font-bold text-gray-800 border-b border-gray-100 pb-4">Partner</a>

                <a href="#contact"
                    class="mobile-link block bg-brand-blue text-white text-center py-4 rounded-2xl font-bold mt-6">Contact</a>

                <div class="flex justify-center pt-8">
                    <div class="gtranslate_wrapper"></div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-white py-6">
        <div class="container mx-auto px-6 flex flex-col justify-center items-center">

            <div class="flex flex-wrap justify-center gap-6 md:gap-10">

                <a href="https://instagram.com/mybolo_" target="_blank" rel="noopener noreferrer"
                    class="flex items-center space-x-2 text-slate-400 hover:text-brand-blue transition-colors duration-300 group"
                    aria-label="Instagram">
                    <svg class="w-5 h-5 md:w-6 md:h-6 transform group-hover:scale-110 transition-transform duration-300"
                        fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-medium tracking-wide">Instagram</span>
                </a>

                <a href="mailto:support@mybolo.id"
                    class="flex items-center space-x-2 text-slate-400 hover:text-brand-blue transition-colors duration-300 group"
                    aria-label="Email">
                    <svg class="w-5 h-5 md:w-6 md:h-6 transform group-hover:scale-110 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium tracking-wide">Email</span>
                </a>

                <a href="https://wa.me/6281384828887" target="_blank" rel="noopener noreferrer"
                    class="flex items-center space-x-2 text-slate-400 hover:text-brand-blue transition-colors duration-300 group"
                    aria-label="WhatsApp">
                    <svg class="w-5 h-5 md:w-6 md:h-6 transform group-hover:scale-110 transition-transform duration-300"
                        fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                    <span class="text-sm font-medium tracking-wide">WhatsApp</span>
                </a>

            </div>

            <div class="mt-6 text-sm text-slate-500 font-medium tracking-wide text-center">
                &copy; 2026 Mybolo. All rights reserved.
            </div>

        </div>
    </footer>

    <button id="backToTop"
        class="fixed bottom-8 right-8 z-50 bg-brand-blue text-white w-12 h-12 rounded-full shadow-2xl flex items-center justify-center opacity-0 translate-y-10 pointer-events-none transition-all duration-500 hover:bg-blue-600 hover:-translate-y-2 group">
        <i class="fas fa-arrow-up transition-transform group-hover:scale-110"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Tombol kembali keatas -------------------------------------------------------------------------------
        const backToTopBtn = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            const heroHeight = heroSection.offsetHeight;

            // --- Logika Navbar yang sudah ada ---
            if (currentScroll <= heroHeight) {
                navbar.classList.remove('nav-hidden', 'nav-sticky-active');
                navLogo.classList.remove('logo-dark-mode');

                // Sembunyikan tombol Back to Top saat di area Hero
                backToTopBtn.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
            } else {
                // Tampilkan tombol Back to Top saat di luar Hero
                backToTopBtn.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');

                if (currentScroll > lastScroll) {
                    navbar.classList.add('nav-hidden');
                } else {
                    navbar.classList.remove('nav-hidden');
                    navbar.classList.add('nav-sticky-active');
                    navLogo.classList.add('logo-dark-mode');
                }
            }
            lastScroll = currentScroll;
        });

        // Fungsi saat tombol diklik
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Akhir dari tombol kembali keatas ------------------------------------------------------------------------------

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

        // Toggle Menu Function
        // Toggle Menu Function yang Lebih Stabil
        const toggleMenu = () => {
            const isMenuOpen = mobileMenu.classList.contains('translate-x-full');

            if (isMenuOpen) {
                // Buka Menu
                mobileMenu.classList.remove('translate-x-full');
                backdrop.classList.add('active');
                menuBtn.classList.add('open');
                document.body.style.overflow = 'hidden';
            } else {
                // Tutup Menu
                mobileMenu.classList.add('translate-x-full');
                backdrop.classList.remove('active');
                menuBtn.classList.remove('open');
                document.body.style.overflow = '';
            }
        };

        // Event Listeners
        menuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMenu();
        });

        backdrop.addEventListener('click', toggleMenu);

        // Menutup menu saat link di klik
        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('translate-x-full');
                backdrop.classList.remove('active');
                menuBtn.classList.remove('open');
                document.body.style.overflow = '';
            });
        });

        // Script Testimonial Section
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            },
        });

        // Script untuk Translate Page
        window.gtranslateSettings = {
            "default_language": "id",
            "languages": ["id", "en", "th", "zh-CN"],
            "wrapper_selector": ".gtranslate_wrapper",
            "flag_size": 24, // Ukuran bendera (pixel)
            "flag_style": "3d", // Pilihan: '3d', 'flat', 'shiny'
            "alt_flags": {
                "en": "usa"
            },
            "horizontal_position": "inline",
            "switcher_open_direction": "bottom",
            "native_language_names": true,
            "detect_browser_language": true
        }
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/flags.js" defer></script>
    @stack('scripts')
</body>

</html>
