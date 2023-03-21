<?php

namespace App\Models;

use App\Models\BackEnd\Product;
use App\Models\BackEnd\ProductImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'quantity',
        'address',
        'country',
        'shipping_cost',
        'delivery_type',
        'status'
    ];

    public function product()
    {
      return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function productImage()
    {
      return $this->hasOne(ProductImage::class, 'product_id', 'product_id');
    }

}
