<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login MyBolo Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Domine:wght@400..700&family=Fredoka:wght@300..700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Domine', serif;
        }

        .font-fredoka {
            font-family: 'Fredoka', sans-serif;
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-blue': '#00aeef',
                        'dark-blue': '#0a192f',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-dark-blue flex items-center justify-center min-h-screen relative overflow-hidden">

    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/2.jpg') }}" class="w-full h-full object-cover opacity-30" alt="Background">
        <div class="absolute inset-0 bg-dark-blue/60 backdrop-blur-sm"></div>
    </div>

    <div class="w-full max-w-md mx-auto px-4 z-10">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-white/10 flex flex-col">

            <div class="bg-brand-blue p-10 flex flex-col items-center justify-center text-white text-center">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mb-4 shadow-lg overflow-hidden p-4">
                    <img src="{{ asset('img/logo.png') }}" class="w-full h-full object-contain" alt="Logo">
                </div>

                <h1 class="text-2xl font-bold uppercase tracking-tighter font-fredoka">Masuk Akun</h1>
                <p class="text-[10px] mt-1 opacity-90 uppercase tracking-[0.3em]">MyBolo.Id</p>
            </div>

            <div class="p-10">
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <div class="flex items-center border-b-2 border-gray-100 py-3 focus-within:border-brand-blue transition-colors">
                            <span class="text-brand-blue w-6 text-center mr-3">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" name="email" placeholder="EMAIL"
                                class="w-full appearance-none bg-transparent border-none text-gray-700 py-1 px-2 leading-tight focus:outline-none uppercase text-xs tracking-widest font-bold font-fredoka"
                                required autocomplete="off">
                        </div>
                        @error('email')
                        <p class="text-red-500 text-[10px] mt-2 font-bold uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <div class="flex items-center border-b-2 border-gray-100 py-3 focus-within:border-brand-blue transition-colors">
                            <span class="text-brand-blue w-6 text-center mr-3">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" name="password" placeholder="PASSWORD"
                                class="w-full appearance-none bg-transparent border-none text-gray-700 py-1 px-2 leading-tight focus:outline-none uppercase text-xs tracking-widest font-bold font-fredoka"
                                required>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-brand-blue hover:bg-dark-blue text-white font-bold py-4 rounded-xl shadow-xl transition-all duration-300 uppercase text-xs tracking-[0.2em] font-fredoka transform hover:-translate-y-1">
                        Masuk Sekarang
                    </button>
                </form>

                <p class="text-center mt-8 text-[9px] text-gray-400 uppercase tracking-widest">
                    &copy; 2026 PT Teknologi Arindama Andra
                </p>
            </div>
        </div>
    </div>
</body>

</html>