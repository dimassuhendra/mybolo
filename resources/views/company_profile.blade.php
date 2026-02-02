@extends('layouts.app')

@section('content')

<section id="home" class="relative h-screen w-full overflow-hidden flex items-center">
    <div class="absolute inset-0 z-0">
        <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="{{ asset('img/2.jpg') }}" class="w-full h-full object-cover" alt="CCTV Security">
        </div>
        <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="{{ asset('img/5.jpg') }}" class="w-full h-full object-cover" alt="Internet Solution">
        </div>
        <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="{{ asset('img/3.jpg') }}" class="w-full h-full object-cover" alt="GPS Tracking">
        </div>

        <div class="absolute inset-0 bg-blue-900/60 mix-blend-multiply"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-white">
        <div class="max-w-3xl">
            <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6 transform transition duration-700 translate-y-0">
                Koneksi Tanpa Batas, <br>
                <span class="text-brand-blue">Keamanan Tanpa Celah.</span>
            </h1>
            <p class="text-lg md:text-2xl mb-10 text-gray-200">
                Teknologi Arindama Andra menyediakan solusi High-Speed Internet, Sistem Keamanan CCTV, dan Pelacakan GPS terbaik untuk bisnis dan rumah Anda.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#services" class="bg-brand-blue hover:bg-blue-600 text-white font-bold px-8 py-4 rounded-lg shadow-xl transition duration-300">
                    Eksplor Layanan
                </a>
                <a href="#contact" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-900 text-white font-bold px-8 py-4 rounded-lg transition duration-300">
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex space-x-3 z-20">
        <div class="w-12 h-1 bg-white opacity-100"></div>
        <div class="w-12 h-1 bg-white opacity-30"></div>
        <div class="w-12 h-1 bg-white opacity-30"></div>
    </div>
</section>

<section id="services" class="py-24 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Layanan Unggulan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto font-body">Solusi teknologi terintegrasi untuk keamanan dan konektivitas tanpa batas.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            @foreach($services as $service)
            <div class="flip-card">
                <div class="flip-card-inner shadow-2xl">
                    {{-- Front --}}
                    <div class="flip-card-front">
                        <img src="{{ asset('storage/' . $service->image_path) }}" class="w-full h-full object-cover" alt="{{ $service->title }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-black/20 to-transparent flex flex-col justify-end p-8 text-white">
                            <div class="mb-4 text-4xl text-brand-blue">
                                <i class="fa-solid {{ $service->icon }}"></i>
                            </div>
                            <h3 class="text-2xl font-bold font-title uppercase tracking-wider mb-2">{{ $service->title }}</h3>
                            <p class="text-sm opacity-90 font-body">{{ $service->short_description }}</p>
                        </div>
                    </div>

                    {{-- Back --}}
                    <div class="flip-card-back border-4 border-white/20">
                        <h3 class="text-2xl font-bold mb-4 font-title">{{ $service->title }}</h3>
                        <ul class="text-left text-sm space-y-3 font-body mb-8">
                            @php
                            $features = json_decode($service->features, true);
                            if (is_string($features)) $features = json_decode($features, true);
                            @endphp
                            @if(is_array($features))
                            @foreach($features as $feature)
                            @if(!empty($feature))
                            <li><i class="fa-solid fa-check mr-2"></i> {{ $feature }}</li>
                            @endif
                            @endforeach
                            @endif
                        </ul>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['phone'] ?? '') }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition transform hover:scale-105 shadow-lg">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                            Hubungi Admin
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="testimonials" class="relative overflow-hidden bg-[#0a192f] py-0" data-aos="fade-up">

    <div class="absolute top-0 left-0 w-full overflow-hidden leading-[0] z-20">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] fill-white">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>

    <div class="container mx-auto px-6 py-32 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 font-title">Apa Kata Klien Kami?</h2>
            <p class="text-blue-100 font-body opacity-80">Kepercayaan Anda adalah prioritas utama bagi Teknologi Arindama Andra.</p>
        </div>

        <div class="swiper mySwiper pb-12">
            <div class="swiper-wrapper">

                @foreach($testimonials as $testi)
                <div class="swiper-slide h-auto">
                    <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/20 h-full flex flex-col justify-between">
                        <div>
                            <div class="flex text-yellow-400 mb-6 text-sm">
                                @for($i=0; $i < ($testi->stars ?? 5); $i++)
                                    <i class="fas fa-star"></i>
                                    @endfor
                            </div>
                            <p class="text-white font-body italic text-justify mb-8">"{{ $testi->body }}"</p>
                        </div>
                        <div class="flex items-center gap-4">
                            {{-- Sesuai DB: Tidak ada image_path, gunakan icon --}}
                            <div class="w-12 h-12 rounded-full bg-brand-blue border-2 border-white/50 flex items-center justify-center text-white">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold font-title">{{ $testi->client_name }}</h4>
                                <p class="text-blue-200 text-xs">{{ $testi->position }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] fill-gray-50">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>
