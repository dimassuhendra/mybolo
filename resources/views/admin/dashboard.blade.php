<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Teknologi Arindama Andra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .bg-dashboard {
            background-image: linear-gradient(rgba(10, 25, 47, 0.85), rgba(10, 25, 47, 0.95)),
            url('{{ asset("img/2.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>

<body class="bg-dashboard min-h-screen text-gray-100 antialiased">

    <nav class="sticky top-0 z-50 px-8 py-4 flex justify-between items-center glass-card border-b border-white/10 mx-6 mt-4 rounded-2xl shadow-2xl">
        <div class="flex items-center gap-4">
            <img src="{{ asset('img/logo.png') }}" alt="Logo MyBolo" class="h-10 w-auto object-contain drop-shadow-md">

            <div class="flex flex-col">
                <span class="text-xl font-extrabold tracking-tight text-slate-800 leading-tight">
                    MYBOLO <span class="text-blue-600">ADMIN</span>
                </span>
                <div class="h-1 w-full bg-blue-600/20 rounded-full mt-0.5 overflow-hidden">
                    <div class="h-full bg-blue-600 w-1/2"></div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-6">
            <div class="hidden md:flex flex-col items-end">
                <span class="text-sm font-bold text-slate-800 leading-none">{{ auth()->user()->name }}</span>
                <span class="text-[10px] uppercase tracking-widest text-blue-600 font-bold">Super Admin</span>
            </div>
            <div class="h-8 w-[1px] bg-slate-200"></div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="group flex items-center gap-2 bg-red-50 hover:bg-red-500 text-red-600 hover:text-white px-4 py-2 rounded-xl transition-all duration-300 font-bold text-sm shadow-sm">
                    <span>Logout</span>
                    <i class="fa-solid fa-right-from-bracket group-hover:translate-x-1 transition-transform"></i>
                </button>
            </form>
        </div>
    </nav>

    <main class="p-8 max-w-7xl mx-auto">
        <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-4xl font-extrabold tracking-tight text-white">
                    Selamat Datang, <span class="text-blue-400 uppercase">{{ explode(' ', auth()->user()->name)[0] }}!</span>
                </h1>
                <p class="text-blue-100/60 mt-2 font-medium">Panel kendali ekosistem digital Teknologi Arindama Andra.</p>
            </div>
            <div class="flex items-center gap-2 text-sm bg-white/10 px-4 py-2 rounded-full border border-white/10 backdrop-blur-md">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-white/80 uppercase tracking-tighter font-bold">Server Status: Optimal</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="glass-card p-8 rounded-[2rem] border border-white/20 hover:scale-[1.02] hover:shadow-2xl hover:shadow-blue-500/20 transition-all duration-500 group relative overflow-hidden text-slate-800">
                <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
                    <i class="fa-solid fa-images text-6xl"></i>
                </div>
                <div class="w-14 h-14 bg-blue-600 text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg mb-6 group-hover:rotate-12 transition-transform duration-500">
                    <i class="fa-solid fa-desktop"></i>
                </div>
                <h3 class="text-2xl font-extrabold mb-2">Hero Slider</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">Ubah visual utama, headline, dan promosi yang muncul pertama kali di mata pengunjung.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold bg-blue-100 text-blue-700 px-3 py-1 rounded-full uppercase tracking-widest">{{ $stats['sliders'] }} Item</span>
                    <a href="#" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2 hover:bg-blue-600 transition-colors">
                        Edit Section <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div class="glass-card p-8 rounded-[2rem] border border-white/20 hover:scale-[1.02] hover:shadow-2xl hover:shadow-emerald-500/20 transition-all duration-500 group relative overflow-hidden text-slate-800">
                <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:opacity-20">
                    <i class="fa-solid fa-server text-6xl text-emerald-600"></i>
                </div>
                <div class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg mb-6 group-hover:scale-110 transition-transform duration-500">
                    <i class="fa-solid fa-gears"></i>
                </div>
                <h3 class="text-2xl font-extrabold mb-2">Services Portal</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">Kustomisasi detail paket Internet, spesifikasi CCTV, dan fitur GPS Tracking terbaru.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full uppercase tracking-widest">{{ $stats['services'] }} Layanan</span>
                    <a href="{{ route('services.index') }}" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2 hover:bg-emerald-600 transition-colors">
                        Update <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div class="glass-card p-8 rounded-[2rem] border border-white/20 hover:scale-[1.02] hover:shadow-2xl hover:shadow-amber-500/20 transition-all duration-500 group relative overflow-hidden text-slate-800">
                <div class="w-14 h-14 bg-amber-500 text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg mb-6">
                    <i class="fa-solid fa-comment-nodes"></i>
                </div>
                <h3 class="text-2xl font-extrabold mb-2">Klien & Review</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">Moderasi kata-kata klien dan tampilkan kepercayaan publik di halaman depan.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold bg-amber-100 text-amber-700 px-3 py-1 rounded-full uppercase tracking-widest">{{ $stats['testimonials'] }} Feedback</span>
                    <a href="#" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2 hover:bg-amber-600 transition-colors">
                        Moderate <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div class="glass-card p-8 rounded-[2rem] border border-white/20 hover:scale-[1.02] transition-all duration-500 group text-slate-800">
                <div class="w-14 h-14 bg-indigo-600 text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg mb-6">
                    <i class="fa-solid fa-handshake-angle"></i>
                </div>
                <h3 class="text-2xl font-extrabold mb-2">Partnership</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">Manajemen logo kolaborasi. Tambahkan vendor baru seperti Telkom atau PGN.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full uppercase tracking-widest">{{ $stats['partners'] }} Brand</span>
                    <a href="#" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2 hover:bg-indigo-600 transition-colors">
                        Manage <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div class="glass-card p-8 rounded-[2rem] border border-white/20 hover:scale-[1.02] transition-all duration-500 group text-slate-800">
                <div class="w-14 h-14 bg-violet-600 text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg mb-6">
                    <i class="fa-solid fa-user-group"></i>
                </div>
                <h3 class="text-2xl font-extrabold mb-2">Team Experts</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">Perbarui daftar staf ahli, jabatan, dan foto profil tim manajemen Anda.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold bg-violet-100 text-violet-700 px-3 py-1 rounded-full uppercase tracking-widest">{{ $stats['teams'] }} Member</span>
                    <a href="#" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2 hover:bg-violet-600 transition-colors">
                        Update <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div class="glass-card p-8 rounded-[2rem] border border-white/20 hover:scale-[1.02] transition-all duration-500 group text-slate-800">
                <div class="w-14 h-14 bg-rose-600 text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg mb-6">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <h3 class="text-2xl font-extrabold mb-2">Contact Center</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">Ubah alamat maps, nomor telepon kantor, dan koordinat WhatsApp admin.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold bg-rose-100 text-rose-700 px-3 py-1 rounded-full uppercase tracking-widest">Global Settings</span>
                    <a href="#" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2 hover:bg-rose-600 transition-colors">
                        Configure <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

        </div>

        <footer class="mt-20 pb-10 text-center">
            <div class="flex flex-col items-center gap-2">
                <div class="h-[1px] w-24 bg-gradient-to-r from-transparent via-white/20 to-transparent mb-4"></div>
                <!-- <p class="text-white/50 text-[10px] uppercase tracking-[0.4em] font-bold">
                    Maintained by <span class="text-blue-400">Digital Infrastructure Division</span>
                </p> -->
                <p class="text-white/30 text-xs font-medium tracking-widest mt-1">
                    &copy; 2026 <span class="text-white/60">MyBolo</span> is a registered trademark of <span class="text-white/60">PT Teknologi Arindama Andra</span>
                </p>
                <div class="flex items-center gap-3 mt-4 opacity-30 text-[9px] uppercase tracking-[0.2em] text-white">
                    <span>v2.4.0 Production</span>
                    <span class="w-1 h-1 bg-white rounded-full"></span>
                    <span>All Rights Reserved</span>
                </div>
            </div>
        </footer>
    </main>

</body>

</html>