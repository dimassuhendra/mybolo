<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - MyBolo Ecosystem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0f172a;
            overflow-x: hidden;
        }

        .bg-mesh {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background:
                radial-gradient(circle at 0% 0%, rgba(79, 70, 229, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 100% 100%, rgba(59, 130, 246, 0.15) 0%, transparent 50%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .input-dark {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-dark:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #6366f1;
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.15);
            transform: scale(1.01);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #6366f1 0%, #3b82f6 100%);
            transition: all 0.3s ease;
        }

        .btn-gradient:hover:not(:disabled) {
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.4);
            transform: translateY(-2px);
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center justify-center p-6 lg:p-12">
    <div class="bg-mesh"></div>

    <!-- Navigation Header -->
    <header class="w-full max-w-4xl flex justify-between items-center mb-10">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/20">
                <i class="fa-solid fa-cube text-white"></i>
            </div>
            <span class="text-white font-extrabold tracking-tighter text-xl">MyBolo <span
                    class="text-indigo-400">Feedback</span></span>
        </div>
        <a href="/"
            class="text-slate-400 hover:text-white transition-colors flex items-center gap-2 text-xs font-bold uppercase tracking-widest">
            <i class="fa-solid fa-arrow-left-long"></i>
            Kembali
        </a>
    </header>

    <main class="w-full max-w-4xl" x-data="{
        rating: 5,
        message: '',
        get isReady() { return this.message.length >= 10 }
    }">
        <div class="glass-card rounded-[2.5rem] overflow-hidden shadow-2xl flex flex-col lg:flex-row">

            <!-- Left Info Panel -->
            <div class="lg:w-1/3 p-8 lg:p-12 border-b lg:border-b-0 lg:border-r border-white/10 bg-white/[0.02]">
                <h2 class="text-white text-3xl font-black leading-tight mb-6">
                    Bantu Kami <br><span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-blue-400">Berkembang.</span>
                </h2>
                <p class="text-slate-400 text-sm leading-relaxed mb-8">
                    Setiap ulasan Anda adalah fondasi bagi pembaruan sistem MyBolo di masa mendatang.
                </p>
            </div>

            <!-- Form Section -->
            <div class="lg:w-2/3 p-8 lg:p-12">
                <form action="{{ route('testimonial.store') }}" method="POST" class="space-y-6">
                    @csrf

                    @if (session('success'))
                        <div
                            class="bg-emerald-500/10 border border-emerald-500/20 p-4 rounded-xl flex items-center gap-3 text-emerald-400 mb-6">
                            <i class="fa-solid fa-circle-check"></i>
                            <span class="text-xs font-bold uppercase tracking-wider">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Identitas
                                Anda</label>
                            <input type="text" name="client_name" required placeholder="Nama Lengkap"
                                value="{{ old('client_name') }}"
                                class="input-dark w-full p-4 rounded-2xl outline-none text-white placeholder:text-slate-600 font-medium">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Email
                                Aktif</label>
                            <input type="email" name="email" required placeholder="name@company.com"
                                value="{{ old('email') }}"
                                class="input-dark w-full p-4 rounded-2xl outline-none text-white placeholder:text-slate-600 font-medium">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Jabatan &
                            Instansi</label>
                        <input type="text" name="position" placeholder="Contoh: TAC Engineer - PT MyBolo"
                            value="{{ old('position') }}"
                            class="input-dark w-full p-4 rounded-2xl outline-none text-white placeholder:text-slate-600 font-medium">
                    </div>

                    <div class="space-y-4 py-2">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Rating
                            Kepuasan</label>
                        <div class="flex items-center gap-6">
                            <input type="hidden" name="stars" :value="rating">
                            <div class="flex gap-2">
                                <template x-for="i in 5">
                                    <button type="button" @click="rating = i"
                                        class="focus:outline-none transition-transform active:scale-75">
                                        <i class="fa-solid fa-star text-2xl transition-all duration-300"
                                            :class="rating >= i ? 'text-amber-400 drop-shadow-[0_0_10px_rgba(251,191,36,0.4)]' :
                                                'text-slate-700'"></i>
                                    </button>
                                </template>
                            </div>
                            <span
                                class="text-[10px] font-black text-white bg-white/5 px-4 py-2 rounded-full border border-white/10 uppercase tracking-widest"
                                x-text="rating == 5 ? 'Elite' : (rating >= 4 ? 'Great' : 'Good')"></span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between items-end px-1">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Pesan
                                Anda</label>
                            <span class="text-[9px] font-bold tracking-widest transition-colors"
                                :class="isReady ? 'text-emerald-400' : 'text-rose-400'">
                                <span x-text="message.length"></span> / 10 Min
                            </span>
                        </div>
                        <textarea name="body" rows="4" required minlength="10" x-model="message"
                            placeholder="Tuliskan testimoni atau saran Anda di sini..."
                            class="input-dark w-full p-5 rounded-3xl outline-none text-white placeholder:text-slate-600 font-medium leading-relaxed resize-none"></textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit" :disabled="!isReady"
                            class="btn-gradient w-full py-5 rounded-2xl text-white font-black uppercase tracking-[0.3em] text-xs flex items-center justify-center gap-3 disabled:opacity-30 disabled:cursor-not-allowed">
                            Kirim Feedback
                            <i class="fa-solid fa-paper-plane text-[10px]"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <footer class="mt-8 flex flex-col md:flex-row justify-between items-center px-4 gap-4">
            <p class="text-slate-600 text-[10px] font-bold uppercase tracking-widest">
                &copy; 2026 MyBolo Ecosystem &bull; Security Infrastructure Enabled
            </p>
            <div class="flex items-center gap-6 grayscale opacity-30">
                <i class="fa-brands fa-laravel text-white text-xl"></i>
                <i class="fa-brands fa-js text-white text-xl"></i>
                <i class="fa-brands fa-php text-white text-xl"></i>
            </div>
        </footer>
    </main>
</body>

</html>
