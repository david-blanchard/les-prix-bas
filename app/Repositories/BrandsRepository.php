<?php

namespace App\Repositories;

use App\Models\Brands;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class BrandsRepository
{

    /**
     * Retrieve the name of a given brand
     *
     * @param integer $brandId
     * @return array
     */
    public static function getBrandNameById(int $brandId): string
    {
        $result = '';

        $brands = Brands::where('id', $brandId)->get();
        if(count($brands)) {
            $result = $brands->first()->getAttributes()['name'];
        }

        return $result;
    }

    /**
     * Retrieve all brands from the cache
     * If the cache is empty, brands are put in Cache
     * so the next call is valid
     *
     * @return Collection all brands of all products
     */
    public static function getAllFromCache(): Collection
    {
        $brands = Cache::has('brands') ? Cache::get('brands') : null;
        if($brands === null) {
            $brands = Brands::all();
            Cache::put('brands', $brands);
        }

        return $brands;
    }

}
