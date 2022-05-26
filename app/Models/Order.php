<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'table_number',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function getTotalPriceAttribute() {
        return $this->carts->sum('total_price');
    }

    public function getTotalPriceFormattedAttribute() {
        return number_format($this->total_price, 2, ',', '.');
    }
}
