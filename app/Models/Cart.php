<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_id',
        'order_id',
        'quantity',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function getTotalPriceAttribute() {
        return $this->quantity * $this->menu->price;
    }

    public function getTotalPriceFormattedAttribute() {
        return number_format($this->total_price, 2, ',', '.');
    }
}
