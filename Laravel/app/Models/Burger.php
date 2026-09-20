<?php

namespace App\Models;

/**
 * Model "palsu" (bukan Eloquent) karena proyek ini TIDAK menggunakan database.
 * Semua data burger disimpan statis di dalam array di sini.
 */
class Burger
{
    /**
     * Ambil semua data burger sebagai array asosiatif.
     */
    public static function all(): array
    {
        return [
            [
                'slug'        => 'classic-beef-burger',
                'nama'        => 'Classic Beef Burger',
                'kategori'    => 'Beef',
                'harga'       => 35000,
                'gambar'      => 'https://placehold.co/600x400?text=Classic+Beef+Burger',
                'deskripsi'   => 'Burger klasik dengan daging sapi panggang, selada, tomat, dan saus spesial rumahan.',
                'bahan'       => ['Roti brioche', 'Daging sapi 150gr', 'Selada', 'Tomat', 'Bawang bombay', 'Saus spesial'],
                'level_pedas' => 0,
                'favorit'     => true,
                'rating'      => 5,
            ],
            [
                'slug'        => 'double-cheese-burger',
                'nama'        => 'Double Cheese Burger',
                'kategori'    => 'Beef',
                'harga'       => 45000,
                'gambar'      => 'https://placehold.co/600x400?text=Double+Cheese+Burger',
                'deskripsi'   => 'Dua lapis daging sapi juicy dengan lelehan double cheddar yang menggoda.',
                'bahan'       => ['Roti brioche', '2x Daging sapi', '2x Keju cheddar', 'Acar timun', 'Saus mustard'],
                'level_pedas' => 0,
                'favorit'     => true,
                'rating'      => 5,
            ],
            [
                'slug'        => 'spicy-chicken-burger',
                'nama'        => 'Spicy Chicken Burger',
                'kategori'    => 'Chicken',
                'harga'       => 32000,
                'gambar'      => 'https://placehold.co/600x400?text=Spicy+Chicken+Burger',
                'deskripsi'   => 'Ayam crispy berlumur saus pedas dengan mayo dan selada segar.',
                'bahan'       => ['Roti gandum', 'Ayam crispy', 'Saus sambal spesial', 'Mayo', 'Selada'],
                'level_pedas' => 3,
                'favorit'     => false,
                'rating'      => 4,
            ],
            [
                'slug'        => 'bbq-smokey-burger',
                'nama'        => 'BBQ Smokey Burger',
                'kategori'    => 'Beef',
                'harga'       => 40000,
                'gambar'      => 'https://placehold.co/600x400?text=BBQ+Smokey+Burger',
                'deskripsi'   => 'Daging sapi dengan saus BBQ asap, bacon renyah, dan bawang goreng.',
                'bahan'       => ['Roti brioche', 'Daging sapi', 'Saus BBQ', 'Bacon', 'Bawang goreng'],
                'level_pedas' => 1,
                'favorit'     => false,
                'rating'      => 4,
            ],
            [
                'slug'        => 'mushroom-swiss-burger',
                'nama'        => 'Mushroom Swiss Burger',
                'kategori'    => 'Beef',
                'harga'       => 42000,
                'gambar'      => 'https://placehold.co/600x400?text=Mushroom+Swiss+Burger',
                'deskripsi'   => 'Tumisan jamur segar dengan keju swiss yang lumer di atas daging sapi panggang.',
                'bahan'       => ['Roti brioche', 'Daging sapi', 'Jamur tumis', 'Keju swiss', 'Saus truffle mayo'],
                'level_pedas' => 0,
                'favorit'     => false,
                'rating'      => 5,
            ],
            [
                'slug'        => 'veggie-delight-burger',
                'nama'        => 'Veggie Delight Burger',
                'kategori'    => 'Vegetarian',
                'harga'       => 28000,
                'gambar'      => 'https://placehold.co/600x400?text=Veggie+Delight+Burger',
                'deskripsi'   => 'Patty nabati dengan sayuran segar, cocok untuk kamu yang vegetarian.',
                'bahan'       => ['Roti gandum', 'Patty nabati', 'Selada', 'Tomat', 'Timun', 'Saus yogurt'],
                'level_pedas' => 0,
                'favorit'     => false,
                'rating'      => 4,
            ],
            [
                'slug'        => 'inferno-ghost-pepper-burger',
                'nama'        => 'Inferno Ghost Pepper Burger',
                'kategori'    => 'Chicken',
                'harga'       => 38000,
                'gambar'      => 'https://placehold.co/600x400?text=Inferno+Ghost+Pepper',
                'deskripsi'   => 'Untuk pecinta pedas ekstrem! Saus ghost pepper yang membakar lidah.',
                'bahan'       => ['Roti brioche', 'Ayam crispy', 'Saus ghost pepper', 'Keju pedas', 'Jalapeno'],
                'level_pedas' => 5,
                'favorit'     => true,
                'rating'      => 5,
            ],
            [
                'slug'        => 'fish-fillet-burger',
                'nama'        => 'Fish Fillet Burger',
                'kategori'    => 'Seafood',
                'harga'       => 33000,
                'gambar'      => 'https://placehold.co/600x400?text=Fish+Fillet+Burger',
                'deskripsi'   => 'Fillet ikan dori krispi dengan saus tartar dan selada segar.',
                'bahan'       => ['Roti putih', 'Fillet ikan dori', 'Saus tartar', 'Selada', 'Acar timun'],
                'level_pedas' => 0,
                'favorit'     => false,
                'rating'      => 4,
            ],
        ];
    }

    /**
     * Cari satu burger berdasarkan slug. Return null jika tidak ditemukan.
     */
    public static function findBySlug(string $slug): ?array
    {
        foreach (self::all() as $burger) {
            if ($burger['slug'] === $slug) {
                return $burger;
            }
        }

        return null;
    }

    /**
     * Ambil daftar kategori unik dari semua burger.
     */
    public static function kategoriList(): array
    {
        $kategori = array_map(fn ($b) => $b['kategori'], self::all());

        return array_values(array_unique($kategori));
    }
}
