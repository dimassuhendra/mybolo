<div class="container mx-auto px-6 md:px-16 py-10 overflow-hidden">
    <div id="partner-swiper" class="swiper partnerSwiper !overflow-visible">
        <div class="swiper-wrapper">
            @forelse ($partners as $p)
                <div class="swiper-slide flex justify-center py-12">
                    {{-- Link pembungkus seluruh kartu --}}
                    <a href="{{ $p->link ?? '#' }}" target="_blank" class="flip-card block shadow-lg"
                        title="{{ $p->name }}">

                        <div class="flip-card-inner">
                            <div class="flip-card-front bg-slate-800 border border-slate-200">
                                <img src="{{ asset('storage/' . $p->logo_path) }}" class="logo-img-full"
                                    alt="{{ $p->name }}">

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent z-10">
                                </div>

                                <div class="absolute bottom-0 left-0 w-full p-6 z-20 text-left">
                                    <h4 class="text-white font-bold text-lg md:text-xl leading-tight">
                                        {{ $p->name }}
                                    </h4>
                                    <div class="w-8 h-[2px] bg-brand-blue mt-2"></div>
                                </div>
                            </div>

                            <div class="flip-card-back border border-slate-200">
                                <img src="{{ asset('storage/' . ($p->logo_hover_path ?? $p->logo_path)) }}"
                                    class="logo-img-full" alt="{{ $p->name }}">
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="text-center w-full text-red-500 py-10 font-title uppercase tracking-widest text-xs">Data
                    partners belum tersedia.</div>
            @endforelse
        </div>

        <div class="flex justify-end gap-4 mt-4 pr-2 relative z-20">
            <button type="button" class="btn-prev-partner group focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-6 h-6 transition-transform group-hover:-translate-x-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>
            <button type="button" class="btn-next-partner group focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-6 h-6 transition-transform group-hover:translate-x-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
    </div>
</div>

@push('styles')
    <style>
        :root {
            --card-width: 240px;
            --card-height: 320px;
            --border-radius-custom: 16px;
        }

        @media (min-width: 1024px) {
            --card-width: 280px;
            --card-height: 373px;
        }

        .flip-card {
            width: var(--card-width);
            height: var(--card-height);
            perspective: 2000px;
            position: relative;
            text-decoration: none;
            border-radius: var(--border-radius-custom);
        }

        .flip-card-inner {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            transform-style: preserve-3d;
            top: 0;
            left: 0;
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: var(--border-radius-custom);
            overflow: hidden;
        }

        .flip-card-back {
            transform: rotateY(180deg);
        }

        .logo-img-full {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .btn-prev-partner,
        .btn-next-partner {
            width: 50px;
            height: 50px;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0f172a;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-prev-partner:hover,
        .btn-next-partner:hover {
            background: #0f172a;
            border-color: #0f172a;
            color: white;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function initPartnerSwiper() {
            if (typeof Swiper !== 'undefined') {
                const slides = document.querySelectorAll('#partner-swiper .swiper-slide');
                new Swiper("#partner-swiper", {
                    loop: slides.length >= 5,
                    slidesPerView: 1.2,
                    spaceBetween: 25,
                    speed: 1000,
                    navigation: {
                        nextEl: ".btn-next-partner",
                        prevEl: ".btn-prev-partner",
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 3
                        },
                        1024: {
                            slidesPerView: 4
                        },
                        1280: {
                            slidesPerView: 6
                        }
                    }
                });
            }
        }
        document.addEventListener('DOMContentLoaded', initPartnerSwiper);
    </script>
@endpush
