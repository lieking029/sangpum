<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_image',
        'product_name',
        'category',
        'product_description',
        'pre_order',
    ];

    public function productVariations() : HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function shipping() : HasOne
    {
        return $this->hasOne(Shipping::class);
    }

    public function shipment() : HasOne
    {
        return $this->hasOne(Shipment::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
