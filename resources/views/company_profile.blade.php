@extends('layouts.app')

@section('content')
    @extends('partials.lampion') <!-- Lampion kiri kanan diatas -->

    <section id="home" class="relative h-screen w-full overflow-hidden flex items-center bg-black">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                <iframe class="pointer-events-none absolute grayscale brightness-50"
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
                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                </iframe>
            </div>
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-white">
            <div class="max-w-3xl">
                <p class="text-red-500 font-bold tracking-widest mb-2">🏮 HAPPY CHINESE NEW YEAR 🏮</p>
                <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6">
                    Koneksi Tanpa Batas, <br>
                    <span class="text-white-500">Keamanan Tanpa Celah.</span>
                </h1>
                <p class="text-lg md:text-2xl mb-10 text-gray-300">
                    MyBolo menyediakan solusi High-Speed Internet, Sistem Keamanan CCTV, dan Pelacakan GPS profesional.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#services"
                        class="bg-brand-blue hover:bg-white text-white hover:text-black font-bold px-8 py-4 rounded-md transition duration-300">
                        Eksplor Layanan
                    </a>
                    <a href="#contact"
                        class="bg-transparent border-2 border-white hover:bg-white hover:text-black text-white font-bold px-8 py-4 rounded-md transition duration-300">
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="py-32 bg-white overflow-hidden relative" data-aos="fade-up">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-12">
                <h4 class="text-brand-blue font-bold tracking-[0.2em] uppercase text-sm mb-2 font-title">Solutions &
                    Expertise</h4>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 font-title">Layanan Kami</h2>
                <p class="text-gray-500 mt-4 font-body max-w-xl mx-auto">Kami menghadirkan berbagai layanan teknologi
                    terintegrasi yang dirancang untuk mendukung efisiensi dan keamanan bisnis Anda.</p>
                <div class="w-20 h-1.5 bg-brand-blue mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <div
                        class="group relative overflow-hidden bg-black rounded-[2rem] h-[500px] cursor-pointer shadow-2xl transition-all duration-500">

                        @php
                            $videoId = '';
                            if (!empty($service->file_path)) {
                                // Regex untuk mengambil ID video YouTube dari berbagai format link
                                preg_match(
                                    '/(v=|shared|be\/|shorts\/)([a-zA-Z0-9_-]{11})/',
                                    $service->file_path,
                                    $matches,
                                );
                                $videoId = $matches[2] ?? '';
                            }
                        @endphp

                        <div class="absolute inset-0 w-full h-full z-0 transition-all duration-700 group-hover:scale-110">
                            @if ($videoId)
                                <div
                                    class="absolute inset-0 w-full h-full pointer-events-none overflow-hidden grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-40 transition-all duration-700">
                                    <iframe
                                        src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}&controls=0&showinfo=0&rel=0&iv_load_policy=3&modestbranding=1&enablejsapi=1"
                                        class="absolute top-1/2 left-1/2 min-w-full min-h-full w-[200%] h-[200%] -translate-x-1/2 -translate-y-1/2 pointer-events-none"
                                        frameborder="0" allow="autoplay; fullscreen">
                                    </iframe>
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $service->image_path) }}"
                                    class="w-full h-full object-cover grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-40 transition-all duration-700"
                                    alt="{{ $service->title }}">
                            @endif
                        </div>

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent z-10 transition-opacity duration-500 group-hover:opacity-0">
                        </div>

                        <div
                            class="absolute inset-0 p-10 flex flex-col justify-end z-20 transition-all duration-500 group-hover:opacity-0 group-hover:translate-y-10">
                            <div
                                class="mb-6 w-16 h-16 bg-brand-blue/90 backdrop-blur-md rounded-2xl flex items-center justify-center text-white text-3xl shadow-lg transform -rotate-3 group-hover:rotate-0 transition-transform">
                                <i class="fa-solid {{ $service->icon }}"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-white uppercase tracking-wider mb-3 font-title">
                                {{ $service->title }}</h3>
                            <p class="text-gray-300 text-sm font-body line-clamp-2 leading-relaxed">
                                {{ $service->short_description }}</p>
                        </div>

                        <div
                            class="absolute inset-0 bg-gradient-to-br from-red-700 via-red-600 to-yellow-600 translate-y-full transition-transform duration-700 ease-[cubic-bezier(0.23,1,0.32,1)] group-hover:translate-y-0 p-10 flex flex-col justify-center text-white z-30">
                            <h3 class="text-2xl font-bold mb-2 font-title">{{ $service->title }}</h3>
                            <div class="w-12 h-1 bg-white/40 mb-6"></div>

                            <ul class="space-y-4 mb-10">
                                @php
                                    $features = json_decode($service->features, true);
                                    if (is_string($features)) {
                                        $features = json_decode($features, true);
                                    }
                                @endphp
                                @if (is_array($features))
                                    @foreach (array_slice($features, 0, 4) as $feature)
                                        @if (!empty($feature))
                                            <li class="flex items-center text-sm font-semibold tracking-wide">
                                                <div
                                                    class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                                                    <i class="fa-solid fa-check text-[10px]"></i>
                                                </div>
                                                {{ $feature }}
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>

                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['phone'] ?? '') }}"
                                target="_blank"
                                class="inline-flex items-center justify-center gap-3 bg-white text-brand-blue font-black py-4 px-6 rounded-2xl transition-all hover:bg-black hover:text-white shadow-2xl active:scale-95">
                                <i class="fa-brands fa-whatsapp text-xl"></i>
                                KONSULTASI SEKARANG
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="testimonials" class="bg-black py-20 text-white relative overflow-hidden">
        @include('partials.bunga-sakura') <!-- Efek bunga sakura -->
        
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h4 class="text-brand-blue font-bold tracking-[0.2em] uppercase text-sm mb-2 font-title">Testimonials</h4>
                <h2 class="text-3xl md:text-4xl font-bold text-white font-title">Kepercayaan Klien</h2>
                <p class="text-gray-400 mt-4 font-body max-w-xl mx-auto">Kepuasan pelanggan adalah prioritas kami. Inilah
                    apa yang mereka katakan mengenai pengalaman bekerja sama dengan kami.</p>
                <div class="w-20 h-1.5 bg-brand-blue mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testi)
                        <div class="swiper-slide">
                            <div class="bg-zinc-900 p-10 border border-zinc-800 rounded-lg">
                                <div class="flex text-brand-blue mb-6">
                                    @for ($i = 0; $i < ($testi->stars ?? 5); $i++)
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
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"
            class="relative block w-full h-[60px] fill-gray-50">
            <path
                d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z">
            </path>
        </svg>
    </div>

    <section id="partners" class="py-20 bg-gray-50 relative overflow-hidden" data-aos="fade-up">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h4 class="text-brand-blue font-bold tracking-[0.2em] uppercase text-sm mb-2 font-title">Network & Trust
                </h4>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 font-title">Partner Bisnis Kami</h2>
                <p class="text-gray-500 mt-4 font-body max-w-xl mx-auto">Kami bekerja sama dengan berbagai vendor dan
                    instansi terkemuka untuk memberikan layanan terbaik bagi Anda.</p>
                <div class="w-20 h-1.5 bg-brand-blue mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="relative flex overflow-x-hidden group">
                <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-gray-50 to-transparent z-10"></div>
                <div class="flex animate-marquee whitespace-nowrap py-12 items-center">
                    @foreach ($partners as $partner)
                        <div
                            class="mx-8 w-60 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-500">
                            <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}"
                                class="h-12 object-contain mx-auto">
                        </div>
                    @endforeach
                </div>
                <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-gray-50 to-transparent z-10"></div>

                <div class="absolute top-0 flex animate-marquee2 whitespace-nowrap py-12 items-center">
                    @foreach ($partners as $partner)
                        <div
                            class="mx-8 w-60 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-500">
                            <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}"
                                class="h-12 object-contain mx-auto">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="team" class="py-24 bg-black overflow-hidden" data-aos="fade-up">
        <div class="container mx-auto px-6 text-center">
            <div class="text-center mb-12">
                <h4 class="text-brand-blue font-bold tracking-[0.2em] uppercase text-sm mb-2 font-title">Experience &
                    Skills</h4>
                <h2 class="text-3xl md:text-4xl font-bold text-white font-title">Tim Ahli Kami</h2>
                <p class="text-gray-400 mt-4 font-body max-w-xl mx-auto">Didukung oleh tenaga profesional yang berdedikasi
                    untuk memberikan solusi teknis terbaik bagi setiap kebutuhan Anda.</p>
                <div class="w-20 h-1.5 bg-brand-blue mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                @foreach ($teams as $t)
                    <div class="group relative pt-12">
                        <div
                            class="bg-zinc-900/40 backdrop-blur-sm border border-white/10 rounded-2xl p-8 transition-all duration-500 hover:bg-brand-blue hover:-translate-y-2 group-hover:shadow-[0_0_40px_rgba(0,174,239,0.2)]">

                            <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 group">
                                <div
                                    class="absolute -inset-2 border-2 border-dashed border-yellow-500 rounded-xl animate-[spin_15s_linear_infinite] z-0 opacity-60">
                                </div>
                                <div
                                    class="absolute -inset-2 border-2 border-dashed border-yellow-500 rounded-xl animate-[spin_8s_linear_infinite] z-0 opacity-60">
                                </div>

                                <div
                                    class="absolute inset-0 bg-zinc-900 border-4 border-brand-blue rounded-xl flex items-center justify-center overflow-hidden transition-all duration-500 group-hover:scale-110 shadow-xl z-10">
                                    @if ($t->image_path)
                                        <img src="{{ asset('storage/' . $t->image_path) }}" alt="{{ $t->name }}"
                                            class="w-full h-full object-cover grayscale transition-all duration-700 group-hover:grayscale-0">
                                    @else
                                        <i class="fa-solid fa-user text-white text-3xl"></i>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-8">
                                <h3 class="text-xl font-bold text-white font-title mb-1">{{ $t->name }}</h3>
                                <p
                                    class="text-brand-blue font-bold text-xs uppercase tracking-widest font-title group-hover:text-white transition-colors">
                                    {{ $t->role }}
                                </p>

                                <div class="mt-4 pt-4 border-t border-white/10 group-hover:border-white/20">
                                    <p
                                        class="text-gray-400 text-sm font-body italic transition-colors group-hover:text-white/90">
                                        "{{ $t->quote }}"
                                    </p>
                                </div>
                            </div>

                            <div
                                class="absolute inset-0 rounded-2xl overflow-hidden opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity">
                                <div
                                    class="absolute -top-1/2 -left-1/2 w-full h-full bg-white/10 rotate-45 transform transition-transform duration-700 group-hover:translate-x-full">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
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
                            <h4 class="font-bold text-black font-title mb-1 group-hover:text-white transition-colors">
                                Lokasi Kantor</h4>
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

    <style>
        /* Mengganti warna identitas brand-blue menjadi Merah Imlek secara temporer */
        .text-brand-blue {
            color: #dc2626 !important;
        }

        /* Red-600 */
        .bg-brand-blue {
            background-color: #dc2626 !important;
        }

        .border-brand-blue {
            border-color: #facc15 !important;
        }

        /* Gold/Yellow */

        /* Efek Angpao pada Card Service */
        #services .group:hover {
            border: 2px solid #facc15;
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.5);
        }

        /* Animasi Marquee Partner dengan background kemerahan */
        #partners {
            background-color: #fff5f5;
        }
    </style>
@endsection
