<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Hero - MyBolo Admin</title>
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

<body class="bg-dashboard min-h-screen flex flex-col text-slate-800 antialiased" x-data="{ openModal: false, editMode: false, currentSlide: {} }">

    <main class="flex-grow w-full max-w-6xl mx-auto p-4 md:p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-all border border-white/10">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-extrabold text-white tracking-tight">Hero <span
                            class="text-indigo-600">Visual</span></h1>
                    <p class="text-white/50 text-sm font-medium">Manajemen tampilan utama website MyBolo.</p>
                </div>
            </div>

            <button @click="openModal = true; editMode = false; currentSlide = { duration: 5 }"
                class="group bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-600/30 transition-all flex items-center gap-3">
                <div class="bg-white/20 rounded-lg p-1 group-hover:rotate-90 transition-transform">
                    <i class="fa-solid fa-plus text-xs"></i>
                </div>
                Tambah Slide Baru
            </button>
        </div>

        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition.out.opacity
                class="mb-8 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-6 py-4 rounded-2xl flex justify-between items-center">
                <div class="flex items-center gap-3 font-bold uppercase tracking-wider text-xs">
                    <i class="fa-solid fa-circle-check text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-xl">&times;</button>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($sliders as $slide)
                <div
                    class="glass-card p-6 rounded-[2.5rem] border border-white/20 hover:scale-[1.02] transition-all duration-500 group relative">
                    <div class="flex gap-6 items-start">
                        <div
                            class="w-24 h-24 rounded-3xl bg-slate-100 flex-shrink-0 overflow-hidden shadow-inner border border-slate-200">
                            @if ($slide->video_url)
                                <div
                                    class="w-full h-full flex flex-col items-center justify-center bg-slate-800 text-red-500">
                                    <i class="fa-brands fa-youtube text-2xl"></i>
                                    <span class="text-[7px] text-white font-black mt-1 uppercase">Video
                                        ({{ $slide->duration }}s)</span>
                                </div>
                            @elseif($slide->image_path)
                                <img src="{{ asset('storage/' . $slide->image_path) }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300">
                                    <i class="fa-solid fa-image text-xl"></i>
                                </div>
                            @endif
                        </div>

                        <div class="flex-grow">
                            <div class="flex justify-between items-start">
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-black text-indigo-500 uppercase tracking-widest">{{ $slide->nav_label }}</span>
                                    {{-- Device Availability Indicators --}}
                                    <div class="flex gap-2 mt-1">
                                        <i class="fa-solid fa-desktop text-[9px] {{ $slide->image_path ? 'text-emerald-500' : 'text-slate-300' }}"
                                            title="Desktop Ready"></i>
                                        <i class="fa-solid fa-tablet-screen-button text-[9px] {{ $slide->image_tablet_path ? 'text-emerald-500' : 'text-slate-300' }}"
                                            title="Tablet Ready"></i>
                                        <i class="fa-solid fa-mobile-screen text-[9px] {{ $slide->image_mobile_path ? 'text-emerald-500' : 'text-slate-300' }}"
                                            title="Mobile Ready"></i>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button
                                        @click="openModal = true; editMode = true; currentSlide = {{ json_encode($slide) }}"
                                        class="w-8 h-8 bg-amber-500/10 text-amber-600 rounded-full hover:bg-amber-500 hover:text-white transition-all flex items-center justify-center">
                                        <i class="fa-solid fa-pen text-[10px]"></i>
                                    </button>
                                    <form action="{{ route('hero.destroy', $slide->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus slide ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="w-8 h-8 bg-rose-500/10 text-rose-500 rounded-full hover:bg-rose-500 hover:text-white transition-all flex items-center justify-center">
                                            <i class="fa-solid fa-trash text-[10px]"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <h3 class="font-extrabold text-slate-800 text-lg leading-tight mt-1">
                                {{ $slide->title ?? 'Tanpa Judul' }}</h3>
                            <p class="text-[11px] text-slate-400 mt-2 font-medium line-clamp-2 italic">
                                {{ $slide->subtitle ?? 'Tidak ada deskripsi' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <div x-show="openModal" x-cloak
        class="fixed inset-0 bg-slate-900/80 backdrop-blur-md flex items-center justify-center p-4 z-[100]">
        <div @click.away="openModal = false"
            class="bg-white rounded-[2.5rem] w-full max-w-2xl shadow-2xl overflow-hidden border border-white/20">
            <div class="p-8 border-b flex justify-between items-center bg-slate-50/50">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white text-xl">
                        <i :class="editMode ? 'fa-solid fa-pen-nib' : 'fa-solid fa-images'"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold text-slate-800"
                            x-text="editMode ? 'Edit Visual Slide' : 'Tambah Slide Hero'"></h2>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Hero Visual
                            Config</p>
                    </div>
                </div>
                <button @click="openModal = false" class="text-2xl leading-none">&times;</button>
            </div>

            <form :action="editMode ? '/admin/hero/' + currentSlide.id : '{{ route('hero.store') }}'" method="POST"
                enctype="multipart/form-data" class="p-8 space-y-5 max-h-[70vh] overflow-y-auto no-scrollbar">
                @csrf
                <template x-if="editMode"><input type="hidden" name="_method" value="PUT"></template>

                <div class="grid grid-cols-2 gap-5">
                    <div class="col-span-1">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Judul
                            Utama</label>
                        <input type="text" name="title" x-model="currentSlide.title"
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner"
                            placeholder="Contoh: ULTRA CONNECT">
                    </div>
                    <div class="col-span-1">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Label
                            Navigasi</label>
                        <input type="text" name="nav_label" x-model="currentSlide.nav_label" required
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner"
                            placeholder="Contoh: SOLUTIONS">
                    </div>
                </div>

                <div>
                    <label
                        class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Deskripsi
                        / Subtitle</label>
                    <textarea name="subtitle" x-model="currentSlide.subtitle" rows="2"
                        class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner"
                        placeholder="Teks deskripsi di bawah judul..."></textarea>
                </div>

                <div class="grid grid-cols-3 gap-5">
                    <div class="col-span-1">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Durasi
                            (s)</label>
                        <input type="number" name="duration" x-model="currentSlide.duration" required
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner">
                    </div>
                    <div class="col-span-2">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">YouTube
                            Embed URL</label>
                        <input type="text" name="video_url" x-model="currentSlide.video_url"
                            class="w-full bg-slate-50 border-transparent focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 p-4 rounded-2xl outline-none transition-all font-bold text-slate-700 shadow-inner"
                            placeholder="https://www.youtube.com/embed/...">
                    </div>
                </div>

                <div class="space-y-4 pt-2">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Unggah
                        Aset Visual (Art Direction)</label>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="space-y-2">
                            <span class="text-[9px] font-bold text-slate-500 ml-1">Desktop (16:9)</span>
                            <div class="px-3 py-2 bg-slate-50 rounded-xl border-2 border-dashed border-slate-200">
                                <input type="file" name="image"
                                    class="text-[10px] text-slate-400 cursor-pointer w-full">
                            </div>
                            <template x-if="editMode && currentSlide.image_path">
                                <p class="text-[8px] text-emerald-600 font-bold italic">* File Desktop Ada</p>
                            </template>
                        </div>

                        <div class="space-y-2">
                            <span class="text-[9px] font-bold text-slate-500 ml-1">Tablet (4:3)</span>
                            <div class="px-3 py-2 bg-slate-50 rounded-xl border-2 border-dashed border-slate-200">
                                <input type="file" name="image_tablet"
                                    class="text-[10px] text-slate-400 cursor-pointer w-full">
                            </div>
                            <template x-if="editMode && currentSlide.image_tablet_path">
                                <p class="text-[8px] text-emerald-600 font-bold italic">* File Tablet Ada</p>
                            </template>
                        </div>

                        <div class="space-y-2">
                            <span class="text-[9px] font-bold text-slate-500 ml-1">Mobile (9:16)</span>
                            <div class="px-3 py-2 bg-slate-50 rounded-xl border-2 border-dashed border-slate-200">
                                <input type="file" name="image_mobile"
                                    class="text-[10px] text-slate-400 cursor-pointer w-full">
                            </div>
                            <template x-if="editMode && currentSlide.image_mobile_path">
                                <p class="text-[8px] text-emerald-600 font-bold italic">* File Mobile Ada</p>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit"
                        class="w-full py-4 bg-slate-900 hover:bg-indigo-600 text-white text-sm font-black rounded-2xl shadow-xl shadow-slate-900/20 transition-all uppercase tracking-[0.2em]">
                        Simpan Visual Hero
                    </button>
                    <button type="button" @click="openModal = false"
                        class="w-full py-2 text-[10px] font-black text-slate-400 hover:text-rose-500 transition-all uppercase tracking-widest text-center">
                        Batalkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
