<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Testimoni - MyBolo Admin</title>
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

<body class="bg-dashboard min-h-screen flex flex-col text-slate-800 antialiased" x-data="testiManager()">

    <main class="flex-grow w-full max-w-6xl mx-auto p-4 md:p-8">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-all border border-white/10">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-extrabold text-white tracking-tight">Client <span class="text-amber-400">Reviews</span></h1>
                    <p class="text-white/50 text-sm font-medium">Moderasi suara pelanggan dan bangun kredibilitas brand.</p>
                </div>
            </div>

            <button @click="openAddModal()"
                class="group bg-amber-500 hover:bg-amber-400 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-amber-600/30 transition-all flex items-center gap-3">
                <div class="bg-white/20 rounded-lg p-1 group-hover:rotate-12 transition-transform">
                    <i class="fa-solid fa-pen-nib text-xs"></i>
                </div>
                Input Manual
            </button>
        </div>

        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition.out.opacity
            class="mb-8 bg-emerald-500/10 border border-emerald-500/20 backdrop-blur-md text-emerald-400 px-6 py-4 rounded-2xl flex justify-between items-center">
            <div class="flex items-center gap-3 font-bold uppercase tracking-wider text-xs">
                <i class="fa-solid fa-circle-check text-lg"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="hover:bg-white/10 w-8 h-8 rounded-full transition-colors">&times;</button>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $t)
            <div class="glass-card rounded-[2.5rem] p-8 flex flex-col group relative transition-all duration-500 hover:shadow-2xl hover:shadow-amber-500/10 border border-white/40">

                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full {{ $t->status == 'approved' ? 'bg-emerald-500 animate-pulse' : ($t->status == 'pending' ? 'bg-amber-500' : 'bg-rose-500') }}"></span>
                        <span class="text-[10px] font-black uppercase tracking-widest {{ $t->status == 'approved' ? 'text-emerald-600' : ($t->status == 'pending' ? 'text-amber-600' : 'text-rose-600') }}">
                            {{ $t->status }}
                        </span>
                    </div>
                    <span class="bg-slate-100 text-slate-400 text-[9px] font-black px-2 py-1 rounded-md uppercase tracking-tighter italic">
                        via {{ $t->source }}
                    </span>
                </div>

                <div class="flex text-amber-400 mb-5 gap-1">
                    @for($i=1; $i<=5; $i++)
                        <i class="fa-{{ $i <= $t->stars ? 'solid' : 'regular' }} fa-star text-sm"></i>
                        @endfor
                </div>

                <div class="flex-1 mb-8">
                    <div class="text-slate-300 text-3xl mb-2 italic font-serif">“</div>
                    <p class="text-slate-600 text-sm leading-relaxed font-medium line-clamp-4">
                        {{ $t->body }}
                    </p>
                </div>

                <div class="flex items-center gap-4 border-t border-slate-100 pt-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-slate-100 to-slate-200 rounded-2xl flex items-center justify-center text-slate-400 text-lg shadow-inner">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-slate-800 text-sm tracking-tight">{{ $t->client_name }}</h4>
                        <p class="text-[10px] text-amber-500 font-bold uppercase tracking-[0.1em]">{{ $t->position ?? 'Verified Client' }}</p>
                    </div>
                    @if($t->is_featured)
                    <div class="ml-auto text-amber-500" title="Featured on Home">
                        <i class="fa-solid fa-crown text-sm"></i>
                    </div>
                    @endif
                </div>

                <div class="absolute inset-2 bg-slate-900/90 backdrop-blur-md rounded-[2rem] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 p-6 z-10 border border-white/10 scale-95 group-hover:scale-100">
                    <p class="text-white/40 text-[10px] font-black uppercase tracking-[0.3em] mb-6">Management Actions</p>

                    <div class="flex flex-wrap justify-center gap-2 mb-6">
                        @if($t->status != 'approved')
                        <form action="{{ route('testimonials.updateStatus', $t->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="approved">
                            <button class="bg-emerald-500 hover:bg-emerald-400 text-white px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-wider transition-colors shadow-lg shadow-emerald-500/20">Approve</button>
                        </form>
                        @endif
                        @if($t->status != 'rejected')
                        <form action="{{ route('testimonials.updateStatus', $t->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="rejected">
                            <button class="bg-rose-500 hover:bg-rose-400 text-white px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-wider transition-colors shadow-lg shadow-rose-500/20">Reject</button>
                        </form>
                        @endif
                    </div>

                    <div class="flex gap-6 pt-4 border-t border-white/10 w-full justify-center">
                        <button @click="editTesti({{ json_encode($t) }})" class="text-amber-400 text-[11px] font-bold hover:text-white transition-colors uppercase tracking-widest flex items-center gap-2">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </button>
                        <form action="{{ route('testimonials.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini secara permanen?')">
                            @csrf @method('DELETE')
                            <button class="text-rose-400 text-[11px] font-bold hover:text-white transition-colors uppercase tracking-widest flex items-center gap-2">
                                <i class="fa-solid fa-trash-can"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <footer class="w-full py-10 text-center">
        <div class="h-[1px] w-24 bg-gradient-to-r from-transparent via-white/10 to-transparent mx-auto mb-4"></div>
        <p class="text-white/20 text-[10px] font-bold uppercase tracking-[0.4em]">Review Moderation System &bull; <span class="text-white/40 italic">Quality Control</span></p>
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

            <div class="p-8 border-b flex justify-between items-center bg-amber-50/50">
                <div class="flex items-center gap-4 text-left">
                    <div class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center text-white text-xl shadow-lg shadow-amber-600/20">
                        <i :class="editMode ? 'fa-solid fa-comment-dots' : 'fa-solid fa-plus-circle'"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold text-slate-800" x-text="editMode ? 'Edit Testimoni' : 'Testimoni Baru'"></h2>
                        <p class="text-[10px] text-amber-500 font-bold uppercase tracking-widest mt-0.5">Input review pelanggan MyBolo</p>
                    </div>
                </div>
                <button @click="openModal = false" class="bg-white hover:bg-rose-500 hover:text-white w-10 h-10 rounded-full transition-all text-xl font-bold">&times;</button>
            </div>

            <form :action="editMode ? '/admin/testimonials/' + currentData.id : '{{ route('testimonials.store') }}'" method="POST" class="p-8 space-y-5 text-left">
                @csrf
                <template x-if="editMode"><input type="hidden" name="_method" value="PUT"></template>

                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Nama Client</label>
                        <input type="text" name="client_name" x-model="currentData.client_name" required
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Posisi/Jabatan</label>
                        <input type="text" name="position" x-model="currentData.position" placeholder="CEO, Marketing, etc"
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner text-sm">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Rating</label>
                        <select name="stars" x-model="currentData.stars"
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner text-sm">
                            <option value="5">⭐⭐⭐⭐⭐ (Sempurna)</option>
                            <option value="4">⭐⭐⭐⭐ (Bagus)</option>
                            <option value="3">⭐⭐⭐ (Cukup)</option>
                            <option value="2">⭐⭐ (Buruk)</option>
                            <option value="1">⭐ (Sangat Buruk)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Isi Testimoni</label>
                    <textarea name="body" x-model="currentData.body" rows="4" required placeholder="Tulis testimoni pelanggan di sini..."
                        class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 p-4 rounded-2xl outline-none transition-all font-medium text-slate-600 shadow-inner text-sm"></textarea>
                </div>

                <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-100 shadow-inner">
                    <input type="checkbox" name="is_featured" id="feat" :checked="currentData.is_featured == 1"
                        class="w-5 h-5 rounded-lg text-amber-500 focus:ring-amber-500">
                    <label for="feat" class="text-xs font-black text-slate-600 uppercase tracking-tighter">Tampilkan sebagai Unggulan (Featured)</label>
                </div>

                <template x-if="editMode">
                    <div class="pt-2">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Status Moderasi</label>
                        <select name="status" x-model="currentData.status" class="w-full bg-slate-100 p-3 rounded-xl text-xs font-bold uppercase tracking-widest outline-none">
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                </template>

                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full py-4 bg-slate-900 hover:bg-amber-600 text-white text-sm font-black rounded-2xl shadow-xl shadow-slate-900/20 transition-all uppercase tracking-[0.2em]">
                        Simpan Testimoni
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function testiManager() {
            return {
                openModal: false,
                editMode: false,
                currentData: {},
                openAddModal() {
                    this.editMode = false;
                    this.currentData = {
                        client_name: '',
                        position: '',
                        stars: 5,
                        body: '',
                        is_featured: 0,
                        status: 'approved',
                        source: 'Admin'
                    };
                    this.openModal = true;
                },
                editTesti(data) {
                    this.editMode = true;
                    this.currentData = data;
                    this.openModal = true;
                }
            }
        }
    </script>
</body>

</html>