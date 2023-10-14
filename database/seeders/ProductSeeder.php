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
            [
                'name' => 'Product 1',
                'price' => 200,
                'category_id' => 1, 
            ],
            [
                'name' => 'Product 2',
                'price' => 300,
                'category_id' => 2, 
            ],
            [
                'name' => 'Product 3',
                'price' => 400,
                'category_id' => 3, 
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
