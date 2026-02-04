@extends('layouts.app')

@section('content')

<section id="home" class="relative h-screen w-full overflow-hidden flex items-center bg-white">
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="absolute inset-0 w-full h-full flex items-center justify-center">
            <iframe
                class="pointer-events-none absolute opacity-30 grayscale"
                style="width: 100vw; height: 56.25vw; min-height: 150vh; min-width: 205vh; object-fit: cover; top: 50%; left: 50%; transform: translate(-50%, -50%) scale(1.1);"
                src="https://www.youtube.com/embed/vu4TUHOP4fA?autoplay=1&mute=1&loop=1&playlist=vu4TUHOP4fA&controls=0&showinfo=0&rel=0&iv_load_policy=3&modestbranding=1&enablejsapi=1"
                frameborder="0"
                allow="autoplay; encrypted-media">
            </iframe>
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-transparent"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-black">
        <div class="max-w-3xl">
            <span class="inline-block py-1 px-3 mb-4 text-xs font-bold tracking-widest text-brand-blue uppercase bg-blue-50 rounded">Professional Security & Tech</span>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 tracking-tighter">
                Koneksi Tanpa Batas, <br>
                <span class="text-brand-blue">Keamanan Terjamin.</span>
            </h1>
            <p class="text-lg md:text-xl mb-10 text-gray-600 leading-relaxed">
                Solusi High-Speed Internet, Sistem Keamanan CCTV, dan Pelacakan GPS untuk masa depan yang lebih aman.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#services" class="bg-black hover:bg-brand-blue text-white font-semibold px-8 py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-blue-200">
                    Eksplor Layanan
                </a>
                <a href="#contact" class="bg-transparent border-2 border-black hover:bg-black hover:text-white text-black font-semibold px-8 py-4 rounded-full transition-all duration-300">
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</section>

