<?php

namespace App\Models;

use App\Http\Controllers\BrandsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'more_infos',
        'price',
        'brand',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function dateFormatted()
    {
        return date_format($this->created_at, 'Y-m-d');
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function productInfo()
    {
        return $this->hasMany(ProductInfo::class);
    }
}
