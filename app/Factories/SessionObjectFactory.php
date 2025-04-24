<?php

namespace App\Factories;

use App\Helpers\CartHelper;
use App\Interfaces\FactoryInterface;
use App\Session\SessionObjectInterface;

class SessionObjectFactory implements FactoryInterface
{

    public static function create(array $data) : ?SessionObjectInterface
    {
        $result = null;

        if(!isset($data["type"])) {
            return $result;
        }

        if( $data["type"] === CartHelper::type()) {
            $result = CartHelper::useService();
        }

        return $result;

    }

}
