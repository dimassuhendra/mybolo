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
        /* Konfigurasi Font Global */
        :root {
            --font-title: 'Fredoka', sans-serif;
            --font-body: 'Domine', serif;
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
        /* Container Utama Kartu */
        .flip-card {
            background-color: transparent;
            perspective: 1000px;
            height: 450px;
            /* Tentukan tinggi pasti agar tidak goyang */
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
            /* Kunci posisi agar menumpuk di titik yang sama */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            /* Sembunyikan sisi belakang saat tidak menghadap user */
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
        /* Keyframes untuk Infinite Scroll */
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

        /* Section Our Team */
        /* Transisi halus untuk semua elemen */
        .team-card {
            backface-visibility: hidden;
        }

        .team-card * {
            transition: all 0.5s ease;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 leading-relaxed">
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#home">
                <img src="{{ asset('img/mybolo.png') }}" alt="Logo" class="h-10 md:h-14 transition-all duration-300" id="nav-logo">
            </a>

            <div class="hidden md:flex items-center space-x-8 font-medium tracking-wide">
                <a href="#home" class="nav-link text-white hover:text-brand-blue transition">Home</a>
                <a href="#services" class="nav-link text-white hover:text-brand-blue transition">Layanan</a>
                <a href="#tean" class="nav-link text-white hover:text-brand-blue transition">Tentang Kami</a>
                <a href="#contact" class="bg-brand-blue text-white px-6 py-2 rounded-full hover:bg-blue-600 transition shadow-lg">
                    Hubungi Kami
                </a>
            </div>

            <button id="menu-btn" class="block md:hidden focus:outline-none z-50">
                <div class="w-7 h-1 bg-white mb-1 transition-all duration-300 rounded" id="bar1"></div>
                <div class="w-7 h-1 bg-white mb-1 transition-all duration-300 rounded" id="bar2"></div>
                <div class="w-7 h-1 bg-white transition-all duration-300 rounded" id="bar3"></div>
            </button>
        </div>

        <div id="mobile-menu" class="fixed inset-0 bg-blue-900 translate-x-full transition-transform duration-300 md:hidden flex flex-col items-center justify-center space-y-8 text-2xl font-bold text-white">
            <a href="#home" class="mobile-link">Home</a>
            <a href="#services" class="mobile-link">Layanan</a>
            <a href="#about" class="mobile-link">Tentang Kami</a>
            <a href="#contact" class="bg-brand-blue px-8 py-3 rounded-full mobile-link">Hubungi Kami</a>
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Durasi animasi (1 detik)
            once: true, // Animasi hanya jalan sekali saat scroll ke bawah
            offset: 200, // Animasi baru jalan setelah scroll 200px
        });

        const navbar = document.getElementById('navbar');
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const navLinks = document.querySelectorAll('.nav-link');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        // 1. Efek Scroll
        window.onscroll = () => {
            if (window.scrollY > 50) {
                navbar.classList.add('nav-scrolled');
                // Jika Anda ingin logo berubah warna saat scroll, ganti src di sini
                // document.getElementById('nav-logo').src = '{{ asset("img/logo-dark.png") }}';
            } else {
                navbar.classList.remove('nav-scrolled');
            }
        };

        // 2. Toggle Mobile Menu
        menuBtn.addEventListener('click', () => {
            menuBtn.classList.toggle('open');
            mobileMenu.classList.toggle('translate-x-full');
            // Kunci scroll body saat menu terbuka
            document.body.classList.toggle('overflow-hidden');
        });

        // 3. Tutup menu saat link diklik (untuk mobile)
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                menuBtn.classList.remove('open');
                mobileMenu.classList.add('translate-x-full');
                document.body.classList.remove('overflow-hidden');
            });
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
    </script>

</body>

</html>