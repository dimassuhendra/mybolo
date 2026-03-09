<div class="container mx-auto px-6">
    <div class="text-center mb-20">
        <span class="text-brand-blue font-bold tracking-[0.3em] uppercase text-xs mb-4 block">
            Our Services
        </span>

        <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight mb-6">
            Layanan Digital <span class="text-brand-blue">Terintegrasi</span>
        </h2>

        <div class="flex justify-center">
            <p class="text-slate-500 max-w-2xl text-lg leading-relaxed">
                Kami menyediakan solusi teknologi mutakhir untuk mempercepat transformasi digital
                dan memperkuat infrastruktur bisnis Anda.
            </p>
        </div>

        <div class="w-20 h-1.5 bg-brand-blue mx-auto mt-8 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($services->take(3) as $service)
            <div
                class="group bg-white p-10 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 border border-slate-100 flex flex-col items-center text-center h-full">

                <div
                    class="w-16 h-16 bg-brand-blue rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-brand-blue/20 group-hover:rotate-12 transition-transform duration-500">
                    <i class="fa-solid {{ $service->icon }} text-2xl text-white"></i>
                </div>

                <h3 class="text-2xl font-bold text-slate-900 mb-4 uppercase tracking-tight">
                    {{ $service->title }}
                </h3>

                <div class="w-12 h-1 bg-brand-blue mb-6 mx-auto transition-all duration-500 group-hover:w-20"></div>

                <p class="text-slate-600 leading-relaxed font-body mb-8">
                    {{ $service->short_description }}
                </p>
            </div>
        @endforeach
    </div>
</div>

<style>
    /* Pastikan font-body dan brand-blue sudah terdefinisi di Tailwind Config Anda */
    /* Jika belum, Anda bisa menambahkan manual hex code di sini */
    :root {
        --brand-blue: #0047AB;
    }

    .text-brand-blue {
        color: var(--brand-blue);
    }

    .bg-brand-blue {
        background-color: var(--brand-blue);
    }

    .border-brand-blue {
        border-color: var(--brand-blue);
    }
</style>
