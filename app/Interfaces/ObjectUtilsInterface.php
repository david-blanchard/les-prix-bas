<?php

namespace App\Interfaces;

interface ObjectUtilsInterface
{
    public static function toObject(array $data): object;
    public static function toArray(object $data): array;

}
