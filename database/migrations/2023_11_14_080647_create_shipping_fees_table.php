<?php

use App\Models\Shipping;
use App\Models\ShippingFee;
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
            $table->double('one_kilo');
            $table->double('two_kilo');
            $table->double('three_kilo');
            $table->double('four_kilo');
            $table->double('five_kilo');
            $table->double('six_kilo');
            $table->timestamps();
        });

        ShippingFee::insert([
            ['one_kilo' => 50, 'two_kilo' => 100, 'three_kilo' => 150, 'four_kilo' => 200, 'five_kilo' => 250, 'six_kilo' => 300]
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_fees');
    }
};
