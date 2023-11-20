<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipping>
 */
class ShippingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'weight' => fake()->randomNumber(1, true),
            'length' => fake()->randomNumber(2, true),
            'width' => fake()->randomNumber(2, true),
            'height' => fake()->randomNumber(2, true),
            'shipping_fee' => Str::random(4),
        ];
    }
}
