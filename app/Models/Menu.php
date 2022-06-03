<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
    ];

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function getPriceFormattedAttribute() {
        return number_format($this->price, 2, ',', '.');
    }
}
