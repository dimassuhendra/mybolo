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
                        <img src="{{ asset('storage/' . $slide->image_path) }}" class="w-full h-full object-cover">
                    @endif

                    <div
                        class="container mx-auto px-6 h-full flex items-center relative z-20 {{ !$slide->video_url ? 'justify-center text-center' : '' }}">
                        <div class="{{ $slide->video_url ? 'max-w-4xl' : 'max-w-3xl' }}" data-aos="fade-up">

                            {{-- Perbaikan: Memastikan label navigasi muncul di atas jika video --}}
                            @if ($slide->video_url && $slide->nav_label)
                                <span class="text-brand-blue font-black tracking-[0.4em] text-xs uppercase mb-6 block">
                                    {{ $slide->nav_label }}
                                </span>
                            @endif

                            {{-- Menampilkan Judul (Title) --}}
                            @if ($slide->title)
                                <h1
                                    class="{{ $slide->video_url ? 'text-6xl md:text-[100px] leading-[0.85]' : 'text-5xl md:text-7xl mb-6 leading-tight italic' }} font-black text-white tracking-tighter">
                                    {!! $slide->title !!}
                                </h1>
                            @endif

                            {{-- Menampilkan Deskripsi (Subtitle) --}}
                            @if ($slide->subtitle)
                                <p
                                    class="{{ $slide->video_url ? 'text-slate-400 mt-10 text-xl max-w-xl' : 'text-white/70 text-xl font-light' }} font-body leading-relaxed mx-auto">
                                    {{ $slide->subtitle }}
                                </p>
                            @endif
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

    <section id="services" class="py-32 bg-white">
        @include('sections.service')
    </section>

    <section id="partners" class="bg-white py-12">
        <div class="text-center mb-16">
            <span class="text-brand-blue font-bold tracking-[0.2em] uppercase text-xs mb-3 block">
                Trusted Network
            </span>

            <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-6">
                Our <span class="text-brand-blue">Partners.</span>
            </h2>

            <div class="flex justify-center">
                <p class="text-slate-500 max-w-xl text-lg font-light leading-relaxed">
                    Bekerja sama dengan institusi terpercaya untuk menghadirkan solusi digital standar global.
                </p>
            </div>

            <div class="w-12 h-1 bg-brand-blue mx-auto mt-8"></div>
        </div>

        @include('sections.partner', ['partners' => $partners])
    </section>

    <section id="team" class="py-32 bg-black">
        @include('sections.team')
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
