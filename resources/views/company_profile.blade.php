@extends('layouts.app')

@section('content')

<section id="home" class="relative h-screen w-full overflow-hidden flex items-center">
    <div class="absolute inset-0 z-0">
        <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-100">
            <img src="{{ asset('img/2.jpg') }}" class="w-full h-full object-cover" alt="Internet Solution">
        </div>
        <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="{{ asset('img/1.jpg') }}" class="w-full h-full object-cover" alt="CCTV Security">
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

<section id="services" class="py-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Layanan Unggulan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto font-body">Solusi teknologi terintegrasi untuk keamanan dan konektivitas tanpa batas.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            <div class="flip-card">
                <div class="flip-card-inner shadow-2xl">
                    <div class="flip-card-front">
                        <img src="{{ asset('img/1.jpg') }}" class="w-full h-full object-cover" alt="Internet">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-black/20 to-transparent flex flex-col justify-end p-8 text-white">
                            <div class="mb-4 text-4xl text-brand-blue">
                                <i class="fa-solid fa-wifi"></i>
                            </div>
                            <h3 class="text-2xl font-bold font-title uppercase tracking-wider mb-2">Internet Solution</h3>
                            <p class="text-sm opacity-90 font-body">Koneksi stabil tanpa buffering untuk bisnis Anda.</p>
                            <div class="mt-4 text-xs font-bold uppercase tracking-widest text-brand-blue animate-pulse">
                                Hover untuk detail <i class="fa-solid fa-arrow-right ml-1"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card-back border-4 border-white/20">
                        <h3 class="text-2xl font-bold mb-4 font-title">Dedicated Fiber Optic</h3>
                        <ul class="text-left text-sm space-y-3 font-body mb-8">
                            <li><i class="fa-solid fa-check mr-2"></i> Bandwidth Simetris 1:1</li>
                            <li><i class="fa-solid fa-check mr-2"></i> Uptime SLA 99.9%</li>
                            <li><i class="fa-solid fa-check mr-2"></i> Support Teknikal 24/7</li>
                        </ul>
                        <a href="https://wa.me/6282340336561?text=Halo%20Arindama%2C%20saya%20tertarik%20dengan%20layanan%20Internet"
                            target="_blank"
                            class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition transform hover:scale-105 shadow-lg">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                            Hubungi Admin
                        </a>
                    </div>
                </div>
            </div>

            <div class="flip-card text-white">
                <div class="flip-card-inner shadow-2xl">
                    <div class="flip-card-front">
                        <img src="{{ asset('img/2.jpg') }}" class="w-full h-full object-cover" alt="CCTV">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-black/20 to-transparent flex flex-col justify-end p-8">
                            <div class="mb-4 text-4xl text-brand-blue">
                                <i class="fa-solid fa-video"></i>
                            </div>
                            <h3 class="text-2xl font-bold font-title uppercase tracking-wider mb-2">Security System</h3>
                            <p class="text-sm opacity-90 font-body">Pantau keamanan aset Anda dari mana saja, kapan saja.</p>
                            <div class="mt-4 text-xs font-bold uppercase tracking-widest text-brand-blue animate-pulse">
                                Hover untuk detail <i class="fa-solid fa-arrow-right ml-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flip-card-back border-4 border-white/20">
                        <h3 class="text-2xl font-bold mb-4 font-title">Smart Surveillance</h3>
                        <ul class="text-left text-sm space-y-3 font-body mb-8">
                            <li><i class="fa-solid fa-check mr-2"></i> Kualitas Gambar Ultra HD</li>
                            <li><i class="fa-solid fa-check mr-2"></i> Motion Detection & Alarm</li>
                            <li><i class="fa-solid fa-check mr-2"></i> Akses Cloud via Smartphone</li>
                        </ul>
                        <a href="https://wa.me/6282340336561?text=Halo%20Arindama%2C%20saya%20tertarik%20dengan%20layanan%20CCTV"
                            target="_blank"
                            class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition transform hover:scale-105 shadow-lg">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                            Tanya Harga
                        </a>
                    </div>
                </div>
            </div>

            <div class="flip-card text-white">
                <div class="flip-card-inner shadow-2xl">
                    <div class="flip-card-front">
                        <img src="{{ asset('img/3.jpg') }}" class="w-full h-full object-cover" alt="GPS">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-black/20 to-transparent flex flex-col justify-end p-8">
                            <div class="mb-4 text-4xl text-brand-blue">
                                <i class="fa-solid fa-location-crosshairs"></i>
                            </div>
                            <h3 class="text-2xl font-bold font-title uppercase tracking-wider mb-2">GPS Tracking</h3>
                            <p class="text-sm opacity-90 font-body">Kendali penuh atas armada dan kendaraan operasional.</p>
                            <div class="mt-4 text-xs font-bold uppercase tracking-widest text-brand-blue animate-pulse">
                                Hover untuk detail <i class="fa-solid fa-arrow-right ml-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flip-card-back border-4 border-white/20">
                        <h3 class="text-2xl font-bold mb-4 font-title">Fleet Management</h3>
                        <ul class="text-left text-sm space-y-3 font-body mb-8">
                            <li><i class="fa-solid fa-check mr-2"></i> Pelacakan Real-time Presisi</li>
                            <li><i class="fa-solid fa-check mr-2"></i> History Perjalanan 30 Hari</li>
                            <li><i class="fa-solid fa-check mr-2"></i> Laporan Konsumsi BBM</li>
                        </ul>
                        <a href="https://wa.me/6282340336561?text=Halo%20Arindama%2C%20saya%20tertarik%20dengan%20layanan%20GPS"
                            target="_blank"
                            class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition transform hover:scale-105 shadow-lg">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                            Pasang Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection