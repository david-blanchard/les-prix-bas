<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function productImages()
    {
        return $this->belongsTo(ProductImages::class);
    }
}
