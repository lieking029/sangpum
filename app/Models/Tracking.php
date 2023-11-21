<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'order_placed',
        'pre_ship',
        'delivery',
        'complete',
    ];

    public function shipment() : BelongsTo
    {
        return $this->belongsTo(Shipment::class);
    }

}
