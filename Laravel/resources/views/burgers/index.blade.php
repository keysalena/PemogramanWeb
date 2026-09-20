<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Burger</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

    <div class="max-w-6xl mx-auto px-4 py-10">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Katalog Burger Spesial</h1>
            <p class="text-gray-500 mt-1">Pilih menu favoritmu dan klik untuk melihat komposisi detail.</p>
        </div>

        <!-- Grid Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($burgers as $burger)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-md transition">
                    <img src="{{ $burger['image'] }}" alt="{{ $burger['name'] }}" class="h-48 w-full object-cover">
                    
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between text-xs text-amber-500 font-semibold mb-1">
                                <span>★ {{ $burger['rating'] }}</span>
                                <span class="text-gray-400">Burger</span>
                            </div>
                            <h2 class="text-lg font-bold text-gray-900 leading-snug">{{ $burger['name'] }}</h2>
                            <p class="text-sm text-gray-500 mt-2 line-clamp-2">{{ $burger['description'] }}</p>
                        </div>

                        <div class="mt-5 pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-lg font-bold text-gray-900">
                                Rp {{ number_format($burger['price'], 0, ',', '.') }}
                            </span>
                            <button 
                                onclick='openDetailModal(@json($burger))'
                                class="bg-amber-500 hover:bg-amber-600 text-white text-xs font-semibold px-3 py-2 rounded-lg transition"
                            >
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal Detail -->
    <div id="detailModal" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full overflow-hidden shadow-2xl transition-all">
            <div class="relative">
                <img id="modalImage" src="" alt="" class="h-70 w-full object-cover">
                <button onclick="closeDetailModal()" class="absolute top-3 right-3 bg-white/80 hover:bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center font-bold text-sm shadow">
                    ✕
                </button>
            </div>

            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 id="modalName" class="text-xl font-bold text-gray-900"></h3>
                    <span id="modalRating" class="text-amber-500 font-semibold text-sm"></span>
                </div>
                
                <p id="modalPrice" class="text-lg font-bold text-amber-600 mb-3"></p>
                <p id="modalDescription" class="text-sm text-gray-600 leading-relaxed mb-4"></p>

                <div class="mb-5">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">Komposisi Bahan</h4>
                    <div id="modalIngredients" class="flex flex-wrap gap-1.5"></div>
                </div>

                <button onclick="closeDetailModal()" class="w-full bg-gray-900 hover:bg-gray-800 text-white font-medium py-2.5 rounded-xl text-sm transition">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        function openDetailModal(burger) {
            document.getElementById('modalImage').src = burger.image;
            document.getElementById('modalImage').alt = burger.name;
            document.getElementById('modalName').innerText = burger.name;
            document.getElementById('modalRating').innerText = '★ ' + burger.rating;
            document.getElementById('modalPrice').innerText = 'Rp ' + burger.price.toLocaleString('id-ID');
            document.getElementById('modalDescription').innerText = burger.description;

            const ingredientsContainer = document.getElementById('modalIngredients');
            ingredientsContainer.innerHTML = '';
            burger.ingredients.forEach(item => {
                const badge = document.createElement('span');
                badge.className = 'bg-gray-100 text-gray-700 text-xs px-2.5 py-1 rounded-md';
                badge.innerText = item;
                ingredientsContainer.appendChild(badge);
            });

            document.getElementById('detailModal').classList.remove('hidden');
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('detailModal');
            if (event.target === modal) {
                closeDetailModal();
            }
        }
    </script>
</body>
</html>