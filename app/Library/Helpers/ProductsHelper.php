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
     * Transform Product attributes in properties usable in views
     *
     * @param array $props
     * @return array
     */
    public static function attributesToProperties(array $props): array
    {
        $discount = ProductsHelper::getProductDiscountById($props['id']);
        $props['brand'] = BrandsHelper::getBrandNameById($props['brand']);
        $props['discountRate'] = $discount;
        $props['discount'] = ProductsHelper::computeDiscount($props['price'], $discount);

        $props['featuresCaption'] = 'Information complémentaires';
        $props['features'] = ProductsHelper::grabMoreInfo($props['more_infos']);

        $images = ImagesHelper::getImagesByProductId($props['id']);
        $props['images'] = $images;

        return $props;
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

    public static function getProductDiscountById(int $productId): int
    {
        $result = 0.0;

        $today = date('Y-m-d');

        $discounts = DB::table('campaigns')
        ->join('campaign_products', function ($join) use ($today, $productId) {
            $join->on('campaigns.id', '=', 'campaign_products.campaign')
                 ->where('campaign_products.product', '=', $productId)
                 ->whereRaw('? between `campaigns`.`start` and `campaigns`.`end`', ["$today"]);
        })->get();

        $result = $discounts = count($discounts->toArray()) ? $discounts[0]->discount : 0;

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

    /**
     * Remove the product page properties from the cache by Products object
     *
     * @param Products $product
     * @return void
     */
    public static function deletePropertiesFromCache(Products $product) : void
    {
        self::deletePropertiesFromCacheById($product->id);
    }

    /**
     * Remove the product page properties from the cache by ID
     *
     * @param integer $productId ID of the product
     * @return void
     */
    public static function deletePropertiesFromCacheById(int $productId) : void
    {
        if(Cache::has("product$productId")) {
            Cache::pull("product$productId");
        }
    }

    /**
     * Retrieve the product page properties from the cache by slug
     *
     * @param string $slug Free form of the product name
     * @return array|null $properties Values to be set in product page view
     */
    public static function getPropertiesFromCacheBySlug(string $slug): ?array
    {
        $result = null;

        $productId = Cache::has("product$slug") ? Cache::get("product$slug") : null;
        if($productId !== null) {
            $result = ProductsHelper::getPropertiesFromCacheById($productId);
        }

        return $result;
    }

    /**
     * Store the product page properties in cache by slug
     *
     * @param string $slug Free form of the product name
     * @param array $properties Values to be set in product page view
     * @return void
     */
    public static function putPropertiesInCacheBySlug(string $slug, array $properties): void
    {
        if(!Cache::has("product$slug"))
        {
            $id = $properties['id'];
            Cache::put("product$slug", $id);
            ProductsHelper::putPropertiesInCacheById($id, $properties);
        }
    }
    
    /**
     * Retrieve the product page properties from the cache by ID
     *
     * @param integer $id ID of the product
     * @return array|null Values to be set in product page view
     */
    public static function getPropertiesFromCacheById(int $id): ?array
    {
        $product = Cache::has("product$id") ? Cache::get("product$id") : null;

        return $product;
    }

    /**
     * Store the product page properties in cache by ID
     *
     * @param integer $id ID of the product
     * @param array $properties Values to be set in product page view
     * @return void
     */
    public static function putPropertiesInCacheById(int $id, array $properties): void
    {
        if(!Cache::has("product$id"))
        {
            Cache::put("product$id", $properties);
        }
    }
}