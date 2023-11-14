<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_id',
        '500g',
        '1kg',
        '3kg',
        '4kg',
        '5kg',
        '6kg',
    ];

    public function shipping() : BelongsTo
    {
        return $this->belongsTo(Shipping::class);
    }

}
