<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Partner - MyBolo Admin</title>
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
            background-image: linear-gradient(rgba(10, 25, 47, 0.85), rgba(10, 25, 47, 0.95)),
            url('{{ asset("img/2.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-dashboard min-h-screen flex flex-col text-slate-800 antialiased"
    x-data="{ openModal: false, editMode: false, currentPartner: {} }">

    <main class="flex-grow w-full max-w-6xl mx-auto p-4 md:p-8">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-all border border-white/10">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-extrabold text-white tracking-tight">Partner <span class="text-indigo-600">&</span> Client</h1>
                    <p class="text-white/50 text-sm font-medium">Manajemen kolaborasi strategis PT Teknologi Arindama Andra.</p>
                </div>
            </div>

            <button @click="openModal = true; editMode = false; currentPartner = {}"
                class="group bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-600/30 transition-all flex items-center gap-3">
                <div class="bg-white/20 rounded-lg p-1 group-hover:rotate-90 transition-transform">
                    <i class="fa-solid fa-plus text-xs"></i>
                </div>
                Tambah Partner Baru
            </button>
        </div>

        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition.out.opacity
            class="mb-8 bg-emerald-500/10 border border-emerald-500/20 backdrop-blur-md text-emerald-400 px-6 py-4 rounded-2xl flex justify-between items-center">
            <div class="flex items-center gap-3 font-bold uppercase tracking-wider text-xs">
                <i class="fa-solid fa-circle-check text-lg"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="hover:bg-white/10 w-8 h-8 rounded-full transition-colors text-xl leading-none">&times;</button>
        </div>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($partners as $p)
            <div class="glass-card p-6 rounded-[2rem] border border-white/20 hover:scale-[1.05] hover:shadow-2xl hover:shadow-emerald-500/20 transition-all duration-500 group relative overflow-hidden">

                <div class="absolute top-3 right-3 flex gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0 z-10">
                    <button @click="openModal = true; editMode = true; currentPartner = {{ json_encode($p) }}"
                        class="w-8 h-8 bg-white/90 shadow-lg rounded-full text-amber-500 hover:bg-amber-500 hover:text-white transition-all flex items-center justify-center">
                        <i class="fa-solid fa-pen text-[10px]"></i>
                    </button>
                    <form action="{{ route('partners.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus partner ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-8 h-8 bg-white/90 shadow-lg rounded-full text-rose-500 hover:bg-rose-500 hover:text-white transition-all flex items-center justify-center">
                            <i class="fa-solid fa-trash text-[10px]"></i>
                        </button>
                    </form>
                </div>

                <div class="h-28 flex items-center justify-center mb-4 p-2">
                    @if($p->logo_path)
                    <img src="{{ asset('storage/' . $p->logo_path) }}" alt="{{ $p->name }}"
                        class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-500">
                    @else
                    <div class="flex flex-col items-center gap-2 text-slate-300">
                        <i class="fa-solid fa-image text-3xl opacity-20"></i>
                        <span class="text-[10px] font-bold uppercase tracking-tighter italic">No Media</span>
                    </div>
                    @endif
                </div>

                <div class="text-center">
                    <h3 class="font-extrabold text-slate-800 text-[11px] uppercase tracking-widest leading-tight truncate px-2">
                        {{ $p->name }}
                    </h3>
                    <div class="h-1 w-8 bg-indigo-500 mx-auto mt-3 rounded-full opacity-0 group-hover:opacity-100 group-hover:w-16 transition-all duration-500"></div>
                </div>
            </div>
            @endforeach

            @if(count($partners) == 0)
            <div class="col-span-full py-20 flex flex-col items-center">
                <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center text-white/10 mb-4 border border-white/5">
                    <i class="fa-solid fa-handshake text-4xl"></i>
                </div>
                <p class="text-white/30 font-bold uppercase tracking-[0.3em] text-sm text-center px-4">Belum ada partner terdaftar</p>
            </div>
            @endif
        </div>
    </main>

    <footer class="w-full py-10 text-center">
        <div class="h-[1px] w-24 bg-gradient-to-r from-transparent via-white/10 to-transparent mx-auto mb-4"></div>
        <p class="text-white/20 text-[10px] font-bold uppercase tracking-[0.4em] px-4">
            &copy; 2026 MyBolo &bull; Proprietary System of <span class="text-white/40">PT Teknologi Arindama Andra</span>
        </p>
    </footer>

    <div x-show="openModal" x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 bg-slate-900/80 backdrop-blur-md flex items-center justify-center p-4 z-[100]">

        <div @click.away="openModal = false" class="bg-white rounded-[2.5rem] w-full max-w-md shadow-2xl overflow-hidden border border-white/20">

            <div class="p-8 border-b flex justify-between items-center bg-slate-50/50">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white text-xl shadow-lg shadow-indigo-600/20">
                        <i :class="editMode ? 'fa-solid fa-pen-nib' : 'fa-solid fa-handshake-alt'"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold text-slate-800" x-text="editMode ? 'Edit Partner' : 'Partner Baru'"></h2>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">MyBolo Ecosystem</p>
                    </div>
                </div>
                <button @click="openModal = false" class="bg-slate-100 hover:bg-rose-500 hover:text-white w-10 h-10 rounded-full transition-all text-xl font-bold leading-none">&times;</button>
            </div>

            <form :action="editMode ? '/admin/partners/' + currentPartner.id : '{{ route('partners.store') }}'"
                method="POST" enctype="multipart/form-data" class="p-8 space-y-6">

                @csrf
                <template x-if="editMode"><input type="hidden" name="_method" value="PUT"></template>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Nama Perusahaan / Instansi</label>
                    <input type="text" name="name" x-model="currentPartner.name" required
                        class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner"
                        placeholder="Misal: PT PGN Tbk">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Unggah Logo</label>
                    <div class="p-6 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 text-center group transition-colors hover:border-indigo-400">
                        <template x-if="editMode && currentPartner.logo_path">
                            <div class="mb-4">
                                <img :src="'/storage/' + currentPartner.logo_path" class="h-16 mx-auto object-contain drop-shadow-sm">
                                <p class="text-[9px] text-amber-600 font-bold uppercase mt-2 italic">Ganti logo lama di bawah</p>
                            </div>
                        </template>
                        <input type="file" name="logo_path" class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 transition-all cursor-pointer">
                    </div>
                </div>

                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full py-4 bg-slate-900 hover:bg-indigo-600 text-white text-sm font-black rounded-2xl shadow-xl shadow-slate-900/20 transition-all uppercase tracking-[0.2em]">
                        Simpan Data Partner
                    </button>
                    <button type="button" @click="openModal = false" class="w-full py-3 text-[10px] font-black text-slate-400 hover:text-rose-500 transition-all uppercase tracking-widest">
                        Batalkan Operasi
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>