<?php

namespace App\Helpers;

use App\Models\Products;

class ProductsHelper
{

    /**
     * Retrieve the values of a given product
     *
     * @param integer $productId
     * @return array
     */
    static function getAttributesByProductId(int $productId): array
    {
        $result = [];

        $products = Products::where('id', $productId)->get();
        $product = $products->first();
        $result = $product->getAttributes();

        return $result;
    }

    /**
     * Used to split the 'MoreInfo' field into an array of strings
     *
     * @param string $phrase
     * @return array
     */
    public static function grabMoreInfo(string $phrase): array
    {
        $result = [];
        $result = explode(';', $phrase);

        return $result;
    }
}