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
            background-image: linear-gradient(rgba(10, 25, 47, 0.85), rgba(10, 25, 47, 0.95)), url('{{ asset('img/2.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-dashboard min-h-screen flex flex-col text-slate-800 antialiased" x-data="{ openModal: false, editMode: false, currentPartner: {} }">

    <main class="flex-grow w-full max-w-6xl mx-auto p-4 md:p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-all border border-white/10">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-extrabold text-white tracking-tight">Partner <span
                            class="text-indigo-600">&</span> Flip Card</h1>
                    <p class="text-white/50 text-sm font-medium">Manajemen logo interaktif untuk ekosistem MyBolo.</p>
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

        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition.out.opacity
                class="mb-8 bg-emerald-500/10 border border-emerald-500/20 backdrop-blur-md text-emerald-400 px-6 py-4 rounded-2xl flex justify-between items-center">
                <div class="flex items-center gap-3 font-bold uppercase tracking-wider text-xs">
                    <i class="fa-solid fa-circle-check text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button @click="show = false"
                    class="hover:bg-white/10 w-8 h-8 rounded-full transition-colors text-xl leading-none">&times;</button>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($partners as $p)
                <div class="glass-card p-6 rounded-[2.5rem] border border-white/20 group relative overflow-hidden">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="font-extrabold text-slate-800 text-xs uppercase tracking-widest">{{ $p->name }}
                        </h3>
                        <div class="flex gap-2">
                            <button @click="openModal = true; editMode = true; currentPartner = {{ json_encode($p) }}"
                                class="w-8 h-8 bg-white shadow rounded-full text-amber-500 hover:bg-amber-500 hover:text-white transition-all flex items-center justify-center">
                                <i class="fa-solid fa-pen text-[10px]"></i>
                            </button>
                            <form action="{{ route('partners.destroy', $p->id) }}" method="POST"
                                onsubmit="return confirm('Hapus partner ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="w-8 h-8 bg-white shadow rounded-full text-rose-500 hover:bg-rose-500 hover:text-white transition-all flex items-center justify-center">
                                    <i class="fa-solid fa-trash text-[10px]"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div
                        class="grid grid-cols-2 gap-4 bg-slate-50/50 p-4 rounded-3xl border border-dashed border-slate-200">
                        <div class="text-center">
                            <p class="text-[8px] font-bold text-slate-400 mb-2 uppercase">Main Logo</p>
                            <img src="{{ asset('storage/' . $p->logo_path) }}"
                                class="h-16 w-full object-contain mx-auto">
                        </div>
                        <div class="text-center border-l border-slate-200">
                            <p class="text-[8px] font-bold text-slate-400 mb-2 uppercase">Hover Logo</p>
                            @if ($p->logo_hover_path)
                                <img src="{{ asset('storage/' . $p->logo_hover_path) }}"
                                    class="h-16 w-full object-contain mx-auto">
                            @else
                                <div class="h-16 flex items-center justify-center text-[10px] italic text-slate-300">
                                    Belum ada</div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    {{-- Modal Form --}}
    <div x-show="openModal" x-cloak
        class="fixed inset-0 bg-slate-900/80 backdrop-blur-md flex items-center justify-center p-4 z-[100]">
        <div @click.away="openModal = false"
            class="bg-white rounded-[2.5rem] w-full max-w-lg shadow-2xl overflow-hidden">
            <div class="p-8 border-b flex justify-between items-center bg-slate-50/50">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white text-xl">
                        <i :class="editMode ? 'fa-solid fa-pen-nib' : 'fa-solid fa-handshake-alt'"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-slate-800"
                        x-text="editMode ? 'Edit Partner' : 'Partner Baru'"></h2>
                </div>
                <button @click="openModal = false" class="text-2xl">&times;</button>
            </div>

            <form :action="editMode ? '/admin/partners/' + currentPartner.id : '{{ route('partners.store') }}'"
                method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                <template x-if="editMode"><input type="hidden" name="_method" value="PUT"></template>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama
                        Perusahaan</label>
                    <input type="text" name="name" x-model="currentPartner.name" required
                        class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 p-4 rounded-2xl outline-none transition-all font-bold shadow-inner">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 text-center">
                        <label class="block text-[8px] font-black text-slate-400 uppercase mb-2">Logo Utama</label>
                        <input type="file" name="logo_path" class="text-[10px] w-full">
                    </div>
                    <div class="p-4 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 text-center">
                        <label class="block text-[8px] font-black text-slate-400 uppercase mb-2">Logo Hover</label>
                        <input type="file" name="logo_hover_path" class="text-[10px] w-full">
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-4 bg-slate-900 hover:bg-indigo-600 text-white text-sm font-black rounded-2xl transition-all uppercase tracking-widest">
                    Simpan Data Partner
                </button>
            </form>
        </div>
    </div>
</body>

</html>
