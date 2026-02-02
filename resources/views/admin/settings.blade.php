<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengaturan Situs - MyBolo Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .bg-dashboard {
            background-image: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.95)),
            url('{{ asset("img/2.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .input-focus {
            transition: all 0.3s ease;
        }

        .input-focus:focus {
            background: white !important;
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
    </style>
</head>

<body class="bg-dashboard min-h-screen flex flex-col text-slate-800 antialiased">

    <main class="flex-grow w-full max-w-4xl mx-auto p-4 md:p-8">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-all border border-white/10">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-extrabold text-white tracking-tight">System <span class="text-rose-600">Settings</span></h1>
                    <p class="text-white/50 text-sm font-medium">Konfigurasi global identitas MyBolo Ecosystem.</p>
                </div>
            </div>
        </div>

        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition.out.opacity
            class="mb-8 bg-blue-500/10 border border-blue-500/20 backdrop-blur-md text-blue-400 px-6 py-4 rounded-2xl flex justify-between items-center">
            <div class="flex items-center gap-3 font-bold uppercase tracking-wider text-xs">
                <i class="fa-solid fa-circle-check text-lg"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="hover:bg-white/10 w-8 h-8 rounded-full transition-colors">&times;</button>
        </div>
        @endif

        <form action="{{ route('settings.update') }}" method="POST" class="space-y-8">
            @csrf
            @method('PATCH')

            <div class="glass-card rounded-[2.5rem] overflow-hidden shadow-2xl shadow-blue-900/20 border border-white/20">
                <div class="px-8 py-5 bg-blue-600/5 border-b border-blue-100/20 flex items-center gap-3">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white text-xs shadow-lg shadow-blue-600/30">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <h2 class="font-black text-slate-700 uppercase tracking-widest text-xs">Identitas Perusahaan</h2>
                </div>

                <div class="p-8 space-y-6">
                    <div class="group">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Nama Perusahaan Resmi</label>
                        <input type="text" name="company_name" value="{{ $settings['company_name'] ?? '' }}"
                            class="input-focus w-full bg-slate-50 border-transparent p-4 rounded-2xl outline-none font-bold text-slate-700 shadow-inner"
                            placeholder="Masukkan nama PT atau Brand">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Alamat Kantor Pusat</label>
                        <textarea name="address" rows="3"
                            class="input-focus w-full bg-slate-50 border-transparent p-4 rounded-2xl outline-none font-medium text-slate-600 shadow-inner"
                            placeholder="Alamat lengkap operasional...">{{ $settings['address'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-[2.5rem] overflow-hidden shadow-2xl shadow-blue-900/20 border border-white/20">
                <div class="px-8 py-5 bg-indigo-600/5 border-b border-blue-100/20 flex items-center gap-3">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white text-xs shadow-lg shadow-indigo-600/30">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <h2 class="font-black text-slate-700 uppercase tracking-widest text-xs">Kontak & Operasional</h2>
                </div>

                <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Nomor Telepon</label>
                        <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}"
                            class="input-focus w-full bg-slate-50 border-transparent p-4 rounded-2xl outline-none font-bold text-slate-700 shadow-inner">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">WhatsApp Business</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-emerald-500 font-bold text-xs">62</span>
                            <input type="text" name="whatsapp" value="{{ $settings['whatsapp'] ?? '' }}"
                                class="input-focus w-full bg-slate-50 border-transparent p-4 pl-10 rounded-2xl outline-none font-bold text-slate-700 shadow-inner">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Email Support</label>
                        <input type="email" name="email" value="{{ $settings['email'] ?? '' }}"
                            class="input-focus w-full bg-slate-50 border-transparent p-4 rounded-2xl outline-none font-bold text-slate-700 shadow-inner">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Jam Kerja</label>
                        <input type="text" name="working_hours" value="{{ $settings['working_hours'] ?? '' }}"
                            class="input-focus w-full bg-slate-50 border-transparent p-4 rounded-2xl outline-none font-bold text-slate-700 shadow-inner">
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-[2.5rem] overflow-hidden shadow-2xl shadow-blue-900/20 border border-white/20">
                <div class="px-8 py-5 bg-rose-600/5 border-b border-blue-100/20 flex items-center gap-3">
                    <div class="w-8 h-8 bg-rose-600 rounded-lg flex items-center justify-center text-white text-xs shadow-lg shadow-rose-600/30">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <h2 class="font-black text-slate-700 uppercase tracking-widest text-xs">Integrasi Google Maps</h2>
                </div>
                <div class="p-8">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Google Maps Embed/URL</label>
                    <input type="text" name="maps_url" value="{{ $settings['maps_url'] ?? '' }}"
                        class="input-focus w-full bg-slate-50 border-transparent p-4 rounded-2xl outline-none font-medium text-blue-600 text-xs shadow-inner italic">
                    <div class="mt-4 flex items-center gap-2 text-slate-400">
                        <i class="fa-solid fa-circle-info text-[10px]"></i>
                        <p class="text-[9px] font-bold uppercase tracking-wider italic">Salin link dari google maps sesuai dengan titik lokasi kantor.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-6">
                <button type="submit" class="group bg-slate-900 hover:bg-rose-600 text-white px-10 py-5 rounded-[2rem] font-black shadow-2xl shadow-blue-500/20 transition-all flex items-center gap-4 uppercase tracking-[0.2em] text-sm">
                    <i class="fa-solid fa-shield-halved group-hover:rotate-12 transition-transform"></i>
                    Simpan Konfigurasi
                </button>
            </div>
        </form>
    </main>

    <footer class="w-full py-10 text-center">
        <div class="h-[1px] w-24 bg-gradient-to-r from-transparent via-white/10 to-transparent mx-auto mb-4"></div>
        <p class="text-white/20 text-[10px] font-bold uppercase tracking-[0.4em]">
            &copy; 2026 MyBolo &bull; <span class="text-white/40 italic">Global Core Settings</span>
        </p>
    </footer>

</body>

</html>