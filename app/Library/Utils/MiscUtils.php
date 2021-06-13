<?php

namespace App\Library\Utils;

use App\Library\Traits\ObjectUtilsTrait;

final class MiscUtils
{
    use ObjectUtilsTrait;
    
    public static function formatPrice(float|int $price): string
    {

        $result = str_replace(".", ",", "" . round($price, 2) . "");

        return $result;
    }
}