<?php

namespace App\Library\Utils;

final class MiscUtils
{
    public static function formatPrice(float|int $price): string
    {

        $result = str_replace(".", ",", "" . round($price, 2) . "");

        return $result;
    }
}