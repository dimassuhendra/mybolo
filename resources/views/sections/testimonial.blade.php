    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h4 class="text-brand-blue font-bold tracking-[0.2em] uppercase text-sm mb-2 font-title">Testimonials</h4>
            <h2 class="text-3xl md:text-4xl font-bold text-white font-title">Kepercayaan Klien</h2>
            <p class="text-gray-400 mt-4 font-body max-w-xl mx-auto">Kepuasan pelanggan adalah prioritas kami. Inilah apa
                yang mereka katakan mengenai pengalaman bekerja sama dengan kami.</p>
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
