@extends('layouts.app')

@section('content')

<section id="home" class="relative h-screen w-full overflow-hidden flex items-center bg-black">
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="absolute inset-0 w-full h-full flex items-center justify-center">
            <iframe
                class="pointer-events-none absolute grayscale brightness-50"
                style="
                width: 100vw; 
                height: 56.25vw; 
                min-height: 150vh; 
                min-width: 205vh; 
                object-fit: cover;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) scale(1.1);
            "
                src="https://www.youtube.com/embed/vu4TUHOP4fA?autoplay=1&mute=1&loop=1&playlist=vu4TUHOP4fA&controls=0&showinfo=0&rel=0&iv_load_policy=3&modestbranding=1&start=0&end=30&enablejsapi=1"
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen>
            </iframe>
        </div>
        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-white">
        <div class="max-w-3xl">
            <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6">
                Koneksi Tanpa Batas, <br>
                <span class="text-white-500">Keamanan Tanpa Celah.</span>
            </h1>
            <p class="text-lg md:text-2xl mb-10 text-gray-300">
                Teknologi Arindama Andra menyediakan solusi High-Speed Internet, Sistem Keamanan CCTV, dan Pelacakan GPS profesional.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#services" class="bg-brand-blue hover:bg-white text-white hover:text-black font-bold px-8 py-4 rounded-md transition duration-300">
                    Eksplor Layanan
                </a>
                <a href="#contact" class="bg-transparent border-2 border-white hover:bg-white hover:text-black text-white font-bold px-8 py-4 rounded-md transition duration-300">
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</section>

<section id="services" class="py-24 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-black tracking-tight">Layanan Unggulan</h2>
            <div class="w-16 h-1 bg-brand-blue mx-auto"></div>
            <p class="text-gray-500 mt-6 max-w-2xl mx-auto font-body">Solusi teknologi terintegrasi untuk keamanan dan konektivitas tanpa batas.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="group relative overflow-hidden bg-black rounded-xl h-[450px] cursor-pointer shadow-xl">
                <img src="{{ asset('storage/' . $service->image_path) }}"
                    class="w-full h-full object-cover grayscale transition-all duration-700 group-hover:scale-110 group-hover:blur-sm opacity-60"
                    alt="{{ $service->title }}">

                <div class="absolute inset-0 p-8 flex flex-col justify-end bg-gradient-to-t from-black via-black/20 to-transparent transition-opacity duration-500 group-hover:opacity-0">
                    <div class="mb-4 text-4xl text-white">
                        <i class="fa-solid {{ $service->icon }}"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white uppercase tracking-wider mb-2">{{ $service->title }}</h3>
                    <p class="text-gray-300 text-sm line-clamp-2">{{ $service->short_description }}</p>
                </div>

                <div class="absolute inset-0 bg-brand-blue translate-y-full transition-transform duration-1000 ease-in-out group-hover:translate-y-0 p-8 flex flex-col justify-center text-white">
                    <h3 class="text-2xl font-bold mb-6 border-b border-white/30 pb-4">{{ $service->title }}</h3>

                    <ul class="space-y-3 mb-8">
                        @php
                        $features = json_decode($service->features, true);
                        if (is_string($features)) $features = json_decode($features, true);
                        @endphp
                        @if(is_array($features))
                        @foreach($features as $feature)
                        @if(!empty($feature))
                        <li class="flex items-center text-sm font-medium">
                            <i class="fa-solid fa-circle-check mr-3 text-white/80"></i>
                            {{ $feature }}
                        </li>
                        @endif
                        @endforeach
                        @endif
                    </ul>

                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['phone'] ?? '') }}"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-2 bg-white text-brand-blue font-bold py-3 px-6 rounded-lg transition-all hover:bg-black hover:text-white">
                        <i class="fa-brands fa-whatsapp text-xl"></i>
                        Konsultasi Sekarang
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="testimonials" class="bg-black py-24 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Kepercayaan Klien</h2>
            <p class="text-gray-400">Apa yang mereka katakan tentang layanan kami.</p>
        </div>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($testimonials as $testi)
                <div class="swiper-slide">
                    <div class="bg-zinc-900 p-10 border border-zinc-800 rounded-lg">
                        <div class="flex text-brand-blue mb-6">
                            @for($i=0; $i < ($testi->stars ?? 5); $i++)
                                <i class="fas fa-star text-xs"></i>
                                @endfor
                        </div>
                        <p class="text-gray-300 italic mb-8">"{{ $testi->body }}"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-zinc-800 flex items-center justify-center">
                                <i class="fas fa-user text-zinc-500"></i>
                            </div>
                            <div>
                                <h4 class="font-bold">{{ $testi->client_name }}</h4>
                                <p class="text-zinc-500 text-xs">{{ $testi->position }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="w-full rotate-180 bg-black">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] fill-gray-50">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
    </svg>
