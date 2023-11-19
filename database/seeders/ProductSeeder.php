<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sellers = User::role(UserTypeEnum::Seller)->get();

        foreach ($sellers as $seller) {
            Product::factory(3)->create([
                'user_id' => $seller->id, // Assign the seller ID to each product's user_id field
            ]);
        }

    }
}
