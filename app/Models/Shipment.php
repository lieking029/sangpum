<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_variation_id',
        'quantity',
        'total',
        'user_id',
        'pickup_date',
        'status',
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
