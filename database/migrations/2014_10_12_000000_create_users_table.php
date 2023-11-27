<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('birth_date');
            $table->string('nickname');
            $table->string('astr_sign');
            $table->string('kpop_group');
            $table->string('bias');
            $table->string('address');
            $table->string('barangay');
            $table->string('govt_type');
            $table->string('govt_id')->nullable();
            $table->double('wallet')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('verified');
            $table->string('profile')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $admins = [
            ['first_name' => 'admin', 'middle_name' => 'A', 'last_name' => 'admin', 'birth_date' => now(), 'nickname' => 'admin', 'astr_sign' => 'admin', 'kpop_group' => 'admin', 'address' => 'admin', 'bias' => 'admin', 'barangay' => 'admin', 'govt_type' => 'admin', 'wallet' => 1000000, 'verified' => 1,  'email' => 'admin@example.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'],
        ];

        $roleAdmin = Role::findByName('admin');

        foreach($admins as $admin) {
            $bmo = User::create($admin);
            $bmo->assignRole($roleAdmin);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
