<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - MyBolo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white shadow-sm px-8 py-4 flex justify-between items-center border-b">
        <div class="flex items-center gap-2">
            <span class="text-xl font-bold">MyBolo <span class="text-blue-600">Admin</span></span>
        </div>

        <div class="flex items-center gap-4">
            <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-bold">Logout</button>
            </form>
        </div>
    </nav>

    <main class="p-8 max-w-7xl mx-auto">
        <div class="mb-10">
            <h1 class="text-3xl font-extrabold">Control Panel</h1>
            <p class="text-gray-500 mt-1">Pilih bagian yang ingin Anda kelola hari ini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-blue-500 transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                        <i class="fa-solid fa-images"></i>
                    </div>
                    <span class="text-2xl font-bold text-gray-300">{{ $stats['sliders'] }}</span>
                </div>
                <h3 class="text-lg font-bold">1. Hero Section</h3>
                <p class="text-sm text-gray-500 mb-4">Kelola gambar slider, judul, dan subtitle di halaman utama.</p>
                <a href="#" class="text-blue-600 font-bold text-sm inline-flex items-center group-hover:underline">Kelola Slider <i class="fa-solid fa-chevron-right ml-2 text-xs"></i></a>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-green-500 transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center text-xl">
                        <i class="fa-solid fa-server"></i>
                    </div>
                    <span class="text-2xl font-bold text-gray-300">{{ $stats['services'] }}</span>
                </div>
                <h3 class="text-lg font-bold">2. Layanan</h3>
                <p class="text-sm text-gray-500 mb-4">Atur deskripsi layanan IT, CCTV, dan GPS Tracking.</p>
                <a href="#" class="text-green-600 font-bold text-sm inline-flex items-center group-hover:underline">Kelola Layanan <i class="fa-solid fa-chevron-right ml-2 text-xs"></i></a>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-yellow-500 transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center text-xl">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span class="text-2xl font-bold text-gray-300">{{ $stats['testimonials'] }}</span>
                </div>
                <h3 class="text-lg font-bold">3. Testimoni</h3>
                <p class="text-sm text-gray-500 mb-4">Lihat dan moderasi ulasan dari klien perusahaan.</p>
                <a href="#" class="text-yellow-600 font-bold text-sm inline-flex items-center group-hover:underline">Kelola Testimoni <i class="fa-solid fa-chevron-right ml-2 text-xs"></i></a>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-orange-500 transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center text-xl">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <span class="text-2xl font-bold text-gray-300">{{ $stats['partners'] }}</span>
                </div>
                <h3 class="text-lg font-bold">4. Partner</h3>
                <p class="text-sm text-gray-500 mb-4">Update logo kerjasama (PGN, Telkom, Lintasarta, dll).</p>
                <a href="#" class="text-orange-600 font-bold text-sm inline-flex items-center group-hover:underline">Kelola Partner <i class="fa-solid fa-chevron-right ml-2 text-xs"></i></a>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-purple-500 transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center text-xl">
                        <i class="fa-solid fa-users-gear"></i>
                    </div>
                    <span class="text-2xl font-bold text-gray-300">{{ $stats['teams'] }}</span>
                </div>
                <h3 class="text-lg font-bold">5. Team</h3>
                <p class="text-sm text-gray-500 mb-4">Kelola profil manajer dan staf spesialis perusahaan.</p>
                <a href="#" class="text-purple-600 font-bold text-sm inline-flex items-center group-hover:underline">Kelola Team <i class="fa-solid fa-chevron-right ml-2 text-xs"></i></a>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-red-500 transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center text-xl">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <span class="text-2xl font-bold text-gray-300">{{ $stats['settings'] }}</span>
                </div>
                <h3 class="text-lg font-bold">6. Kontak & Pengaturan</h3>
                <p class="text-sm text-gray-500 mb-4">Ubah alamat kantor, nomor WhatsApp, dan email.</p>
                <a href="#" class="text-red-600 font-bold text-sm inline-flex items-center group-hover:underline">Edit Kontak <i class="fa-solid fa-chevron-right ml-2 text-xs"></i></a>
            </div>

        </div>
    </main>

</body>

</html>