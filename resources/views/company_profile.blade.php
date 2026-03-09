@extends('layouts.app')

@section('content')
    <section id="home" class="relative h-screen w-full bg-black overflow-hidden">
        <div id="hero-master" class="h-full w-full">
            @foreach ($sliders as $index => $slide)
                <div class="hero-item absolute inset-0 {{ $index == 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }} transition-all duration-1000 ease-in-out"
                    data-duration="{{ $slide->duration * 1000 }}"> {{-- Durasi dari DB dikonversi ke milidetik --}}

                    <div
                        class="absolute inset-0 {{ $slide->video_url ? 'bg-gradient-to-r from-black via-black/40 to-transparent' : 'bg-brand-blue/90 mix-blend-multiply' }} z-10">
                    </div>

                    @if ($slide->video_url)
                        <iframe
                            class="absolute w-full h-full object-cover scale-[1.5] pointer-events-none grayscale brightness-[0.4]"
                            src="{{ $slide->video_url }}?autoplay=1&mute=1&loop=1&playlist={{ Str::afterLast($slide->video_url, '/') }}&controls=0&enablejsapi=1">
                        </iframe>
                    @else
                        <img src="{{ asset('storage/' . $slide->image_path) }}" class="w-full h-full object-content">
                    @endif

                    <div
                        class="container mx-auto px-6 h-full flex items-center relative z-20 {{ !$slide->video_url ? 'justify-start text-left' : '' }}">
                        <div class="{{ $slide->video_url ? 'max-w-4xl' : 'max-w-3xl' }} text-left" data-aos="fade-up">
                            {{-- Pastikan ada class text-left di pembungkus ini --}}

                            @if ($slide->video_url && $slide->nav_label)
                                <span class="text-brand-blue font-black tracking-[0.4em] text-xs uppercase mb-6 block">
                                    {{ $slide->nav_label }}
                                </span>
                            @endif

                            {{-- Judul (Title) --}}
                            @if ($slide->title)
                                <h1
                                    class="{{ $slide->video_url ? 'text-6xl md:text-[100px] leading-[0.85]' : 'text-5xl md:text-7xl mb-6 leading-tight italic' }} font-black text-white tracking-tighter">
                                    {!! $slide->title !!}
                                </h1>
                            @endif

                            {{-- Deskripsi (Subtitle) --}}
                            @if ($slide->subtitle)
                                <p
                                    class="{{ $slide->video_url ? 'text-slate-400 mt-10 text-xl max-w-xl' : 'text-white/70 text-xl font-light' }} font-body leading-relaxed">
                                    {{-- PERBAIKAN: Hapus 'mx-auto' di sini agar tidak lari ke tengah --}}
                                    {{ $slide->subtitle }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
        </div>

        {{-- Navigasi Bawah --}}
        <div class="absolute bottom-20 left-0 w-full z-30">
            <div class="container mx-auto px-6 flex items-center space-x-12">
                @foreach ($sliders as $index => $slide)
                    <button onclick="changeHero({{ $index }})"
                        class="hero-nav {{ $index == 0 ? 'active' : '' }} group flex flex-col items-start">
                        <span
                            class="text-[10px] font-black text-white tracking-widest opacity-40 group-[.active]:opacity-100 transition-all">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} {{ strtoupper($slide->nav_label) }}
                        </span>
                        <div class="progress-container h-[2px] w-32 bg-white/20 mt-2 overflow-hidden">
                            {{-- Perbaikan: Transition duration diatur di sini --}}
                            <div class="progress-bar h-full bg-brand-blue w-0 transition-all linear"
                                style="transition-duration: {{ $index == 0 ? $slide->duration . 's' : '0s' }}"></div>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>
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