</div>
<section id="partners" class="py-20 bg-gray-50 overflow-hidden" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h4 class="text-brand-blue font-bold tracking-[0.2em] uppercase text-sm mb-2 font-title">Network & Trust</h4>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 font-title">Partner Bisnis Kami</h2>
            <p class="text-gray-500 mt-4 font-body max-w-xl mx-auto">Kami bekerja sama dengan berbagai vendor dan instansi terkemuka untuk memberikan layanan terbaik bagi Anda.</p>
        </div>

        <div class="relative flex overflow-x-hidden group">
            <div class="flex animate-marquee whitespace-nowrap py-12 items-center">
                @foreach($partners as $partner)
                <div class="mx-8 w-40 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-500">
                    <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}" class="h-12 object-contain mx-auto">
                </div>
                @endforeach
            </div>

            <div class="absolute top-0 flex animate-marquee2 whitespace-nowrap py-12 items-center">
                @foreach($partners as $partner)
                <div class="mx-8 w-40 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-500">
                    <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}" class="h-12 object-contain mx-auto">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section id="team" class="py-24 bg-black overflow-hidden" data-aos="fade-up">
    <div class="container mx-auto px-6 text-center">
        <div class="mb-20">
            <h4 class="text-brand-blue font-bold tracking-[0.3em] uppercase text-xs mb-3 font-title">Meet the Experts</h4>
            <h2 class="text-4xl md:text-5xl font-bold text-white font-title">Our Team</h2>
            <div class="w-20 h-1.5 bg-brand-blue mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
            @foreach($teams as $t)
            <div class="group relative pt-12">
                <div class="bg-zinc-900/40 backdrop-blur-sm border border-white/10 rounded-2xl p-8 transition-all duration-500 hover:bg-brand-blue hover:-translate-y-2 group-hover:shadow-[0_0_40px_rgba(0,174,239,0.2)]">

                    <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 group">
                        <div class="absolute -inset-2 border-2 border-dashed border-brand-blue rounded-xl animate-[spin_15s_linear_infinite] z-0 opacity-60"></div>
                        <div class="absolute -inset-2 border-2 border-dashed border-brand-blue rounded-xl animate-[spin_8s_linear_infinite] z-0 opacity-60"></div>

                        <div class="absolute inset-0 bg-zinc-900 border-4 border-brand-blue rounded-xl flex items-center justify-center overflow-hidden transition-all duration-500 group-hover:scale-110 shadow-xl z-10">
                            @if($t->image_path)
                            <img src="{{ asset('storage/' . $t->image_path) }}"
                                alt="{{ $t->name }}"
                                class="w-full h-full object-cover grayscale transition-all duration-700 group-hover:grayscale-0">
                            @else
                            <i class="fa-solid fa-user text-white text-3xl"></i>
                            @endif
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-white font-title mb-1">{{ $t->name }}</h3>
                        <p class="text-brand-blue font-bold text-xs uppercase tracking-widest font-title group-hover:text-white transition-colors">
                            {{ $t->role }}
                        </p>

                        <div class="mt-4 pt-4 border-t border-white/10 group-hover:border-white/20">
                            <p class="text-gray-400 text-sm font-body italic transition-colors group-hover:text-white/90">
                                "{{ $t->quote }}"
                            </p>
                        </div>
                    </div>

                    <div class="absolute inset-0 rounded-2xl overflow-hidden opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity">
                        <div class="absolute -top-1/2 -left-1/2 w-full h-full bg-white/10 rotate-45 transform transition-transform duration-700 group-hover:translate-x-full"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="contact" class="py-24 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <div class="text-center mb-20">
            <h4 class="text-brand-blue font-bold tracking-[0.3em] uppercase text-xs mb-3 font-title">Get In Touch</h4>
            <h2 class="text-4xl md:text-5xl font-bold text-black font-title">Hubungi Kami</h2>
            <div class="w-16 h-1 bg-brand-blue mx-auto mt-6"></div>
            <p class="text-gray-500 mt-6 font-body max-w-2xl mx-auto italic">Siap meningkatkan keamanan dan konektivitas Anda? Tim kami siap membantu memberikan solusi terbaik.</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-12 items-stretch">
            <div class="w-full lg:w-2/5 grid grid-cols-1 gap-4">

                <div class="group bg-gray-50 p-6 rounded-xl border border-gray-100 flex items-start gap-5 transition-all duration-500 hover:bg-black hover:border-black shadow-sm hover:shadow-2xl">
                    <div class="w-14 h-14 bg-white text-brand-blue rounded-lg flex items-center justify-center text-2xl transition-all duration-500 group-hover:bg-brand-blue group-hover:text-black group-hover:rotate-[360deg]">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-black font-title mb-1 group-hover:text-white transition-colors">Lokasi Kantor</h4>
                        <p class="text-gray-600 text-sm font-body leading-relaxed group-hover:text-gray-300 transition-colors">{{ $settings['address'] }}</p>
                    </div>
                </div>

                <div class="group bg-gray-50 p-6 rounded-xl border border-gray-100 flex items-start gap-5 transition-all duration-500 hover:bg-black hover:border-black shadow-sm hover:shadow-2xl">
                    <div class="w-14 h-14 bg-white text-brand-blue rounded-lg flex items-center justify-center text-2xl transition-all duration-500 group-hover:bg-brand-blue group-hover:text-black group-hover:rotate-[360deg]">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-black font-title mb-1 group-hover:text-white transition-colors">Telepon / WhatsApp</h4>
                        <p class="text-gray-600 text-sm font-body group-hover:text-gray-300 transition-colors">{{ $settings['phone'] }}</p>
                    </div>
                </div>

                <div class="group bg-gray-50 p-6 rounded-xl border border-gray-100 flex items-start gap-5 transition-all duration-500 hover:bg-black hover:border-black shadow-sm hover:shadow-2xl">
                    <div class="w-14 h-14 bg-white text-brand-blue rounded-lg flex items-center justify-center text-2xl transition-all duration-500 group-hover:bg-brand-blue group-hover:text-black group-hover:rotate-[360deg]">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-black font-title mb-1 group-hover:text-white transition-colors">Email Support</h4>
                        <p class="text-gray-600 text-sm font-body group-hover:text-gray-300 transition-colors">{{ $settings['email'] }}</p>
                    </div>
                </div>

                <div class="group bg-gray-50 p-6 rounded-xl border border-gray-100 flex items-start gap-5 transition-all duration-500 hover:bg-black hover:border-black shadow-sm hover:shadow-2xl">
                    <div class="w-14 h-14 bg-white text-brand-blue rounded-lg flex items-center justify-center text-2xl transition-all duration-500 group-hover:bg-brand-blue group-hover:text-black group-hover:rotate-[360deg]">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-black font-title mb-1 group-hover:text-white transition-colors">Jam Operasional</h4>
                        <p class="text-gray-600 text-sm font-body font-bold group-hover:text-gray-300 transition-colors">{{ $settings['working_hours'] }}</p>
                    </div>
                </div>

            </div>

            <div class="w-full lg:w-3/5 min-h-[500px] rounded-2xl overflow-hidden shadow-2xl border-4 border-gray-50 relative group">
                <iframe
                    src="{{ $settings['maps_url'] }}"
                    class="w-full h-full border-0 grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="absolute inset-0 bg-brand-blue/5 pointer-events-none group-hover:opacity-0 transition-opacity"></div>
            </div>

        </div>
    </div>
</section>

@endsection