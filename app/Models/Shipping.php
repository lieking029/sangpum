<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'length',
        'height',
        'width',
        'product_id',
        'shipping_fee',
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
