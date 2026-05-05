@extends('layouts.app')

@section('content')
    <section id="home" class="relative h-screen w-full overflow-hidden bg-black">
        <div id="hero-master" class="h-full w-full">
            @foreach ($sliders as $index => $slide)
                {{-- Tambahkan hidden lg:block HANYA jika slide BUKAN video --}}
                <div class="hero-item absolute inset-0 {{ $index == 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }} transition-all duration-1000 ease-in-out {{ !$slide->video_url ? 'hidden lg:block' : '' }}"
                    data-duration="{{ $slide->duration * 1000 }}" data-is-video="{{ $slide->video_url ? 'true' : 'false' }}">

                    {{-- Background Media Container --}}
                    <div class="absolute inset-0 z-0 overflow-hidden">
                        <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                            @if ($slide->video_url)
                                {{-- PEMANGGILAN VIDEO LOKAL --}}
                                <video
                                    class="pointer-events-none absolute inset-0 w-full h-full object-cover grayscale brightness-[0.9]"
                                    autoplay loop muted playsinline>
                                    <source src="{{ asset('vid/hero.mp4') }}" type="video/mp4">
                                    Maaf, browser Anda tidak mendukung tag video.
                                </video>
                            @else
                                <div class="absolute inset-0 w-full h-full">
                                    <picture class="w-full h-full">
                                        {{-- Source Mobile --}}
                                        @if ($slide->image_mobile_path)
                                            <source media="(max-width: 639px)"
                                                srcset="{{ asset('storage/' . $slide->image_mobile_path) }}"
                                                class="w-full h-full">
                                        @endif

                                        {{-- Source Tablet --}}
                                        @if ($slide->image_tablet_path)
                                            <source media="(max-width: 1024px)"
                                                srcset="{{ asset('storage/' . $slide->image_tablet_path) }}"
                                                class="w-full h-full">
                                        @endif

                                        {{-- Image Utama --}}
                                        <img src="{{ asset('storage/' . $slide->image_path) }}"
                                            class="w-full h-full object-cover object-center"
                                            style="min-height: 100vh; min-width: 100vw;" alt="Hero Image">
                                    </picture>
                                </div>
                            @endif
                        </div>

                        {{-- Overlay Layer (Tetap Tampil di Semua Device) --}}
                        <div
                            class="absolute inset-0 {{ $slide->video_url ? 'bg-indigo-950/60' : 'bg-brand-blue/80' }} mix-blend-multiply z-10">
                        </div>

                        @if ($slide->video_url)
                            <div class="absolute inset-0 bg-gradient-to-r from-black via-black/40 to-transparent z-15">
                            </div>
                        @endif
                    </div>

                    {{-- Content (Tetap Tampil di Semua Device) --}}
                    <div class="container mx-auto px-6 h-full flex items-center relative z-20">
                        <div class="w-full max-w-4xl text-left" data-aos="fade-up">
                            @if ($slide->title)
                                <h1
                                    class="{{ $slide->video_url ? 'text-4xl md:text-[40px] leading-[0.9]' : 'text-4xl md:text-7xl mb-6 leading-tight italic' }} font-black text-white tracking-tighter uppercase">
                                    {!! $slide->title !!}
                                </h1>
                            @endif

                            @if ($slide->subtitle)
                                <p
                                    class="{{ $slide->video_url ? 'text-slate-300 mt-6 md:mt-10 text-md md:text-xl max-w-xl' : 'text-white/80 text-lg md:text-xl font-light mt-4' }} font-body leading-relaxed">
                                    {{ $slide->subtitle }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Navigasi Bawah --}}
        <div class="absolute bottom-8 md:bottom-20 left-0 w-full z-30">
            <div class="container mx-auto px-6">
                <div
                    class="flex flex-row items-center justify-start gap-4 md:space-x-12 overflow-x-auto no-scrollbar pb-4 md:pb-0">
                    @foreach ($sliders as $index => $slide)
                        {{-- Tombol Navigasi juga disembunyikan di mobile jika ini slide gambar --}}
                        <button onclick="changeHero({{ $index }})"
                            class="hero-nav {{ $index == 0 ? 'active' : '' }} group flex-col items-start focus:outline-none min-w-[120px] md:min-w-0 flex-shrink-0 {{ !$slide->video_url ? 'hidden lg:flex' : 'flex' }}">

                            <span
                                class="text-[8px] md:text-[10px] font-black text-white tracking-widest opacity-40 group-[.active]:opacity-100 transition-all uppercase whitespace-nowrap">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} {{ $slide->nav_label }}
                            </span>

                            <div class="progress-container h-[2px] w-full md:w-32 bg-white/20 mt-2 overflow-hidden">
                                <div class="progress-bar h-full bg-brand-blue w-0 transition-all linear"
                                    style="transition-duration: {{ $index == 0 ? $slide->duration . 's' : '0s' }}"></div>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <style>
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            picture {
                display: block;
                width: 100%;
                height: 100%;
            }

            .hero-item img {
                width: 100vw;
                height: 100vh;
                object-fit: cover;
            }
        </style>
    </section>

    <section id="services" class="py-32 bg-white overflow-hidden relative" data-aos="fade-up">
        @include('sections.service')
    </section>

    <section id="testimonials" class="bg-black py-24 text-white">
        @include('sections.testimonial')
    </section>

    <section id="partners" class="bg-white pt-12 pb-2">
        @include('sections.partner', ['partners' => $partners])
    </section>

    {{-- <section id="team" class="py-24 bg-black overflow-hidden" data-aos="fade-up">
        @include('sections.team')
    </section> --}}

    <section id="contact" class="pt-2 pb-24 bg-white" data-aos="fade-up">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h4 class="text-brand-blue font-bold tracking-[0.2em] uppercase text-sm mb-2 font-title">Get In Touch</h4>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 font-title">Hubungi Kami</h2>
                <p class="text-gray-500 mt-4 font-body max-w-xl mx-auto">Siap meningkatkan keamanan dan konektivitas Anda?
                    Tim kami siap membantu memberikan solusi terbaik.</p>
                <div class="w-20 h-1.5 bg-brand-blue mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-12 items-stretch">
                <div class="w-full lg:w-2/5 grid grid-cols-1 gap-4">

                    <div
                        class="group bg-gray-50 p-6 rounded-xl border border-gray-100 flex items-start gap-5 transition-all duration-500 hover:bg-black hover:border-black shadow-sm hover:shadow-2xl">
                        <div
                            class="w-14 h-14 bg-white text-brand-blue rounded-lg flex items-center justify-center text-2xl transition-all duration-500 group-hover:bg-brand-blue group-hover:text-black group-hover:rotate-[360deg]">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-black font-title mb-1 group-hover:text-white transition-colors">Lokasi
                                Kantor</h4>
                            <p
                                class="text-gray-600 text-sm font-body leading-relaxed group-hover:text-gray-300 transition-colors">
                                {{ $settings['address'] }}</p>
                            <p
                                class="text-gray-600 text-sm font-body leading-relaxed group-hover:text-gray-300 transition-colors">
                                {{ $settings['company_name'] }}</p>
                        </div>
                    </div>

                    <div
                        class="group bg-gray-50 p-6 rounded-xl border border-gray-100 flex items-start gap-5 transition-all duration-500 hover:bg-black hover:border-black shadow-sm hover:shadow-2xl">
                        <div
                            class="w-14 h-14 bg-white text-brand-blue rounded-lg flex items-center justify-center text-2xl transition-all duration-500 group-hover:bg-brand-blue group-hover:text-black group-hover:rotate-[360deg]">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-black font-title mb-1 group-hover:text-white transition-colors">
                                Telepon</h4>
                            <div
                                class="grid grid-cols-[auto_1fr] gap-x-2 text-gray-600 text-sm font-body font-bold group-hover:text-gray-300 transition-colors">

                                <span class="whitespace-nowrap">Phone</span>
                                <span>: {{ $settings['phone'] }}</span>

                                <span class="whitespace-nowrap">Contact Support 24/7</span>
                                <span>: +62821-3848-28887</span>

                            </div>
                        </div>
                    </div>

                    <div
                        class="group bg-gray-50 p-6 rounded-xl border border-gray-100 flex items-start gap-5 transition-all duration-500 hover:bg-black hover:border-black shadow-sm hover:shadow-2xl">
                        <div
                            class="w-14 h-14 bg-white text-brand-blue rounded-lg flex items-center justify-center text-2xl transition-all duration-500 group-hover:bg-brand-blue group-hover:text-black group-hover:rotate-[360deg]">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-black font-title mb-1 group-hover:text-white transition-colors">Email
                                Support</h4>
                            <p class="text-gray-600 text-sm font-body group-hover:text-gray-300 transition-colors">
                                {{ $settings['email'] }}</p>
                        </div>
                    </div>

                    <div
                        class="group bg-gray-50 p-6 rounded-xl border border-gray-100 flex items-start gap-5 transition-all duration-500 hover:bg-black hover:border-black shadow-sm hover:shadow-2xl">
                        <div
                            class="w-14 h-14 bg-white text-brand-blue rounded-lg flex items-center justify-center text-2xl transition-all duration-500 group-hover:bg-brand-blue group-hover:text-black group-hover:rotate-[360deg]">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-black font-title mb-2 group-hover:text-white transition-colors">
                                Jam Operasional
                            </h4>

                            <div
                                class="grid grid-cols-[auto_1fr] gap-x-2 text-gray-600 text-sm font-body font-bold group-hover:text-gray-300 transition-colors">

                                <span class="whitespace-nowrap">Senin - Jumat</span>
                                <span>: {{ $settings['working_hours'] }}</span>

                                <span class="whitespace-nowrap">Sabtu</span>
                                <span>: {{ $settings['working_hours_weekly'] }}</span>

                            </div>
                        </div>
                    </div>

                </div>

                <div
                    class="w-full lg:w-3/5 min-h-[500px] rounded-2xl overflow-hidden shadow-2xl border-4 border-gray-50 relative group">
                    <iframe src="{{ $settings['maps_url'] }}"
                        class="w-full h-full border-0 grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div
                        class="absolute inset-0 bg-brand-blue/5 pointer-events-none group-hover:opacity-0 transition-opacity">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const heroItems = document.querySelectorAll('.hero-item');
            const heroNavs = document.querySelectorAll('.hero-nav');
            let currentIndex = 0;
            let heroTimeout;

            // Fungsi untuk cek apakah device saat ini adalah mobile/tablet (< 1024px)
            const isMobile = () => window.innerWidth < 1024;

            // Fungsi cerdas untuk mencari index slide berikutnya yang "Boleh Tampil"
            function getNextValidIndex(startIndex) {
                let nextIndex = startIndex;
                let attempts = 0;
                const maxAttempts = heroItems.length; // Mencegah infinite loop

                while (attempts < maxAttempts) {
                    const isVideo = heroItems[nextIndex].getAttribute('data-is-video') === 'true';

                    // Jika di desktop, semua slide boleh tampil.
                    // Jika di mobile, HANYA video yang boleh tampil.
                    if (!isMobile() || isVideo) {
                        return nextIndex;
                    }

                    // Jika tidak valid, lompat ke index berikutnya
                    nextIndex = (nextIndex + 1) % heroItems.length;
                    attempts++;
                }
                return 0; // Fallback jika terjadi error
            }

            // Fungsi utama mengubah hero
            window.changeHero = function(targetIndex) {
                clearTimeout(heroTimeout);

                // Cari index valid terdekat (melewati gambar jika di mobile)
                const validIndex = getNextValidIndex(targetIndex);

                // 1. Sembunyikan slide aktif saat ini
                heroItems[currentIndex].classList.remove('opacity-100', 'z-10');
                heroItems[currentIndex].classList.add('opacity-0', 'z-0');
                if (heroNavs[currentIndex]) {
                    heroNavs[currentIndex].classList.remove('active');
                    const currentProgressBar = heroNavs[currentIndex].querySelector('.progress-bar');
                    if (currentProgressBar) {
                        currentProgressBar.style.width = '0';
                        currentProgressBar.style.transitionDuration = '0s';
                    }
                }

                // 2. Tampilkan slide baru yang valid
                currentIndex = validIndex;
                heroItems[currentIndex].classList.remove('opacity-0', 'z-0');
                heroItems[currentIndex].classList.add('opacity-100', 'z-10');

                const duration = parseInt(heroItems[currentIndex].getAttribute('data-duration')) || 5000;

                if (heroNavs[currentIndex]) {
                    heroNavs[currentIndex].classList.add('active');
                    const newProgressBar = heroNavs[currentIndex].querySelector('.progress-bar');

                    if (newProgressBar) {
                        // Jeda sedikit agar CSS transition bekerja sempurna
                        setTimeout(() => {
                            newProgressBar.style.transitionDuration = `${duration}ms`;
                            newProgressBar.style.width = '100%';
                        }, 50);
                    }
                }

                // 3. Set timer untuk slide berikutnya
                heroTimeout = setTimeout(() => {
                    let nextTarget = (currentIndex + 1) % heroItems.length;
                    changeHero(nextTarget);
                }, duration);
            };

            // --- INISIALISASI SAAT PERTAMA KALI HALAMAN DIMUAT ---

            // Cek apakah slide pertama (index 0) adalah gambar dan user memakai HP.
            // Jika iya, langsung paksa lompat ke slide video pertama tanpa menunggu.
            let initialIndex = getNextValidIndex(0);

            if (initialIndex !== 0) {
                changeHero(initialIndex);
            } else {
                // Jika slide pertama valid (Video/Desktop), jalankan animasi progress bar awal
                const duration = parseInt(heroItems[0].getAttribute('data-duration')) || 5000;
                const firstProgressBar = heroNavs[0] ? heroNavs[0].querySelector('.progress-bar') : null;

                if (firstProgressBar) {
                    setTimeout(() => {
                        firstProgressBar.style.transitionDuration = `${duration}ms`;
                        firstProgressBar.style.width = '100%';
                    }, 50);
                }

                heroTimeout = setTimeout(() => {
                    changeHero(1);
                }, duration);
            }

            // --- OPSIONAL: DETEKSI RESIZE LAYAR ---
            // Jika user me-resize layar dari desktop ke mobile secara real-time
            window.addEventListener('resize', () => {
                if (isMobile()) {
                    const isVideo = heroItems[currentIndex].getAttribute('data-is-video') === 'true';
                    // Jika tiba-tiba layar jadi kecil dan slide aktif adalah gambar, langsung ganti ke video
                    if (!isVideo) {
                        changeHero((currentIndex + 1) % heroItems.length);
                    }
                }
            });
        });
    </script>
@endsection
