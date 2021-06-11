<?php

namespace App\Library\Factories;

use App\Library\Interfaces\FactoryInterface;
use App\Library\Interfaces\SessionObjectInterface;
use App\Library\Types\Cart;

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