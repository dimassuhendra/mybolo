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
                <span class="text-blue-500">Keamanan Tanpa Celah.</span>
            </h1>
            <p class="text-lg md:text-2xl mb-10 text-gray-300">
                Teknologi Arindama Andra menyediakan solusi High-Speed Internet, Sistem Keamanan CCTV, dan Pelacakan GPS profesional.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#services" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-4 rounded-md transition duration-300">
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
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-black">Layanan Unggulan</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-6"></div>
            <p class="text-gray-500 max-w-2xl mx-auto">Solusi teknologi terintegrasi untuk keamanan dan konektivitas bisnis Anda.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            @foreach($services as $service)
            <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-600">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('storage/' . $service->image_path) }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500" alt="{{ $service->title }}">
                    <div class="absolute inset-0 bg-black/40"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <i class="fa-solid {{ $service->icon }} text-3xl mb-2 text-blue-500"></i>
                        <h3 class="text-xl font-bold uppercase">{{ $service->title }}</h3>
                    </div>
                </div>
                <div class="p-8">
                    <p class="text-gray-600 text-sm mb-6">{{ $service->short_description }}</p>
                    <ul class="text-sm space-y-2 mb-8 text-gray-700">
                        @php
                        $features = json_decode($service->features, true);
                        if (is_string($features)) $features = json_decode($features, true);
                        @endphp
                        @if(is_array($features))
                        @foreach($features as $feature)
                        <li class="flex items-center"><i class="fa-solid fa-check text-blue-600 mr-2"></i> {{ $feature }}</li>
                        @endforeach
                        @endif
                    </ul>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['phone'] ?? '') }}"
                        class="block text-center border-2 border-black hover:bg-black hover:text-white text-black font-bold py-3 rounded-md transition">
                        Hubungi Admin
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
                        <div class="flex text-blue-600 mb-6">
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

<section id="partners" class="py-16 bg-white border-y border-gray-100">
    <div class="container mx-auto px-6">
        <div class="flex flex-wrap justify-center items-center gap-12 opacity-50">
            @foreach($partners as $partner)
            <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}" class="h-8 grayscale hover:grayscale-0 transition duration-300">
            @endforeach
        </div>
    </div>
</section>

<section id="contact" class="py-24 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h4 class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-4">Kontak Kami</h4>
                <h2 class="text-4xl md:text-5xl font-bold text-black mb-8">Mari Mulai Kerjasama.</h2>

                <div class="space-y-8">
                    <div class="flex gap-6">
                        <div class="text-blue-600 text-2xl"><i class="fa-solid fa-location-dot"></i></div>
                        <div>
                            <h4 class="font-bold text-lg">Alamat</h4>
                            <p class="text-gray-600">{{ $settings['address'] }}</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="text-blue-600 text-2xl"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <h4 class="font-bold text-lg">Telepon</h4>
                            <p class="text-gray-600">{{ $settings['phone'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-[400px] rounded-2xl overflow-hidden grayscale contrast-125 border border-gray-200">
                <iframe
                    src="{{ $settings['maps_url'] }}"
                    class="w-full h-full border-0"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>

@endsection