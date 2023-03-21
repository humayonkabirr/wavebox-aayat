<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sub_title',
        'quantity',
        'price',
        'sale_price',
        'discount',
        'discount_type',
    ];

    public function productImage()
    {
      return $this->hasOne(ProductImage::class, 'product_id');
    }
}
