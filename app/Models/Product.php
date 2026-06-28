<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_distributor',
        'name',
        'price',
        'discount_price',
        'category',
        'description',
        'image'
    ];

    protected $casts = [
        'price' => 'integer',
        'discount_price' => 'integer'
    ];

    // 🔥 FINAL PRICE LOGIC
    public function getFinalPriceAttribute()
    {
        return $this->discount_price ?? $this->price;
    }

    // 🔥 CEK FLASH SALE
    public function getIsFlashSaleAttribute()
    {
        return !is_null($this->discount_price);
    }
}