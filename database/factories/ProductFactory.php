<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_image' => null,
            'product_name' => fake()->name(),
            'category' => implode(' ', fake()->words(3)),
            'product_description' => fake()->sentence(),
            'pre_order' => null,
        ];
    }
}
