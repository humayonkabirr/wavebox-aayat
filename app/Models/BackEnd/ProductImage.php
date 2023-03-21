<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'product_id',
        'image_position',
        'image',
        'image1',
        'image2',
        'image3',
        'details1',
        'details2',
        'details3',
    ];
}
