<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'two_kilo',
        'one_kilo',
        'three_kilo',
        'four_kilo',
        'five_kilo',
        'six_kilo',
    ];

}
