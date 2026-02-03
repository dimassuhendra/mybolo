<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Tim - MyBolo Admin</title>
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

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-dashboard min-h-screen flex flex-col text-slate-800 antialiased" x-data="teamManager()">

    <main class="flex-grow w-full max-w-6xl mx-auto p-4 md:p-8">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-all border border-white/10">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-extrabold text-white tracking-tight">Our <span class="text-indigo-400">Team</span></h1>
                    <p class="text-white/50 text-sm font-medium">Kelola profil dan peran talenta terbaik di MyBolo.</p>
                </div>
            </div>

            <button @click="openAddModal()"
                class="group bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-600/30 transition-all flex items-center gap-3">
                <div class="bg-white/20 rounded-lg p-1 group-hover:rotate-12 transition-transform">
                    <i class="fa-solid fa-user-plus text-xs"></i>
                </div>
                Tambah Anggota
            </button>
        </div>

        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition.out.opacity
            class="mb-8 bg-indigo-500/10 border border-indigo-500/20 backdrop-blur-md text-indigo-400 px-6 py-4 rounded-2xl flex justify-between items-center">
            <div class="flex items-center gap-3 font-bold uppercase tracking-wider text-xs">
                <i class="fa-solid fa-check-double text-lg"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="hover:bg-white/10 w-8 h-8 rounded-full transition-colors">&times;</button>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($teams as $t)
            <div class="glass-card rounded-[2.5rem] border border-white/20 hover:shadow-2xl hover:shadow-indigo-500/20 transition-all duration-500 group relative flex flex-col items-center p-8 overflow-hidden text-center">

                <div class="absolute top-4 left-6 bg-indigo-600 text-white text-[9px] font-black px-3 py-1 rounded-full uppercase tracking-tighter shadow-lg shadow-indigo-600/40">
                    #{{ $t->order }}
                </div>

                <div class="relative mb-6">
                    <div class="w-24 h-24 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full overflow-hidden flex items-center justify-center text-white text-4xl shadow-xl shadow-indigo-500/30 group-hover:rotate-6 group-hover:scale-110 transition-all duration-500">
                        @if($t->image_path)
                        <img src="{{ asset('storage/' . $t->image_path) }}"
                            alt="{{ $t->name }}"
                            class="w-full h-full object-cover">
                        @else
                        <i class="fa-solid fa-user text-white text-3xl"></i>
                        @endif
                    </div>
                    <div class="absolute -inset-2 border-2 border-dashed border-indigo-500/20 rounded-[2.5rem] animate-[spin_10s_linear_infinite]"></div>
                </div>

                <div class="space-y-1 mb-6 flex-grow">
                    <h3 class="font-extrabold text-slate-800 text-lg leading-tight">{{ $t->name }}</h3>
                    <p class="text-[10px] text-indigo-500 font-black uppercase tracking-[0.2em]">{{ $t->role }}</p>
                    <div class="pt-4 px-2">
                        <p class="text-xs text-slate-400 italic leading-relaxed line-clamp-3">"{{ $t->quote ?? '-' }}"</p>
                    </div>
                </div>

                <div class="flex gap-2 w-full">
                    <button @click="editTeam({{ json_encode($t) }})"
                        class="flex-1 py-3 bg-amber-100/50 text-amber-600 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-amber-500 hover:text-white transition-all shadow-sm">
                        Edit
                    </button>
                    <form action="{{ route('teams.destroy', $t->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus anggota ini?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="w-full py-3 bg-rose-100/50 text-rose-600 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
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

        <div @click.away="openModal = false" class="bg-white rounded-[2.5rem] w-full max-w-lg shadow-2xl overflow-hidden border border-white/20">

            <div class="p-8 border-b flex justify-between items-center bg-indigo-50/50">
                <div class="flex items-center gap-4 text-left">
                    <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white text-xl shadow-lg shadow-indigo-600/20">
                        <i :class="editMode ? 'fa-solid fa-user-gear' : 'fa-solid fa-user-plus'"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold text-slate-800" x-text="editMode ? 'Update Anggota' : 'Anggota Baru'"></h2>
                        <p class="text-[10px] text-indigo-400 font-bold uppercase tracking-widest mt-0.5">Struktur Organisasi MyBolo</p>
                    </div>
                </div>
                <button @click="openModal = false" class="bg-white hover:bg-rose-500 hover:text-white w-10 h-10 rounded-full transition-all text-xl font-bold leading-none shadow-sm">&times;</button>
            </div>

            <form :action="editMode ? '/admin/teams/' + currentTeam.id : '{{ route('teams.store') }}'"
                method="POST"
                enctype="multipart/form-data"
                class="p-8 space-y-6 text-left">
                @csrf
                <template x-if="editMode">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div class="grid grid-cols-2 gap-5">
                    <div class="col-span-2">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Nama Lengkap</label>
                        <input type="text" name="name" x-model="currentTeam.name" required
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Jabatan / Peran</label>
                        <input type="text" name="role" x-model="currentTeam.role" required
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner text-sm">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">No. Urut Tampil</label>
                        <input type="number" name="order" x-model="currentTeam.order" required
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Foto Profil</label>
                    <input type="file" name="image_path" :required="!editMode"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    <p x-show="editMode" class="text-[9px] text-amber-500 mt-1">*Kosongkan jika tidak ingin mengubah foto</p>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Ikon FontAwesome</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-indigo-500"><i class="fa-solid fa-icons"></i></span>
                        <input type="text" name="icon" x-model="currentTeam.icon" required
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 p-4 pl-12 rounded-2xl outline-none transition-all font-mono text-xs text-indigo-600 shadow-inner">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Kata Mutiara (Quote)</label>
                    <textarea name="quote" x-model="currentTeam.quote" rows="3"
                        class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 p-4 rounded-2xl outline-none transition-all font-medium text-slate-600 shadow-inner text-sm"></textarea>
                </div>

                <button type="submit" class="w-full py-4 bg-slate-900 hover:bg-indigo-600 text-white text-sm font-black rounded-2xl shadow-xl transition-all uppercase tracking-[0.2em]">
                    Simpan Profil Anggota
                </button>
            </form>
        </div>
    </div>

    <script>
        function teamManager() {
            return {
                openModal: false,
                editMode: false,
                currentTeam: {},
                openAddModal() {
                    this.editMode = false;
                    this.currentTeam = {
                        name: '',
                        role: '',
                        icon: 'fa-user',
                        quote: '',
                        order: 1
                    };
                    this.openModal = true;
                },
                editTeam(team) {
                    this.editMode = true;
                    this.currentTeam = team;
                    this.openModal = true;
                }
            }
        }
    </script>
</body>

</html>