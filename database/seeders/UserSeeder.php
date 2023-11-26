<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the 'admin' role by its name or create a new one if it doesn't exist.
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create 10 users and assign them the 'admin' role.
        $users = User::factory(2)->create();
        foreach ($users as $user) {
            $user->assignRole($adminRole);
        }
    }
}
