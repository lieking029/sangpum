<?php

use App\Models\Shipping;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipping_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Shipping::class)->constrained()->cascadeOnDelete();
            $table->string('five_hundred_grams');
            $table->string('one_kilo');
            $table->string('three_kilo');
            $table->string('four_kilo');
            $table->string('five_kilo');
            $table->string('six_kilo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_fees');
    }
};
