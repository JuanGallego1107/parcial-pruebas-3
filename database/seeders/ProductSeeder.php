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
        Product::insert([
            ['name' => 'Zapatos'],
            ['name' => 'Camiseta'],
            ['name' => 'Pantalon'],
            ['name' => 'Gorra'],
            ['name' => 'Gafas'],
        ]);
    }
}
