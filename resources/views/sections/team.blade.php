    <div class="container mx-auto px-6 text-center">
        <div class="text-center mb-12">
            <h4 class="text-brand-blue font-bold tracking-[0.2em] uppercase text-sm mb-2 font-title">Experience & Skills
            </h4>
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
                                class="absolute -inset-2 border-2 border-dashed border-brand-blue rounded-xl animate-[spin_15s_linear_infinite] z-0 opacity-60">
                            </div>
                            <div
                                class="absolute -inset-2 border-2 border-dashed border-brand-blue rounded-xl animate-[spin_8s_linear_infinite] z-0 opacity-60">
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
