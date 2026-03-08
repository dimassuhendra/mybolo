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
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row gap-16 mb-24 items-end">
                <h2 class="text-5xl md:text-8xl font-black tracking-tighter leading-none text-slate-900">WHAT WE <br><span
                        class="text-brand-blue">DELIVER.</span></h2>
                <div class="flex-1 border-l-2 border-slate-100 pl-8 pb-2">
                    <p class="text-slate-500 max-w-sm font-body italic text-lg">"Kami tidak hanya memasang kabel, kami
                        membangun fondasi digital bisnis Anda."</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 h-auto">
                @foreach ($services as $index => $service)
                    @php
                        // Logic Layout: 1 kotak besar, sisanya variasi lebar
                        $colSpan = $index == 0 ? 'md:col-span-8' : ($index == 1 ? 'md:col-span-4' : 'md:col-span-6');
                        $bgClass =
                            $index == 0
                                ? 'bg-slate-900 text-white'
                                : ($index == 1
                                    ? 'bg-brand-blue text-white'
                                    : 'bg-slate-50 text-slate-900');
                    @endphp

                    <div
                        class="{{ $colSpan }} min-h-[400px] rounded-[3rem] p-12 relative overflow-hidden group transition-all duration-700 hover:shadow-2xl {{ $bgClass }}">
                        <div class="relative z-10 flex flex-col h-full justify-between">
                            <div>
                                <div
                                    class="w-16 h-16 rounded-2xl flex items-center justify-center mb-8 {{ $index <= 1 ? 'bg-white/10' : 'bg-brand-blue/10 text-brand-blue' }}">
                                    <i class="fa-solid {{ $service->icon }} text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold tracking-tighter mb-4">{{ $service->title }}</h3>
                                <p class="opacity-60 font-body leading-relaxed max-w-sm">{{ $service->short_description }}
                                </p>
                            </div>

                            <div class="pt-10">
                                <a href="#"
                                    class="inline-flex items-center text-[10px] font-black tracking-[0.4em] uppercase border-b-2 border-current pb-2 group-hover:gap-6 transition-all">
                                    VIEW DETAILS <i class="fa-solid fa-arrow-right-long ml-4"></i>
                                </a>
                            </div>
                        </div>
                        <i
                            class="fa-solid {{ $service->icon }} absolute -right-12 -bottom-12 text-[15rem] opacity-[0.03] group-hover:rotate-12 transition-transform duration-1000"></i>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-32 bg-slate-50 border-y border-slate-100">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center mb-16">
                <h2 class="text-4xl font-black tracking-tighter">RELASI & DOKUMEN</h2>
                <div class="flex space-x-4">
                    <button
                        class="doc-prev p-4 rounded-full border border-slate-200 hover:bg-brand-blue hover:text-white transition shadow-sm"><i
                            class="fas fa-chevron-left"></i></button>
                    <button
                        class="doc-next p-4 rounded-full border border-slate-200 hover:bg-brand-blue hover:text-white transition shadow-sm"><i
                            class="fas fa-chevron-right"></i></button>
                </div>
            </div>

            <div class="swiper docSwiper overflow-visible">
                <div class="swiper-wrapper">
                    @foreach ($services as $s)
                        <div class="swiper-slide">
                            <div
                                class="bg-white p-12 rounded-[2.5rem] h-80 flex flex-col justify-between border border-transparent hover:border-brand-blue transition-all group shadow-sm hover:shadow-xl">
                                <div>
                                    <span
                                        class="text-xs font-black text-brand-blue tracking-widest uppercase mb-4 block">Official
                                        PDF</span>
                                    <h4
                                        class="text-2xl font-bold tracking-tight leading-none group-hover:text-brand-blue transition-colors">
                                        Quotation {{ $s->title }}</h4>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-[10px] font-black text-slate-300 tracking-tighter uppercase">Available
                                        for Download</p>
                                    <div
                                        class="w-12 h-12 rounded-full bg-slate-50 flex items-center justify-center text-brand-blue group-hover:bg-brand-blue group-hover:text-white transition-all">
                                        <i class="fa-solid fa-download"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="team" class="py-32 bg-black">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-black text-white tracking-widest mb-24 uppercase">THE CORE SQUAD.</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-16">
                @foreach ($teams as $t)
                    <div class="group">
                        <div
                            class="relative w-32 h-32 md:w-44 md:h-44 mx-auto mb-8 overflow-hidden rounded-full border-2 border-white/10 p-2 group-hover:border-brand-blue transition-all duration-700">
                            <img src="{{ asset('storage/' . $t->image_path) }}"
                                class="w-full h-full object-cover rounded-full grayscale group-hover:grayscale-0 transition-all duration-700 scale-110 group-hover:scale-100">
                        </div>
                        <h4 class="text-white font-bold text-xl">{{ $t->name }}</h4>
                        <p class="text-brand-blue text-[10px] font-black tracking-[0.3em] mt-2 uppercase">
                            {{ $t->role }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
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
