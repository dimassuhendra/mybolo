<div class="bg-white py-24">
    <div class="container mx-auto px-6">
        <div class="flex items-center gap-4 mb-16">
            <h2 class="text-3xl font-black text-slate-800 tracking-tighter uppercase">The <span
                    class="text-brand-blue">Squad</span></h2>
            <div class="h-[1px] flex-grow bg-slate-100"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($teams as $t)
                <div
                    class="group relative flex items-center p-4 bg-slate-50 rounded-2xl border border-transparent hover:border-brand-blue/20 hover:bg-white hover:shadow-xl hover:shadow-brand-blue/5 transition-all duration-500">

                    <div class="relative flex-shrink-0">
                        <div class="w-16 h-16 rounded-xl overflow-hidden border-2 border-white shadow-sm">
                            <img src="{{ asset('storage/' . $t->image_path) }}"
                                class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500">
                        </div>
                        <div
                            class="absolute -top-1 -left-1 w-3 h-3 bg-brand-blue rounded-full scale-0 group-hover:scale-100 transition-transform">
                        </div>
                    </div>

                    <div class="ml-5">
                        <h4
                            class="text-slate-900 font-bold text-base leading-tight group-hover:text-brand-blue transition-colors">
                            {{ $t->name }}
                        </h4>
                        <p class="text-slate-400 text-[10px] font-black tracking-widest uppercase mt-1">
                            {{ $t->role }}
                        </p>
                    </div>

                    <div
                        class="ml-auto opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-blue" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