</section>

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

<section id="team" class="py-24 bg-[#0a192f] overflow-hidden" data-aos="fade-up">
    <div class="container mx-auto px-6 text-center">
        <div class="mb-20">
            <h4 class="text-brand-blue font-bold tracking-[0.3em] uppercase text-xs mb-3 font-title">Meet the Experts</h4>
            <h2 class="text-4xl md:text-5xl font-bold text-white font-title">Our Team</h2>
            <div class="w-20 h-1.5 bg-brand-blue mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
            @foreach($teams as $t)
            <div class="group relative pt-12">
                <div class="bg-blue-900/20 backdrop-blur-sm border border-white/10 rounded-2xl p-8 transition-all duration-500 hover:bg-brand-blue hover:-translate-y-2 group-hover:shadow-[0_0_40px_rgba(0,174,239,0.2)]">

                    <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 bg-[#0a192f] border-4 border-brand-blue rounded-full flex items-center justify-center text-white text-3xl transition-all duration-500 group-hover:bg-white group-hover:text-brand-blue group-hover:scale-110 shadow-xl z-10">
                        <i class="fa-solid {{ $t->icon }}"></i>
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

<section id="contact" class="py-24 bg-gray-50" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h4 class="text-brand-blue font-bold tracking-[0.2em] uppercase text-xs mb-3 font-title">Get In Touch</h4>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 font-title">Hubungi Kami</h2>
            <p class="text-gray-500 mt-4 font-body max-w-2xl mx-auto">Siap meningkatkan keamanan dan konektivitas Anda? Tim kami siap membantu memberikan solusi terbaik.</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-12 items-start">
            <div class="w-full lg:w-2/5 grid grid-cols-1 gap-6">

                <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-start gap-5 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-50 text-brand-blue rounded-xl flex items-center justify-center text-2xl transition-colors duration-300 group-hover:bg-brand-blue group-hover:text-white">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 font-title mb-1">Lokasi Kantor</h4>
                        <p class="text-gray-600 text-sm font-body leading-relaxed">{{ $settings['address'] }}</p>
                    </div>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-start gap-5 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-50 text-brand-blue rounded-xl flex items-center justify-center text-2xl transition-colors duration-300 group-hover:bg-brand-blue group-hover:text-white">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 font-title mb-1">Telepon / WhatsApp</h4>
                        <p class="text-gray-600 text-sm font-body">{{ $settings['phone'] }}</p>
                    </div>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-start gap-5 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-50 text-brand-blue rounded-xl flex items-center justify-center text-2xl transition-colors duration-300 group-hover:bg-brand-blue group-hover:text-white">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 font-title mb-1">Email Support</h4>
                        <p class="text-gray-600 text-sm font-body">{{ $settings['email'] }}</p>
                    </div>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-start gap-5 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-50 text-brand-blue rounded-xl flex items-center justify-center text-2xl transition-colors duration-300 group-hover:bg-brand-blue group-hover:text-white">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 font-title mb-1">Jam Operasional</h4>
                        <p class="text-gray-600 text-sm font-body font-bold">{{ $settings['working_hours'] }}</p>
                    </div>
                </div>

            </div>

            <div class="w-full lg:w-3/5 h-[530px] rounded-3xl overflow-hidden shadow-2xl border-8 border-white">
                <iframe
                    src="{{ $settings['maps_url'] }}"
                    class="w-full h-full border-0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>


        </div>
    </div>
</section>

@endsection