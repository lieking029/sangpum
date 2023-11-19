<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Product::all() as $product) {
            Shipping::factory(3)->create(['product_id' => $product->id]);
        }
    }
}
