<?php

namespace App\Factories;

use App\Interfaces\FactoryInterface;
use App\Interfaces\SessionObjectInterface;
use App\Types\Cart;

class SessionObjectFactory implements FactoryInterface
{

    public static function create(array $data) : ?SessionObjectInterface
    {
        $result = null;

        if(!isset($data["type"])) {
            return $result;
        }

        if( $data["type"] === 'Cart') {
            $result = new Cart;
        }

        return $result;

    }

}
