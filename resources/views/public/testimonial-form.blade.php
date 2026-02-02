<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Testimoni - MyBolo Ecosystem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.9)),
            url('{{ asset("img/2.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .wide-glass {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
        }

        .input-focus-effect {
            transition: all 0.3s ease;
        }

        .input-focus-effect:focus {
            border-color: #4f46e5;
            background: white;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.08);
        }

        [x-cloak] {
            display: none !important;
        }

        /* Custom Scrollbar untuk area form */
        .form-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .form-scroll::-webkit-scrollbar-thumb {
            background-color: #e2e8f0;
            border-radius: 10px;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 md:p-8 lg:p-12">

    <div class="max-w-5xl w-full wide-glass rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col md:flex-row min-h-[650px]"
        x-data="{ 
            rating: 5, 
            hoverRating: 0, 
            message: '',
            get isMessageValid() { return this.message.length >= 10 }
        }">

        <div class="w-full md:w-2/5 bg-indigo-600 p-10 md:p-12 text-white flex flex-col justify-between relative overflow-hidden">
            <i class="fa-solid fa-quote-right absolute -right-4 -bottom-4 text-[12rem] opacity-10 rotate-12 pointer-events-none"></i>

            <div class="relative z-10">
                <div class="w-16 h-16 bg-white/10 backdrop-blur-xl rounded-2xl flex items-center justify-center mb-8 border border-white/20 shadow-xl">
                    <i class="fa-solid fa-heart text-amber-400 text-2xl animate-pulse"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight leading-tight mb-4">
                    Suara Anda Adalah <span class="text-amber-400 font-serif italic text-4xl md:text-5xl">Energi</span> Kami.
                </h1>
                <p class="text-indigo-100 text-sm leading-relaxed opacity-80 max-w-xs">
                    Bantu kami meningkatkan kualitas layanan dengan berbagi pengalaman jujur Anda bersama MyBolo.
                </p>
            </div>

            <div class="relative z-10 pt-12 md:pt-0">
                <div class="flex items-center gap-3">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full border-2 border-indigo-600 bg-slate-300 shadow-sm"></div>
                        <div class="w-8 h-8 rounded-full border-2 border-indigo-600 bg-slate-400 shadow-sm"></div>
                        <div class="w-8 h-8 rounded-full border-2 border-indigo-600 bg-slate-500 shadow-sm"></div>
                    </div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-indigo-200">Dipercaya oleh 500+ Klien</p>
                </div>
            </div>
        </div>

        <div class="w-full md:w-3/5 p-8 md:p-12 lg:p-16 bg-white form-scroll overflow-y-auto">

            <form action="{{ route('testimonial.store') }}" method="POST" class="space-y-6">
                @csrf

                @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 p-4 rounded-2xl flex items-center gap-3 mb-6 animate-bounce">
                    <i class="fa-solid fa-check-circle"></i>
                    <span class="text-[10px] font-black uppercase tracking-widest">{{ session('success') }}</span>
                </div>
                @endif

                @if ($errors->any())
                <div class="bg-rose-50 border border-rose-100 text-rose-600 p-4 rounded-2xl mb-6">
                    <ul class="list-disc list-inside text-[10px] font-black uppercase tracking-tight">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Nama Lengkap</label>
                        <input type="text" name="client_name" required placeholder="John Doe" value="{{ old('client_name') }}"
                            class="input-focus-effect w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none font-bold text-slate-700">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Email Aktif</label>
                        <input type="email" name="email" required placeholder="john@example.com" value="{{ old('email') }}"
                            class="input-focus-effect w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none font-bold text-slate-700">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Instansi / Jabatan</label>
                    <input type="text" name="position" placeholder="Contoh: Manager di PT Maju Mundur" value="{{ old('position') }}"
                        class="input-focus-effect w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none font-medium text-slate-600">
                </div>

                <div class="space-y-3">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Kualitas Layanan</label>
                    <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <input type="hidden" name="stars" :value="rating">
                        <div class="flex gap-2">
                            <template x-for="i in 5">
                                <button type="button"
                                    @click="rating = i"
                                    @mouseenter="hoverRating = i"
                                    @mouseleave="hoverRating = 0"
                                    class="transition-all duration-200 transform hover:scale-125 focus:outline-none">
                                    <i class="fa-solid fa-star text-2xl transition-colors"
                                        :class="(hoverRating || rating) >= i ? 'text-amber-400 drop-shadow-sm' : 'text-slate-200'"></i>
                                </button>
                            </template>
                        </div>
                        <span class="text-[10px] font-black text-amber-600 uppercase tracking-widest ml-auto"
                            x-text="rating == 5 ? 'Sangat Puas' : (rating >= 4 ? 'Puas' : 'Cukup')"></span>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Pesan Testimoni</label>
                        <span class="text-[9px] font-black tracking-widest uppercase"
                            :class="isMessageValid ? 'text-emerald-500' : 'text-rose-400'">
                            <span x-text="message.length"></span>/10 Karakter
                        </span>
                    </div>

                    <textarea name="body" rows="4" required minlength="10" x-model="message"
                        placeholder="Ceritakan pengalaman terbaik Anda..."
                        class="input-focus-effect w-full bg-slate-50 border p-4 rounded-[1.5rem] outline-none font-medium text-slate-600 leading-relaxed transition-all"
                        :class="message.length > 0 && !isMessageValid ? 'border-rose-300 ring-4 ring-rose-50' : 'border-slate-200'"></textarea>

                    <p x-show="message.length > 0 && !isMessageValid" x-cloak x-transition
                        class="text-[10px] text-rose-500 font-bold italic ml-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[8px]"></i>
                        Minimal 10 karakter untuk dikirim.
                    </p>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row items-center gap-6">
                    <button type="submit"
                        :disabled="!isMessageValid"
                        :class="!isMessageValid ? 'opacity-40 cursor-not-allowed bg-slate-400' : 'bg-slate-900 hover:bg-indigo-600 shadow-xl shadow-slate-900/20'"
                        class="w-full sm:w-auto px-10 py-5 text-white font-black rounded-2xl transition-all transform active:scale-95 uppercase tracking-[0.2em] text-xs flex items-center justify-center gap-3 group">
                        <span>Kirim Sekarang</span>
                        <i class="fa-solid fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </button>

                    <div class="flex items-center gap-2 opacity-60">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest leading-tight">Privasi <br>Terjamin</span>
                    </div>
                </div>
            </form>

            <p class="mt-8 text-center md:text-left text-[9px] text-slate-300 font-medium uppercase tracking-[0.2em]">
                &copy; 2026 MyBolo Ecosystem. All Rights Reserved.
            </p>
        </div>
    </div>

</body>

</html>