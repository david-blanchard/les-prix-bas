<?php

namespace App\Helpers;

use App\Repositories\ProductsRepository;
use App\Services\CartService;

class CartHelper implements ServiceHelperInterface
{
    public static function useService(): CartService
    {
        $productsRepository = new ProductsRepository();
        return new CartService($productsRepository);
    }

    public static function type(): string
    {
       return CartService::type();
    }
}
