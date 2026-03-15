@extends('layouts.app')

@section('content') 
    <section id="home" class="relative h-screen w-full overflow-hidden">
        <div id="hero-master" class="h-full w-full">
            @foreach ($sliders as $index => $slide)
                <div class="hero-item absolute inset-0 {{ $index == 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }} transition-all duration-1000 ease-in-out"
                    data-duration="{{ $slide->duration * 1000 }}">

                    {{-- Background Media Container --}}
                    <div class="absolute inset-0 z-0 overflow-hidden">
                        <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                            @if ($slide->video_url)
                                {{-- PENYESUAIAN LOGIKA FULL SCREEN --}}
                                <iframe class="pointer-events-none absolute grayscale brightness-[0.9]"
                                    style="
                                    width: 100vw; 
                                    height: 56.25vw; /* Aspek rasio 16:9 */
                                    min-height: 150vh; /* Memastikan tinggi melebihi layar HP */
                                    min-width: 205vh;  /* Memastikan lebar melebihi layar HP */
                                    object-fit: cover;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%) scale(1.1); /* Zoom untuk buang border hitam */
                                "
                                    src="{{ $slide->video_url }}?autoplay=1&mute=1&loop=1&playlist={{ Str::afterLast($slide->video_url, '/') }}&controls=0&showinfo=0&rel=0&iv_load_policy=3&modestbranding=1&enablejsapi=1"
                                    frameborder="0" allow="autoplay; encrypted-media">
                                </iframe>
                            @else
                                {{-- Image menggunakan object-cover agar konsisten full screen --}}
                                <img src="{{ asset('storage/' . $slide->image_path) }}"
                                    class="w-full h-full object-cover object-center" alt="Hero Image">
                            @endif
                        </div>

                        {{-- Overlay Layer --}}
                        <div
                            class="absolute inset-0 {{ $slide->video_url ? 'bg-indigo-950/60' : 'bg-brand-blue/80' }} mix-blend-multiply z-10">
                        </div>
                        {{-- Opsional: Tambahkan gradient jika ingin teks lebih terbaca seperti kode sebelumnya --}}
                        @if ($slide->video_url)
                            <div class="absolute inset-0 bg-gradient-to-r from-black via-black/40 to-transparent z-15">
                            </div>
                        @endif
                    </div>

                    {{-- Content --}}
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
                {{-- 
            Grid System: 
            - grid-cols-2 atau grid-cols-3 sesuai jumlah slide di mobile agar rapi.
            - md:flex agar kembali ke tampilan memanjang di laptop.
        --}}
                <div
                    class="flex flex-row md:flex-row items-center justify-start gap-4 md:space-x-12 overflow-x-auto no-scrollbar pb-4 md:pb-0">
                    @foreach ($sliders as $index => $slide)
                        <button onclick="changeHero({{ $index }})"
                            class="hero-nav {{ $index == 0 ? 'active' : '' }} group flex flex-col items-start focus:outline-none min-w-[120px] md:min-w-0 flex-shrink-0">

                            <span
                                class="text-[8px] md:text-[10px] font-black text-white tracking-widest opacity-40 group-[.active]:opacity-100 transition-all uppercase whitespace-nowrap">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} {{ $slide->nav_label }}
                            </span>

                            <div class="progress-container h-[2px] w-full md:w-32 bg-white/20 mt-2 overflow-hidden">
                                {{-- Lebar bar (w-full) akan mengikuti lebar tombol min-w-[120px] di mobile --}}
                                <div class="progress-bar h-full bg-brand-blue w-0 transition-all linear"
                                    style="transition-duration: {{ $index == 0 ? $slide->duration . 's' : '0s' }}"></div>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Tambahkan CSS ini di file master atau bagian @push('css') agar scrollbar tidak muncul tapi tetap bisa di-swipe --}}
        <style>
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
    </section>

    <section id="services" class="py-32 bg-white overflow-hidden relative" data-aos="fade-up">
        @include('sections.service')
    </section>

    <section id="testimonials" class="bg-black py-24 text-white">
        @include('sections.testimonial')
    </section>

    <section id="partners" class="bg-white py-12">
        @include('sections.partner', ['partners' => $partners])
    </section>

    <section id="team" class="py-24 bg-black overflow-hidden" data-aos="fade-up">
        @include('sections.team')
    </section>

    <section id="contact" class="py-24 bg-white" data-aos="fade-up">
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
                                Telepon / WhatsApp</h4>
                            <p class="text-gray-600 text-sm font-body group-hover:text-gray-300 transition-colors">
                                {{ $settings['phone'] }}</p>
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
                            <h4 class="font-bold text-black font-title mb-1 group-hover:text-white transition-colors">Jam
                                Operasional</h4>
                            <p
                                class="text-gray-600 text-sm font-body font-bold group-hover:text-gray-300 transition-colors">
                                {{ $settings['working_hours'] }}</p>
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
        // ==============================================
        // Js untuk section Hero
        // ==============================================
        const items = document.querySelectorAll('.hero-item');
        const navs = document.querySelectorAll('.hero-nav');
        const bars = document.querySelectorAll('.progress-bar');
        let idx = 0;
        let heroTimeout;

        function changeHero(i) {
            clearTimeout(heroTimeout);

            items.forEach((el, index) => {
                // Sembunyikan slide
                el.style.opacity = '0';
                el.style.zIndex = '0';
                el.style.visibility = 'hidden'; // Tambahan agar teks benar-benar reset

                navs[index].classList.remove('active');

                // Reset Bar
                bars[index].style.transition = 'none';
                bars[index].style.width = '0%';
            });

            // Aktifkan slide terpilih
            items[i].style.visibility = 'visible';
            items[i].style.opacity = '1';
            items[i].style.zIndex = '10';
            navs[i].classList.add('active');

            const durationMs = parseInt(items[i].getAttribute('data-duration')) || 5000;

            // Jalankan Bar
            setTimeout(() => {
                bars[i].style.transition = `width ${durationMs}ms linear`;
                bars[i].style.width = '100%';
            }, 50);

            idx = i;

            heroTimeout = setTimeout(() => {
                let next = (idx + 1) % items.length;
                changeHero(next);
            }, durationMs);
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (items.length > 0) changeHero(0);
        });
    </script>
@endsection
