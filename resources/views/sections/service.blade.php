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
                            preg_match('/(v=|shared|be\/|shorts\/)([a-zA-Z0-9_-]{11})/', $service->file_path, $matches);
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
                        class="absolute inset-0 bg-brand-blue/95 backdrop-blur-sm translate-y-full transition-transform duration-700 ease-[cubic-bezier(0.23,1,0.32,1)] group-hover:translate-y-0 p-10 flex flex-col justify-center text-white z-30">

                        <a href="https://wa.me/6281384828887"
                            target="_blank"
                            class="inline-flex items-center justify-center gap-3 bg-white text-brand-blue font-black py-4 px-6 rounded-2xl transition-all hover:bg-black hover:text-white shadow-2xl active:scale-95">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                            HUBUNGI KAMI
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
