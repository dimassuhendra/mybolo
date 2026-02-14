<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYBOLO.ID - Solusi IT Terpadu</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Domine:wght@400..700&family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap');

        /* Konfigurasi Font Global */
        :root {
            --font-title: 'Plus Jakarta Sans', sans-serif;
            --font-body: 'Domine', serif;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        body {
            font-family: var(--font-body);
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
            background-color: #00AEEF;
        }

        .text-brand-blue {
            color: #00AEEF;
        }

        /* Navbar Scrolled Logic */
        .nav-scrolled {
            @apply bg-white/90 backdrop-blur-md shadow-lg py-3;
        }

        .nav-scrolled .nav-link {
            @apply text-gray-800;
        }

        .nav-scrolled #bar1,
        .nav-scrolled #bar2,
        .nav-scrolled #bar3 {
            @apply bg-gray-800;
        }

        /* Hamburger Animation */
        .open #bar1 {
            transform: translateY(8px) rotate(45deg);
            background-color: white !important;
        }

        .open #bar2 {
            opacity: 0;
        }

        .open #bar3 {
            transform: translateY(-8px) rotate(-45deg);
            background-color: white !important;
        }

        /* Konfigurasi Flip Card */
        .flip-card {
            background-color: transparent;
            perspective: 1000px;
            height: 450px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }

        /* Saat Hover, hanya bagian inner yang berputar */
        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        /* Sisi Depan & Belakang */
        .flip-card-front,
        .flip-card-back {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 1.5rem;
            overflow: hidden;
        }

        /* Sisi Belakang */
        .flip-card-back {
            background-color: #00AEEF;
            color: white;
            transform: rotateY(180deg);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            z-index: 2;
        }

        /* Sisi Depan */
        .flip-card-front {
            z-index: 1;
        }

        /* Efek Timbul pada Teks Depan */
        .glass-text {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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

        /* Style Partners Section */
        @keyframes marquee {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        @keyframes marquee2 {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(0%);
            }
        }

        .animate-marquee {
            animation: marquee 30s linear infinite;
        }

        .animate-marquee2 {
            animation: marquee2 30s linear infinite;
        }

        /* Pause animasi saat di-hover agar user bisa melihat logo dengan jelas */
        .group:hover .animate-marquee,
        .group:hover .animate-marquee2 {
            animation-play-state: paused;
        }

        /* Transisi halus untuk semua elemen */
        .team-card {
            backface-visibility: hidden;
        }

        .team-card * {
            transition: all 0.5s ease;
        }

        #navbar {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(0);
        }

        .nav-hidden {
            transform: translateY(-100%);
            opacity: 0;
            pointer-events: none;
        }

        .logo-bw {
            filter: grayscale(100%);
            opacity: 0.6;
            transition: 0.3s;
        }

        .logo-bw:hover {
            filter: grayscale(0%);
            opacity: 1;
        }

        /* Navbar muncul dengan style Putih */
        .nav-sticky-active {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            padding-top: 0.75rem !important;
            padding-bottom: 0.75rem !important;
        }

        /* Mengubah warna teks link menjadi hitam saat bg putih */
        .nav-sticky-active .nav-link {
            color: #1f2937 !important;
        }

        /* Mengubah warna hamburger bar menjadi hitam saat bg putih */
        .nav-sticky-active #bar1,
        .nav-sticky-active #bar2,
        .nav-sticky-active #bar3 {
            background-color: #1f2937 !important;
        }

        /* Filter untuk membuat logo menjadi hitam (jika logo asli berwarna/putih) */
        .logo-dark-mode {
            filter: brightness(0);
        }

        /* Update Hamburger Color Logic */
        #menu-btn .w-7 {
            transition: all 0.3s ease;
            background-color: white;
            /* Default di Hero */
        }

        /* Saat navbar putih, hamburger jadi hitam */
        .nav-sticky-active #menu-btn .w-7 {
            background-color: #1f2937;
        }

        /* Saat menu terbuka, hamburger tetap putih karena BG menu biasanya gelap */
        .open #menu-btn .w-7 {
            background-color: white !important;
        }

        /* Hamburger Animation (Lebih rapi) */
        .open #bar1 {
            transform: translateY(8px) rotate(45deg);
        }

        .open #bar2 {
            opacity: 0;
            transform: translateX(20px);
        }

        .open #bar3 {
            transform: translateY(-8px) rotate(-45deg);
        }

        /* Perbaikan Mobile Menu Overlay */
        #mobile-menu {
            padding-top: 5rem;
            background: linear-gradient(to bottom, #1e3a8a, #00AEEF);
            /* Gradient agar lebih mewah */
            z-index: 40;
            /* Di bawah tombol close tapi di atas konten */
        }

        .mobile-link {
            @apply text-white/80 hover:text-white transition-all duration-300 text-xl tracking-widest uppercase font-semibold;
        }

        /* Sidebar Drawer Style */
        #mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            width: 280px;
            /* Lebar menu samping */
            height: 100vh;
            background: white;
            /* Background Putih agar bersih */
            z-index: 100;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Backdrop gelap saat menu buka */
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

        /* Styling Link di Mobile */
        .mobile-link {
            @apply text-gray-800 font-semibold text-lg py-4 border-b border-gray-100 flex items-center justify-between;
            font-family: var(--font-title);
        }

        .mobile-link i {
            @apply text-brand-blue text-sm;
        }

        /* Warna hamburger saat menu terbuka harus tetap gelap */
        .open #bar1,
        .open #bar2,
        .open #bar3 {
            background-color: #1f2937 !important;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 leading-relaxed">
    <div id="menu-backdrop"></div>

    <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#home" class="z-[110]">
                <img src="{{ asset('img/mybolo.png') }}" alt="Logo" class="h-10 md:h-14 transition-all duration-500" id="nav-logo">
            </a>

            <div class="hidden md:flex items-center space-x-8">
                <a href="#home" class="nav-link text-white hover:text-brand-blue transition">Home</a>
                <a href="#services" class="nav-link text-white hover:text-brand-blue transition">Layanan</a>
                <a href="#team" class="nav-link text-white hover:text-brand-blue transition">Tentang Kami</a>
                <a href="#contact" class="bg-brand-blue text-white px-6 py-2 rounded-full hover:bg-blue-600 transition shadow-lg">Hubungi Kami</a>
            </div>

            <button id="menu-btn" class="block md:hidden focus:outline-none z-[110] p-2 bg-black/5 rounded-lg">
                <div class="w-6 h-0.5 mb-1.5 bg-white transition-all" id="bar1"></div>
                <div class="w-6 h-0.5 mb-1.5 bg-white transition-all" id="bar2"></div>
                <div class="w-6 h-0.5 bg-white transition-all" id="bar3"></div>
            </button>
        </div>

        <div id="mobile-menu" class="translate-x-full md:hidden">
            <div class="mt-12 flex flex-col">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Menu Utama</p>
                <a href="#home" class="mobile-link">Home <i class="fas fa-chevron-right"></i></a>
                <a href="#services" class="mobile-link">Layanan <i class="fas fa-chevron-right"></i></a>
                <a href="#team" class="mobile-link">Tentang Kami <i class="fas fa-chevron-right"></i></a>
                <a href="#contact" class="mt-8 bg-brand-blue text-white text-center py-4 rounded-xl font-bold shadow-lg shadow-blue-200">
                    Hubungi Kami
                </a>
            </div>

            <div class="mt-auto pb-10">
                <p class="text-xs text-gray-400 mb-2">Ikuti Kami</p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6 text-center">
            <hr class="border-gray-800 mb-6">
            <p class="text-sm opacity-50">&copy; 2026 MyBolo. All Rights Reserved.</p>
        </div>
    </footer>

    <button id="backToTop" class="fixed bottom-8 right-8 z-50 bg-brand-blue text-white w-12 h-12 rounded-full shadow-2xl flex items-center justify-center opacity-0 translate-y-10 pointer-events-none transition-all duration-500 hover:bg-blue-600 hover:-translate-y-2 group">
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
            duration: 1000, // Durasi animasi (1 detik)
            once: true, // Animasi hanya jalan sekali saat scroll ke bawah
            offset: 200, // Animasi baru jalan setelah scroll 200px
        });

        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const navLinks = document.querySelectorAll('.nav-link');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        let lastScroll = 0;
        const navbar = document.getElementById('navbar');
        const navLogo = document.getElementById('nav-logo');
        const heroSection = document.getElementById('home');

        window.addEventListener('scroll', () => {
            // JANGAN jalankan logika sembunyi navbar jika menu mobile sedang terbuka
            if (menuBtn.classList.contains('open')) return;

            const currentScroll = window.pageYOffset;
            const heroHeight = heroSection.offsetHeight;

            if (currentScroll <= heroHeight) {
                navbar.classList.remove('nav-hidden', 'nav-sticky-active');
                navLogo.classList.remove('logo-dark-mode');
                backToTopBtn.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
            } else {
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

        // 2. Toggle Mobile Menu
        menuBtn.addEventListener('click', () => {
            menuBtn.classList.toggle('open');
            mobileMenu.classList.toggle('translate-x-full');
            document.body.classList.toggle('overflow-hidden');

            // Opsional: Paksa navbar muncul saat menu dibuka
            navbar.classList.remove('nav-hidden');

            // Ganti filter logo saat menu terbuka agar tetap putih/terlihat
            if (menuBtn.classList.contains('open')) {
                navLogo.classList.remove('logo-dark-mode');
            } else if (window.pageYOffset > heroSection.offsetHeight) {
                navLogo.classList.add('logo-dark-mode');
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            let currentSlide = 0;

            function nextSlide() {
                slides[currentSlide].classList.replace('opacity-100', 'opacity-0');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.replace('opacity-0', 'opacity-100');
            }

            // Ganti slide setiap 5 detik
            setInterval(nextSlide, 5000);
        });

        // Script Testimonial Section
        var swiper = new Swiper(".mySwiper", {
            autoHeight: true, // Tambahkan ini agar wrapper membungkus konten
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
        const menuBackdrop = document.getElementById('menu-backdrop');

        function toggleMenu() {
            menuBtn.classList.toggle('open');
            mobileMenu.classList.toggle('translate-x-full');
            menuBackdrop.classList.toggle('active');
            document.body.classList.toggle('overflow-hidden');

            // Pastikan warna bar hamburger menyesuaikan
            if (menuBtn.classList.contains('open')) {
                // Saat menu buka, bar jadi hitam karena background drawer putih
                document.querySelectorAll('#menu-btn div').forEach(bar => bar.style.backgroundColor = '#1f2937');
            } else {
                // Kembalikan ke logika scroll jika menu tutup
                updateNavbarColor();
            }
        }

        menuBtn.addEventListener('click', toggleMenu);
        menuBackdrop.addEventListener('click', toggleMenu); // Klik area luar untuk tutup

        // Tutup menu saat link diklik
        mobileLinks.forEach(link => {
            link.addEventListener('click', toggleMenu);
        });

        // Tambahkan fungsi pembantu untuk cek warna navbar
        function updateNavbarColor() {
            const currentScroll = window.pageYOffset;
            const heroHeight = heroSection.offsetHeight;
            const isWhiteBg = currentScroll > (heroHeight - 100);

            document.querySelectorAll('#menu-btn div').forEach(bar => {
                bar.style.backgroundColor = (isWhiteBg && !menuBtn.classList.contains('open')) ? '#1f2937' : 'white';
            });
        }

        // Panggil di event scroll Anda juga
        window.addEventListener('scroll', updateNavbarColor);
    </script>

</body>

</html>