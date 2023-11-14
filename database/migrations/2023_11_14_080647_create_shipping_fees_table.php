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
            $table->string('500g');
            $table->string('1kg');
            $table->string('3kg');
            $table->string('4kg');
            $table->string('5kg');
            $table->string('6kg');
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
