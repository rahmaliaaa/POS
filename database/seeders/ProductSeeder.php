<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Laptop ASUS ROG',
            'description' => 'Laptop gaming dengan performa tinggi.',
            'price' => 25000000,
            'stock' => 10,
        ]);

        Product::create([
            'name' => 'Mouse Logitech',
            'description' => 'Mouse wireless dengan sensor presisi.',
            'price' => 500000,
            'stock' => 50,
        ]);
    }
}

