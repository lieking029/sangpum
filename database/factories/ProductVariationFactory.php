<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariation>
 */
class ProductVariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'product_id' => Product::inRandomOrder()->value('id'),
            'variation_name' => fake()->name(),
            'price' => fake()->randomNumber(5, true),
            'stock' => fake()->randomNumber(3, true),
            'sales' => fake()->randomNumber(3, true),
        ];
    }
}
