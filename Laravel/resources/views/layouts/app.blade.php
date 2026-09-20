<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Burger House — Katalog Burger')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', 'Segoe UI', sans-serif; }
        .btn-yellow {
            background:#FFC629; color:#7A2E00; font-weight:700;
            transition: transform .15s ease, background .15s ease;
        }
        .btn-yellow:hover { background:#ffd65c; transform: translateY(-1px); }
        .card-hover { transition: transform .2s ease, box-shadow .2s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 12px 30px -10px rgba(0,0,0,.25); }
        .line-clamp-2 {
            display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;
        }
    </style>
</head>
<body class="bg-[#FFF7EC] text-gray-800">

    <header class="bg-[#E11D2A] text-white sticky top-0 z-40 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">
            <a href="{{ route('burgers.index') }}" class="flex items-center gap-2 text-xl sm:text-2xl font-extrabold tracking-tight">
                <span class="text-2xl">🍔</span> Burger House
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-sm font-semibold">
                <a href="#create" class="hover:text-yellow-300 transition">CREATE YOUR OWN</a>
                <a href="#menu" class="hover:text-yellow-300 transition flex items-center gap-1">SHOP MENU
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </a>
                <a href="#kategori" class="hover:text-yellow-300 transition flex items-center gap-1">SHOP BY CATEGORY
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </a>
                <a href="#cerita" class="hover:text-yellow-300 transition flex items-center gap-1">EXPLORE
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </a>
            </nav>

            <div class="flex items-center gap-4">
                <button class="hover:text-yellow-300 transition" aria-label="Cari">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/></svg>
                </button>
                <button class="hover:text-yellow-300 transition" aria-label="Akun">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </button>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <section class="bg-[#3B1707] text-white">
        <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row items-center gap-6 md:gap-10">
            <div class="text-5xl">🍟</div>
            <div class="flex-1">
                <h3 class="text-2xl font-bold mb-1">Daftar untuk promo & diskon eksklusif.</h3>
                <p class="text-white/70 text-sm">Jadi yang pertama tahu menu baru dan penawaran spesial Burger House.</p>
            </div>
            <form class="w-full md:w-auto flex gap-2" onsubmit="event.preventDefault(); alert('Terima kasih sudah mendaftar! (demo, tanpa backend email)');">
                <input type="email" required placeholder="Alamat email kamu"
                       class="flex-1 md:w-72 rounded-full px-5 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <button type="submit" class="btn-yellow rounded-full w-12 h-12 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>
        </div>
    </section>

    <footer class="bg-[#E11D2A] text-white">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="col-span-2 md:col-span-1">
                <div class="flex items-center gap-2 text-lg font-extrabold mb-3">🍔 Burger House</div>
                <p class="text-white/70 text-sm leading-relaxed">
                    Burger racikan segar, dipanggang setiap hari, dan diantar hangat langsung ke depan pintumu.
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-3">Perusahaan</h4>
                <ul class="space-y-2 text-sm text-white/70">
                    <li><a href="#" class="hover:text-white">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-white">Menu</a></li>
                    <li><a href="#" class="hover:text-white">Cabang</a></li>
                    <li><a href="#" class="hover:text-white">Karier</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-3">Bantuan</h4>
                <ul class="space-y-2 text-sm text-white/70">
                    <li><a href="#" class="hover:text-white">Layanan Pelanggan</a></li>
                    <li><a href="#" class="hover:text-white">Info Pengiriman</a></li>
                    <li><a href="#" class="hover:text-white">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-3">Ikuti Kami</h4>
                <ul class="space-y-2 text-sm text-white/70">
                    <li><a href="#" class="hover:text-white">Instagram</a></li>
                    <li><a href="#" class="hover:text-white">TikTok</a></li>
                    <li><a href="#" class="hover:text-white">Facebook</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/20 text-center text-xs text-white/60 py-4">
            &copy; {{ date('Y') }} Burger House. Proyek demo Laravel tanpa database.
        </div>
    </footer>

</body>
</html>