<section id="services" class="py-32 bg-white overflow-hidden relative" data-aos="fade-up">
    <div class="absolute -top-10 -left-10 text-[12rem] font-black text-gray-100/60 select-none pointer-events-none leading-none z-0 font-title tracking-tighter">
        SOLUTIONS
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-center mb-24 gap-6">
            <p class="text-gray-500 max-w-xs text-center md:text-left font-body text-sm order-2 md:order-1">
                Integrasi teknologi mutakhir untuk menunjang produktivitas dan keamanan aset Anda secara real-time.
            </p>

            <div class="h-px flex-grow bg-gray-200 mx-8 hidden md:block order-2"></div>

            <div class="text-center md:text-right order-1 md:order-3">
                <h4 class="text-brand-blue font-bold tracking-[0.3em] uppercase text-xs mb-3 font-title">What We Do</h4>
                <h2 class="text-4xl md:text-5xl font-extrabold text-black tracking-tight font-title">Layanan Kami</h2>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="group relative bg-black rounded-[2rem] h-[520px] overflow-hidden transition-all duration-700 shadow-xl">
                <img src="{{ asset('storage/' . $service->image_path) }}"
                    class="absolute inset-0 w-full h-full object-cover opacity-60 grayscale transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0 group-hover:opacity-40"
                    alt="{{ $service->title }}">

                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>

                <div class="absolute top-8 right-8 w-14 h-14 bg-brand-blue text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg z-20 transform rotate-3 group-hover:rotate-0 transition-transform duration-500">
                    <i class="fa-solid {{ $service->icon }}"></i>
                </div>

                <div class="absolute inset-x-0 bottom-0 p-8 z-20 transition-all duration-500 translate-y-[180px] group-hover:translate-y-0">
                    <h3 class="text-2xl font-bold text-white mb-4 font-title">{{ $service->title }}</h3>

                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                        <p class="text-gray-300 text-sm mb-6 leading-relaxed font-body">
                            {{ $service->short_description }}
                        </p>

                        <div class="flex flex-wrap gap-2 mb-8">
                            @php
                            $features = json_decode($service->features, true);
                            if (is_string($features)) $features = json_decode($features, true);
                            @endphp
                            @if(is_array($features))
                            @foreach(array_slice($features, 0, 3) as $feature)
                            <span class="text-[9px] uppercase tracking-widest bg-white/10 backdrop-blur-md text-white px-3 py-1.5 rounded-lg border border-white/10">
                                {{ $feature }}
                            </span>
                            @endforeach
                            @endif
                        </div>

                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['phone'] ?? '') }}"
                            class="inline-block w-full text-center bg-white text-black font-bold py-4 rounded-xl transition-all hover:bg-brand-blue hover:text-white shadow-lg">
                            Mulai Konsultasi
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="testimonials" class="bg-[#fafafa] py-32 overflow-hidden relative" data-aos="fade-up">
    <div class="absolute inset-0 opacity-[0.4]" style="background-image: radial-gradient(#00AEEF 0.5px, transparent 0.5px); background-size: 24px 24px;"></div>

    <div class="absolute -top-10 -right-10 text-[15rem] font-black text-gray-200/40 select-none pointer-events-none leading-none z-0 font-title tracking-tighter">
        TRUST
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-center mb-24 gap-6">
            <div class="text-center md:text-left">
                <span class="text-brand-blue font-bold tracking-[0.4em] uppercase text-[10px] bg-blue-50 px-4 py-2 rounded-full">Testimonials</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-black tracking-tight font-title mt-6">
                    Apa Kata Klien Kami
                </h2>
            </div>
            <div class="h-px flex-grow bg-gray-300 mx-8 hidden md:block"></div>
            <p class="text-gray-500 max-w-xs text-center md:text-right font-body text-sm italic">
                Suara nyata dari mereka yang telah bertransformasi bersama solusi IT kami.
            </p>
        </div>

        <div class="swiper mySwiper !overflow-visible">
            <div class="swiper-wrapper py-10">
                @foreach($testimonials as $testi)
                <div class="swiper-slide transition-all duration-500 opacity-40 scale-90 grayscale hover:grayscale-0">
                    <div class="bg-white p-10 md:p-14 rounded-[2.5rem] shadow-[0_20px_60px_rgba(0,0,0,0.03)] border border-gray-100 relative">

                        <div class="absolute top-10 right-10 text-gray-100">
                            <i class="fa-solid fa-quote-right text-6xl"></i>
                        </div>

                        <div class="flex gap-1 mb-8 text-brand-blue relative z-10">
                            @for($i=0; $i < ($testi->stars ?? 5); $i++)
                                <i class="fas fa-star text-xs"></i>
                                @endfor
                        </div>

                        <p class="text-gray-700 text-xl md:text-2xl leading-relaxed mb-12 font-medium relative z-10 font-body">
                            "{{ $testi->body }}"
                        </p>

                        <div class="flex items-center gap-5 relative z-10">
                            <div class="w-16 h-16 rounded-2xl bg-gray-50 flex-shrink-0 overflow-hidden border border-gray-100 flex items-center justify-center">
                                <i class="fas fa-user text-gray-300 text-3xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-black text-lg font-title">{{ $testi->client_name }}</h4>
                                <p class="text-brand-blue text-xs font-bold uppercase tracking-[0.2em]">{{ $testi->position }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="flex justify-center md:justify-start gap-4 mt-12 relative z-20">
                <div class="swiper-button-prev-custom w-14 h-14 rounded-2xl border border-gray-200 bg-white flex items-center justify-center cursor-pointer hover:bg-black hover:text-white transition-all shadow-sm">
                    <i class="fas fa-arrow-left"></i>
                </div>
                <div class="swiper-button-next-custom w-14 h-14 rounded-2xl border border-gray-200 bg-white flex items-center justify-center cursor-pointer hover:bg-black hover:text-white transition-all shadow-sm">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="partners" class="py-24 bg-gray-50 overflow-hidden relative border-y border-gray-100" data-aos="fade-up">
    <div class="absolute top-0 left-0 w-full h-full opacity-[0.03] pointer-events-none select-none uppercase font-black text-[10vw] leading-none flex flex-col justify-around overflow-hidden">
        <span class="whitespace-nowrap -ml-20">Network Trust Network Trust</span>
        <span class="whitespace-nowrap -ml-60">Reliable Partner Reliable Partner</span>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <h4 class="text-brand-blue font-bold tracking-[0.3em] uppercase text-[10px] mb-3">Our Ecosystem</h4>
            <h2 class="text-3xl font-bold text-black font-title">Dipercaya Oleh Berbagai Instansi</h2>
        </div>

        <div class="relative">
            <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-gray-50 to-transparent z-20 pointer-events-none"></div>
            <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-gray-50 to-transparent z-20 pointer-events-none"></div>

            <div class="relative flex overflow-x-hidden group py-10">
                <div class="flex animate-marquee whitespace-nowrap items-center">
                    @foreach($partners as $partner)
                    <div class="mx-10 w-44 flex items-center justify-center grayscale opacity-30 hover:grayscale-0 hover:opacity-100 transition-all duration-700 transform hover:scale-110">
                        <img src="{{ asset('storage/' . $partner->logo_path) }}"
                            alt="{{ $partner->name }}"
                            class="h-12 w-auto object-contain max-w-[140px]">
                    </div>
                    @endforeach
                </div>

                <div class="absolute top-10 flex animate-marquee2 whitespace-nowrap items-center">
                    @foreach($partners as $partner)
                    <div class="mx-10 w-44 flex items-center justify-center grayscale opacity-30 hover:grayscale-0 hover:opacity-100 transition-all duration-700 transform hover:scale-110">
                        <img src="{{ asset('storage/' . $partner->logo_path) }}"
                            alt="{{ $partner->name }}"
                            class="h-12 w-auto object-contain max-w-[140px]">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section id="team" class="py-32 bg-[#f4f7f6] overflow-hidden relative">
    <div class="absolute top-10 right-0 text-[15rem] font-bold text-gray-200/40 select-none pointer-events-none leading-none -z-0">
        TEAM
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-center mb-24 gap-6">
            <div class="text-center md:text-left">
                <h4 class="text-brand-blue font-bold tracking-[0.4em] uppercase text-xs mb-3">Our Professionals</h4>
                <h2 class="text-4xl md:text-5xl font-extrabold text-black tracking-tighter font-title">
                    The Brains Behind.
                </h2>
            </div>
            <div class="h-px flex-grow bg-gray-200 mx-8 hidden md:block"></div>
            <p class="text-gray-500 max-w-xs text-center md:text-right font-body text-sm">
                Dedikasi tinggi dalam setiap solusi teknologi yang kami hadirkan untuk Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">
            @foreach($teams as $t)
            <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="relative h-[380px] rounded-[2.5rem] overflow-hidden transition-all duration-700 shadow-xl group-hover:shadow-2xl group-hover:-translate-y-3">

                    @if($t->image_path)
                    <img src="{{ asset('storage/' . $t->image_path) }}"
                        alt="{{ $t->name }}"
                        class="w-full h-full object-cover grayscale transition-all duration-700 group-hover:grayscale-0 group-hover:scale-110">
                    @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                        <i class="fa-solid fa-user text-6xl"></i>
                    </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="absolute inset-x-0 bottom-24 p-6 translate-y-10 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        <p class="text-white text-xs italic text-center font-body">"{{ $t->quote }}"</p>
                    </div>

                    <div class="absolute inset-x-4 bottom-4 bg-white/80 backdrop-blur-md p-5 rounded-[2rem] border border-white/20 shadow-lg transition-all duration-500 group-hover:bg-brand-blue">
                        <h3 class="text-lg font-bold text-black text-center group-hover:text-white transition-colors duration-500">{{ $t->name }}</h3>
                        <p class="text-brand-blue text-[10px] font-bold uppercase tracking-[0.2em] text-center group-hover:text-white/80 transition-colors duration-500">
                            {{ $t->role }}
                        </p>
                    </div>
                </div>

                <div class="absolute -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-brand-blue/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-all duration-700"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

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
                    <div class="w-14 h-14 bg-white text-brand-blue rounded-lg flex items-center justify-center text-2xl transition-all duration-500 group-hover:bg-brand-blue group-hover:text-black group-hover:rotate-[360deg]">
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

@endsection