<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'variation_name',
        'price',
        'stock',
        'sale',
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function order() : HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function shipment() : BelongsTo
    {
        return $this->belongsTo(Shipment::class);
    }

}
