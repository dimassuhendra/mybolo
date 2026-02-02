<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Layanan - MyBolo Admin</title>
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
    </style>
</head>

<body class="bg-dashboard min-h-screen p-4 md:p-8 text-slate-800 antialiased" x-data="serviceManager()">

    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-all border border-white/10">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-extrabold text-white tracking-tight">Portal <span class="text-blue-400">Layanan</span></h1>
                    <p class="text-white/50 text-sm font-medium">Konfigurasi etalase jasa Teknologi Arindama Andra.</p>
                </div>
            </div>

            <button @click="openAddModal()" class="group bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-blue-600/30 transition-all flex items-center gap-3">
                <div class="bg-white/20 rounded-lg p-1 group-hover:rotate-90 transition-transform">
                    <i class="fa-solid fa-plus text-xs"></i>
                </div>
                Tambah Layanan Baru
            </button>
        </div>

        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition.out.opacity.duration.500ms
            class="mb-6 bg-emerald-500/10 border border-emerald-500/20 backdrop-blur-md text-emerald-400 px-6 py-4 rounded-2xl flex justify-between items-center shadow-xl">
            <div class="flex items-center gap-3 font-bold uppercase tracking-wider text-xs">
                <i class="fa-solid fa-circle-check text-lg"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="hover:bg-white/10 w-8 h-8 rounded-full transition-colors text-xl">&times;</button>
        </div>
        @endif

        <div class="glass-card rounded-[2rem] shadow-2xl overflow-hidden border border-white/20">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="p-6 text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold">Preview</th>
                            <th class="p-6 text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold text-center">Ikon</th>
                            <th class="p-6 text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold">Informasi Layanan</th>
                            <th class="p-6 text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold">Deskripsi</th>
                            <th class="p-6 text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold text-right">Manajemen</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($services as $s)
                        <tr class="hover:bg-blue-50/50 transition-all group">
                            <td class="p-6">
                                <div class="relative w-24 h-14 rounded-xl overflow-hidden shadow-inner bg-slate-100 border border-slate-200">
                                    @if($s->image_path)
                                    <img src="{{ asset('storage/' . $s->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                    <div class="flex items-center justify-center h-full text-[9px] text-slate-400 uppercase font-bold italic">No Media</div>
                                    @endif
                                </div>
                            </td>
                            <td class="p-6">
                                <div class="flex justify-center">
                                    <span class="w-12 h-12 flex items-center justify-center bg-blue-600 text-white rounded-2xl shadow-lg shadow-blue-500/20 group-hover:rotate-6 transition-transform">
                                        <i class="fa-solid {{ $s->icon }} text-lg"></i>
                                    </span>
                                </div>
                            </td>
                            <td class="p-6">
                                <p class="font-extrabold text-slate-800 text-lg leading-none">{{ $s->title }}</p>
                                <p class="text-blue-600 text-[10px] font-bold uppercase tracking-widest mt-2">Active Service</p>
                            </td>
                            <td class="p-6">
                                <p class="text-sm text-slate-500 font-medium leading-relaxed max-w-xs line-clamp-2">
                                    {{ $s->short_description }}
                                </p>
                            </td>
                            <td class="p-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <button @click="editService({{ json_encode($s) }})"
                                        class="bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white w-10 h-10 rounded-xl flex items-center justify-center transition-all shadow-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <form action="{{ route('services.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-rose-50 text-rose-600 hover:bg-rose-500 hover:text-white w-10 h-10 rounded-xl flex items-center justify-center transition-all shadow-sm">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if(count($services) == 0)
            <div class="p-20 text-center">
                <i class="fa-solid fa-folder-open text-6xl text-slate-200 mb-4"></i>
                <p class="text-slate-400 font-bold italic tracking-wider uppercase text-sm">Belum ada layanan yang terdaftar</p>
            </div>
            @endif
        </div>
    </div>

    <div x-show="openModal"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 bg-slate-900/80 backdrop-blur-md flex items-center justify-center p-4 z-[100]">

        <div @click.away="openModal = false" class="bg-white rounded-[2.5rem] w-full max-w-2xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">

            <div class="p-8 border-b flex justify-between items-center bg-slate-50/50">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white text-xl shadow-lg">
                        <i :class="editMode ? 'fa-solid fa-pen-nib' : 'fa-solid fa-plus-circle'"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold text-slate-800" x-text="editMode ? 'Edit Layanan' : 'Tambah Layanan'"></h2>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-0.5">Editor Portal MyBolo</p>
                    </div>
                </div>
                <button @click="openModal = false" class="bg-slate-100 hover:bg-rose-500 hover:text-white w-10 h-10 rounded-full transition-all text-xl font-bold">&times;</button>
            </div>

            <form :action="editMode ? '/admin/services/' + currentService.id : '{{ route('services.store') }}'"
                method="POST" enctype="multipart/form-data" class="p-8 overflow-y-auto space-y-6">

                @csrf
                <template x-if="editMode"><input type="hidden" name="_method" value="PUT"></template>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1 text-center sm:text-left">Judul Layanan</label>
                        <input type="text" name="title" x-model="currentService.title" required
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1 text-center sm:text-left">Ikon (FontAwesome)</label>
                        <div class="relative">
                            <input type="text" name="icon" x-model="currentService.icon" placeholder="fa-wifi" required
                                class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 pl-12 shadow-inner">
                            <i class="fa-solid fa-icons absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 text-lg"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">Deskripsi Singkat</label>
                    <textarea name="short_description" x-model="currentService.short_description" rows="3"
                        class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 p-4 rounded-2xl outline-none transition-all font-medium text-slate-600 shadow-inner"></textarea>
                </div>

                <div class="bg-blue-50/50 p-6 rounded-3xl border border-blue-100">
                    <label class="block text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-list-check"></i> Fitur Unggulan
                    </label>
                    <div class="space-y-3">
                        <template x-for="(feature, index) in features" :key="index">
                            <div class="flex gap-3 animate-fadeIn">
                                <input type="text" name="features[]" x-model="features[index]" placeholder="Contoh: Gratis Instalasi..."
                                    class="flex-1 bg-white border border-blue-100 p-3 rounded-xl text-sm font-bold text-slate-700 outline-none focus:ring-2 focus:ring-blue-500">
                                <button type="button" @click="removeFeature(index)"
                                    class="bg-white text-rose-500 hover:bg-rose-500 hover:text-white w-10 h-10 rounded-xl flex items-center justify-center transition-all border border-blue-50">
                                    <i class="fa-solid fa-minus text-xs"></i>
                                </button>
                            </div>
                        </template>
                    </div>
                    <button type="button" @click="addFeature()"
                        class="mt-4 text-xs font-black text-blue-600 hover:text-blue-800 flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-blue-100 transition-all uppercase tracking-widest">
                        <i class="fa-solid fa-plus-circle"></i> Tambah Baris Fitur
                    </button>
                </div>

                <div class="pt-2">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Visual Media</label>
                    <div class="flex items-center gap-6 p-4 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                        <template x-if="editMode && currentService.image_path">
                            <img :src="'/storage/' + currentService.image_path" class="w-20 h-14 object-cover rounded-xl shadow-md border-2 border-white">
                        </template>
                        <input type="file" name="image_path" class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition-all">
                    </div>
                </div>

                <div class="pt-8 flex justify-end gap-4 sticky bottom-0 bg-white pb-2">
                    <button type="button" @click="openModal = false" class="px-8 py-3 text-sm font-black text-slate-400 hover:text-slate-800 transition-all uppercase tracking-widest">Batal</button>
                    <button type="submit" class="px-10 py-3 bg-slate-900 hover:bg-blue-600 text-white text-sm font-black rounded-2xl shadow-xl shadow-slate-900/20 transition-all uppercase tracking-widest">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function serviceManager() {
            return {
                openModal: false,
                editMode: false,
                currentService: {},
                features: [''],
                openAddModal() {
                    this.editMode = false;
                    this.currentService = {
                        title: '',
                        icon: '',
                        short_description: '',
                        wa_link: ''
                    };
                    this.features = [''];
                    this.openModal = true;
                },
                editService(service) {
                    this.editMode = true;
                    this.currentService = service;

                    // Pastikan data features di-parse dengan benar
                    if (service.features) {
                        try {
                            // Jika datanya masih string (dari database), kita parse jadi Array
                            // Jika sudah array (dari Alpine), kita langsung pakai
                            let data = typeof service.features === 'string' ?
                                JSON.parse(service.features) :
                                service.features;

                            this.features = Array.isArray(data) ? data : [''];
                        } catch (e) {
                            console.error("Error parsing features:", e);
                            this.features = [''];
                        }
                    } else {
                        this.features = [''];
                    }

                    this.openModal = true;
                },
                addFeature() {
                    this.features.push('');
                },
                removeFeature(index) {
                    this.features.splice(index, 1);
                    if (this.features.length === 0) this.features.push('');
                }
            }
        }
    </script>
</body>

</html>