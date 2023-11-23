<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'middle_name' => Str::random(1),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'nickname' => Str::random(2),
            'astr_sign' => Str::random(5),
            'kpop_group' => Str::random(5),
            'bias' => Str::random(5),
            'address' => fake()->address(),
            'barangay' => Str::random(5),
            'govt_type' => fake()->word(),
            'govt_id' => '',
            'wallet' => 0.00,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'verified' => 0,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
