<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 20 random fake products using the factory
        Product::factory(20)->create();
        // Or, a specific known product for consistent testing:
//         Product::create([
//                 'title' => 'Laptop Bag',
//                 'description' => 'Water-resistant 15-inch laptop bag',
//                 'price' => 15000,
//                 'quantity' => 30,
// ]);
    }
}
