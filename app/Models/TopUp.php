<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'qr_code',
        'topup_request',
        'reference_number',
        'status',
        'proof',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
