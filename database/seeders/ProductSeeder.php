<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Apple MacBook Pro 14',
                'details' => 'Apple M1 Pro, 16GB RAM, 512GB SSD',
                'description' => 'A professional laptop that combines power and portability with Apple’s M1 Pro chip, perfect for creative workflows.',
                'brand' => 'Apple',
                'price' => 2499,
                'shipping_cost' => 25,
                'image_path' => 'storage/product1.png'
            ],
            [
                'name' => 'Samsung Galaxy Book Pro 13.3',
                'details' => 'Intel i5, 8GB RAM, 512GB SSD',
                'description' => 'Ultra-thin and lightweight with an AMOLED display that delivers vivid colors in a sleek 13.3-inch design.',
                'brand' => 'Samsung',
                'price' => 1400,
                'shipping_cost' => 25,
                'image_path' => 'storage/product2.png'
            ],
            [
                'name' => 'Dell XPS 13',
                'details' => 'Intel i7, 16GB RAM, 1TB SSD',
                'description' => 'The Dell XPS 13 redefines portability with a premium build and InfinityEdge display for an immersive experience.',
                'brand' => 'Dell',
                'price' => 1800,
                'shipping_cost' => 20,
                'image_path' => 'storage/product3.png'
            ],
            [
                'name' => 'Lenovo ThinkPad X1 Carbon Gen 10',
                'details' => 'Intel i7, 16GB RAM, 1TB SSD',
                'description' => 'A durable, lightweight business laptop with legendary keyboard comfort and outstanding battery life.',
                'brand' => 'Lenovo',
                'price' => 2100,
                'shipping_cost' => 30,
                'image_path' => 'storage/product4.png'
            ],
            [
                'name' => 'HP Spectre x360 14',
                'details' => 'Intel i7, 16GB RAM, 512GB SSD',
                'description' => 'A premium 2-in-1 convertible with a stunning OLED touchscreen and versatile design for work and creativity.',
                'brand' => 'HP',
                'price' => 1600,
                'shipping_cost' => 25,
                'image_path' => 'storage/product5.png'
            ],
            [
                'name' => 'Microsoft Surface Laptop 5',
                'details' => '13.5” Touch, Intel i5, 8GB RAM, 512GB SSD',
                'description' => 'Elegant and fast, optimized for Windows 11 with a PixelSense touchscreen that’s sharp and responsive.',
                'brand' => 'Microsoft',
                'price' => 1500,
                'shipping_cost' => 20,
                'image_path' => 'storage/product6.png'
            ],
            [
                'name' => 'Asus ZenBook 14 OLED',
                'details' => 'AMD Ryzen 7, 16GB RAM, 1TB SSD',
                'description' => 'A lightweight laptop with a 2.8K OLED display, delivering vibrant colors and great performance for multitasking.',
                'brand' => 'Asus',
                'price' => 1300,
                'shipping_cost' => 25,
                'image_path' => 'storage/product7.png'
            ],
            [
                'name' => 'Razer Blade 15',
                'details' => 'Intel i7, RTX 3070, 16GB RAM, 1TB SSD',
                'description' => 'A top-tier gaming laptop with a slim aluminum chassis and powerful graphics performance.',
                'brand' => 'Razer',
                'price' => 2700,
                'shipping_cost' => 35,
                'image_path' => 'storage/product8.png'
            ],
            [
                'name' => 'Acer Swift 3',
                'details' => 'AMD Ryzen 5, 8GB RAM, 512GB SSD',
                'description' => 'Compact, affordable, and efficient with excellent battery life — a great choice for students and daily use.',
                'brand' => 'Acer',
                'price' => 800,
                'shipping_cost' => 15,
                'image_path' => 'storage/product9.png'
            ],
            [
                'name' => 'Huawei MateBook X Pro',
                'details' => 'Intel i7, 16GB RAM, 1TB SSD',
                'description' => 'A premium ultrabook with a 3K touchscreen, slim metal body, and seamless Huawei ecosystem integration.',
                'brand' => 'Huawei',
                'price' => 1900,
                'shipping_cost' => 25,
                'image_path' => 'storage/product10.png'
            ],
        ];
        
        foreach($products as $key => $value){
            Product::create($value);
        }
    }
}
