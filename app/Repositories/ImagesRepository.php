<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ImagesRepository
{
    /**
     * Get the list of images associated with a given product
     *
     * @param integer $productId
     * @return array
     */
    static function getImagesByProductId(int $productId): array
    {
        $result = [];

        $images = DB::table('images')
        ->join('product_images', function ($join) use ($productId) {
            $join->on('images.id', '=', 'product_images.image')
                 ->where('product_images.product', '=', $productId);
        })->get();

        $result = $images->toArray();

        return $result;
    }
}
