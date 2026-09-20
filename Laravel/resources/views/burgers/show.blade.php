@extends('layouts.app')

@section('title', $burger['nama'] . ' — Katalog Burger')

@section('content')

    <a href="{{ route('burgers.index') }}" class="text-orange-600 hover:underline text-sm mb-6 inline-block">
        &larr; Kembali ke katalog
    </a>

    <div class="bg-white rounded-2xl shadow-md overflow-hidden md:flex">

        <div class="md:w-1/2">
            <img src="{{ $burger['gambar'] }}" alt="{{ $burger['nama'] }}" class="w-full h-72 md:h-full object-cover">
        </div>

        <div class="p-6 md:w-1/2">
            <span class="text-xs uppercase tracking-wide text-orange-600 font-semibold">
                {{ $burger['kategori'] }}
            </span>

            <h1 class="text-3xl font-extrabold mt-1 mb-3">{{ $burger['nama'] }}</h1>

            @if ($burger['favorit'])
                <span class="inline-block bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-full mb-3">
                    ⭐ Menu Favorit
                </span>
            @endif

            <p class="text-gray-600 mb-4">{{ $burger['deskripsi'] }}</p>

            <div class="flex items-center gap-4 mb-6">
                <span class="text-2xl font-bold text-orange-700">
                    Rp {{ number_format($burger['harga'], 0, ',', '.') }}
                </span>

                @if ($burger['level_pedas'] > 0)
                    <span class="text-red-500 text-lg" title="Level pedas">
                        {{ str_repeat('🌶️', $burger['level_pedas']) }}
                    </span>
                @endif
            </div>

            <h2 class="font-semibold text-gray-800 mb-2">Bahan-bahan:</h2>
            <ul class="list-disc list-inside text-gray-600 space-y-1 mb-6">
                @foreach ($burger['bahan'] as $bahan)
                    <li>{{ $bahan }}</li>
                @endforeach
            </ul>

            <button class="w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 rounded-xl transition">
                🛒 Pesan Sekarang
            </button>
        </div>
    </div>

@endsection
