<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'shop_name',
      'shop_address',
      'shop_barangay',
      'date_established',
      'contact_number',
      'dti_number',
      'dti_permit',
      'barangay_clearance',
      'business_permit',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
