<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Vanila', 'category_id' => 1, 'description' => 'Tanya dikasir', 'price' => 20000, 'stock' => 100, 'status' => 1],
            ['name' => 'Tiramisu', 'category_id' => 1, 'description' => 'Tanya dikasir', 'price' => 20000, 'stock' => 50, 'status' => 1],
            ['name' => 'Capuccino', 'category_id' => 2, 'description' => 'Tanya dikasir', 'price' => 20000, 'stock' => 80, 'status' => 1],
            ['name' => 'Choco Tiramisu', 'category_id' => 2, 'description' => 'Tanya dikasir', 'price' => 20000, 'stock' => 60, 'status' => 1],
            ['name' => 'Vanila Strawberry', 'category_id' => 3, 'description' => 'Tanya dikasir', 'price' => 23000, 'stock' => 70, 'status' => 1],
            ['name' => 'Choco Vanila Cheese', 'category_id' => 3, 'description' => 'Tanya dikasir', 'price' => 23000, 'stock' => 90, 'status' => 1],
            
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

