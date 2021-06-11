<?php

namespace App\Library\Helpers;

use App\Models\Brands;

class BrandsHelper
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

}