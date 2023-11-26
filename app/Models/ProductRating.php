<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $fillable = ['user_id', 'product_id', 'user_rating', 'user_comment'];
    use HasFactory;

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
     {
        return $this->belongsTo(User::class);
     }
}
