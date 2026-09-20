<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BurgerController extends Controller
{
    public function index()
    {
        $burgers = [
            [
                'id' => 1,
                'name' => 'Classic Cheese Burger',
                'price' => 35000,
                'rating' => 4.8,
                'image' => 'https://static.vecteezy.com/system/resources/previews/030/495/976/large_2x/tempting-classic-cheese-burger-generative-ai-free-photo.jpg',
                'description' => 'Patty daging sapi panggang juicy dengan lelehan keju cheddar premium, saus spesial, dan selada segar.',
                'ingredients' => ['100% Australian Beef', 'Cheddar Cheese', 'Brioche Bun', 'Pickles', 'Signature Sauce']
            ],
            [
                'id' => 2,
                'name' => 'Crispy Chicken Burger',
                'price' => 32000,
                'rating' => 4.7,
                'image' => 'https://i.pinimg.com/originals/f0/83/12/f08312b5b45b888622e24921df51cb4d.png',
                'description' => 'Ayam goreng krispi keemasan dibalut mayones gurih dan irisan selada segar yang renyah.',
                'ingredients' => ['Crispy Chicken Fillet', 'Iceberg Lettuce', 'Creamy Mayo', 'Sesame Bun']
            ],
            [
                'id' => 3,
                'name' => 'Double Smoky Beef Bacon',
                'price' => 48000,
                'rating' => 4.9,
                'image' => 'https://img.freepik.com/premium-photo/smoky-bbq-bacon-burger_944420-61830.jpg',
                'description' => 'Dua lapis beef patty tebal dengan sentuhan saus BBQ asap gurih dan potongan bacon renyah.',
                'ingredients' => ['Double Beef Patty', 'Crispy Beef Bacon', 'Smoky BBQ Sauce', 'Caramelized Onion']
            ],
            [
                'id' => 4,
                'name' => 'Spicy Jalapeno Burger',
                'price' => 38000,
                'rating' => 4.6,
                'image' => 'https://img.freepik.com/premium-photo/spicy-jalapeo-burger-burger-with-jalapeo-peppers-pepper-jack-cheese-spicy-mayo_899451-250.jpg',
                'description' => 'Sensasi pedas mantap dengan irisan jalapeno segar, saus sambal chipotle, dan lelehan pepper jack cheese.',
                'ingredients' => ['Beef Patty', 'Jalapeno Slices', 'Pepper Jack Cheese', 'Chipotle Mayo']
            ],
        ];

        return view('burgers.index', compact('burgers'));
    }
}