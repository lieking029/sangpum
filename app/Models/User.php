<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'birth_date', 'nickname', 'astr_sign', 'kpop_group', 'bias', 'address', 'barangay', 'govt_type', 'govt_id', 'wallet', 'email', 'password', 'verified', 'profile'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isSeller()
    {
        return $this->hasRole('seller');
    }

    public function isBuyer()
    {
        return $this->hasRole('buyer');
    }

    public function shop(): HasOne
    {
        return $this->hasOne(Shop::class);
    }

    public function shipment(): HasOne
    {
        return $this->hasOne(Shipment::class);
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }

    public function topUp(): HasMany
    {
        return $this->hasMany(TopUp::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function transactionHistory(): HasMany
    {
        return $this->hasMany(TransactionHistory::class);
    }
}
