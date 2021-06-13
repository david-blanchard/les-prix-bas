<?php

namespace App\Library\Helpers;

use App\Library\Utils\MiscUtils;
use App\Models\Products;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductsHelper
{

    /**
     * Retrieve the values of a given product
     *
     * @param integer $productId
     * @return array
     */
    static function getAttributesByProductId(?int $productId = null): array
    {
        $result = [];
        if($productId === null) {
            $result = DB::table('products')->first();
            $result = MiscUtils::toArray($result);
        } else {
            $result = Products::where('id', $productId)->get()->first()->getAttributes();
        }

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

    public static function computeDiscount(float|string $price, int $percent): float
    {
        $result = 0.00;

        if(is_string($price)) {
            $price = floatval($price);
        }

        $price = $price - $price * $percent / 100;
        $result = ceil(round($price, 2) * 100) / 100;

        return $result;
    }

    public static function getPropertiesFromCacheBySlug(string $slug): ?array
    {
        $result = null;

        $productId = Cache::has("product$slug") ? Cache::get("product$slug") : null;
        if($productId !== null) {

            $result = ProductsHelper::getPropertiesFromCacheById($productId);

            // dd(['slug' => $slug, 'props' => $result]);

        }

        return $result;
    }

    public static function putPropertiesInCacheBySlug(string $slug, array $properties): void
    {
        if(!Cache::has("product$slug"))
        {

            $id = $properties['id'];
            Cache::put("product$slug", $id);
            ProductsHelper::putPropertiesInCacheById($id, $properties);
        }
    }
    
    public static function getPropertiesFromCacheById(int $id): ?array
    {
        $product = Cache::has("product$id") ? Cache::get("product$id") : null;

        return $product;
    }

    public static function putPropertiesInCacheById(int $id, array $properties): void
    {
        if(!Cache::has("product$id"))
        {
            Cache::put("product$id", $properties);
        }
    }
}