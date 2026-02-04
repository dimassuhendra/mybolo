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

        :root {
            --font-title: 'Plus Jakarta Sans', sans-serif;
            --font-body: 'Domine', serif;
            --brand-blue: #00AEEF;
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
            background-color: var(--brand-blue);
        }

        .text-brand-blue {
            color: var(--brand-blue);
        }

        /* Navbar Hide/Show Logic */
        #navbar {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(0);
        }

        .nav-hidden {
            transform: translateY(-100%);
            opacity: 0;
            pointer-events: none;
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

        /* Marquee Animation */
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
    </style>
</head>

<body class="bg-gray-50 text-gray-800 leading-relaxed">

    <nav id="navbar" class="fixed w-full z-50 py-6 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#home">
                <img src="{{ asset('img/mybolo.png') }}"
                    alt="Logo"
                    class="h-10 md:h-12 brightness-0 opacity-80 hover:opacity-100 transition-all duration-300"
                    id="nav-logo">
            </a>

            <div class="hidden md:flex items-center space-x-10 font-semibold tracking-tight">
                <a href="#home" class="text-black hover:text-brand-blue transition">Home</a>
                <a href="#services" class="text-black hover:text-brand-blue transition">Layanan</a>
                <a href="#team" class="text-black hover:text-brand-blue transition">Tentang Kami</a>
                <a href="#contact" class="border border-black/50 text-black px-6 py-2 rounded-md hover:bg-black hover:text-white transition">
                    Konsultasi
                </a>
            </div>

            <button id="menu-btn" class="block md:hidden focus:outline-none z-50">
                <div class="w-7 h-0.5 bg-white mb-1.5 transition-all" id="bar1"></div>
                <div class="w-7 h-0.5 bg-white mb-1.5 transition-all" id="bar2"></div>
                <div class="w-7 h-0.5 bg-white transition-all" id="bar3"></div>
            </button>
        </div>

        <div id="mobile-menu" class="fixed inset-0 bg-black/95 translate-x-full transition-transform duration-300 md:hidden flex flex-col items-center justify-center space-y-8 text-2xl font-bold text-white">
            <a href="#home" class="mobile-link">Home</a>
            <a href="#services" class="mobile-link">Layanan</a>
            <a href="#team" class="mobile-link">Tentang Kami</a>
            <a href="#contact" class="bg-brand-blue px-8 py-3 rounded-full mobile-link">Hubungi Kami</a>
        </div>
    </nav>

    <main>
        @yield('content')

        <div class="w-full rotate-180 bg-black -mb-1">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] fill-gray-50">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
            </svg>
        </div>

        <section id="partners" class="py-16 bg-gray-50 overflow-hidden relative">
            <div class="container mx-auto px-6 relative z-10 text-center">
                <h4 class="text-brand-blue font-bold tracking-[0.2em] uppercase text-sm mb-2">Network & Trust</h4>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Partner Bisnis Kami</h2>
                <div class="w-12 h-1 bg-brand-blue mx-auto mt-4 mb-10"></div>

                <div class="relative flex overflow-x-hidden group">
                    <div class="flex animate-marquee whitespace-nowrap py-12 items-center">
                        @foreach($partners as $partner)
                        <div class="mx-8 w-40 grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-500">
                            <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}" class="h-10 object-contain mx-auto">
                        </div>
                        @endforeach
                    </div>
                    <div class="absolute top-0 flex animate-marquee2 whitespace-nowrap py-12 items-center">
                        @foreach($partners as $partner)
                        <div class="mx-8 w-40 grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-500">
                            <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}" class="h-10 object-contain mx-auto">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <div class="w-full bg-gray-50 -mb-1">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] fill-white">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
            </svg>
        </div>

        <section id="contact" class="pb-24 pt-10 bg-white" data-aos="fade-up">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h4 class="text-brand-blue font-bold tracking-[0.3em] uppercase text-xs mb-3 font-title">Get In Touch</h4>
                    <h2 class="text-4xl md:text-5xl font-bold text-black font-title">Hubungi Kami</h2>
                    <p class="text-gray-500 mt-6 font-body max-w-2xl mx-auto italic">Tim kami siap membantu memberikan solusi terbaik.</p>
                </div>

                <div class="flex flex-col lg:flex-row gap-12">
                    <div class="w-full lg:w-2/5 grid grid-cols-1 gap-4">
                        @php
                        $contactInfo = [
                        ['icon' => 'fa-location-dot', 'title' => 'Lokasi Kantor', 'val' => $settings['address']],
                        ['icon' => 'fa-phone-volume', 'title' => 'Telepon / WA', 'val' => $settings['phone']],
                        ['icon' => 'fa-envelope-open-text', 'title' => 'Email Support', 'val' => $settings['email']],
                        ['icon' => 'fa-clock', 'title' => 'Operasional', 'val' => $settings['working_hours']]
                        ];
                        @endphp

                        @foreach($contactInfo as $info)
                        <div class="group bg-gray-50 p-6 rounded-xl border border-gray-100 flex items-start gap-5 transition-all duration-500 hover:bg-black hover:border-black">
                            <div class="w-14 h-14 bg-white text-brand-blue rounded-lg flex items-center justify-center text-2xl transition-all duration-500 group-hover:bg-brand-blue group-hover:text-white group-hover:rotate-[360deg]">
                                <i class="fa-solid {{ $info['icon'] }}"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-black font-title mb-1 group-hover:text-white transition-colors">{{ $info['title'] }}</h4>
                                <p class="text-gray-600 text-sm font-body leading-relaxed group-hover:text-gray-300 transition-colors">{{ $info['val'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="w-full lg:w-3/5 min-h-[500px] rounded-2xl overflow-hidden shadow-2xl border border-gray-100 relative group">
                        <iframe src="{{ $settings['maps_url'] }}" class="w-full h-full border-0 grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-black text-white py-12">
        <div class="container mx-auto px-6 text-center">
            <p class="text-sm opacity-50">&copy; 2026 MyBolo. All Rights Reserved.</p>
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
        // Script untuk menyembunyikan navbar di luar section Hero
        window.onscroll = () => {
            const heroHeight = document.getElementById('home').offsetHeight;
            if (window.scrollY > (heroHeight - 150)) {
                navbar.classList.add('nav-hidden');
            } else {
                navbar.classList.remove('nav-hidden');
            }
        };

        // Mobile Menu Logic
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            menuBtn.classList.toggle('open');
            mobileMenu.classList.toggle('translate-x-full');
            document.body.classList.toggle('overflow-hidden');
        });

        // Script untuk testimonial slider
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next-custom",
                prevEl: ".swiper-button-prev-custom",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 2.5
                },
            },
            on: {
                slideChangeTransitionStart: function() {
                    // Menambahkan efek fokus pada slide aktif
                    document.querySelectorAll('.swiper-slide').forEach(slide => {
                        slide.classList.add('opacity-40', 'scale-90', 'grayscale');
                        slide.classList.remove('opacity-100', 'scale-105', 'grayscale-0');
                    });
                    const activeSlide = document.querySelector('.swiper-slide-active');
                    if (activeSlide) {
                        activeSlide.classList.remove('opacity-40', 'scale-90', 'grayscale');
                        activeSlide.classList.add('opacity-100', 'scale-105', 'grayscale-0');
                    }
                },
            }
        });
    </script>
</body>

</html>