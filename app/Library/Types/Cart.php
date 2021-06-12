<?php

namespace App\Library\Types;

use App\Library\Helpers\ProductsHelper;
use App\Library\Interfaces\CartInterface;
use App\Library\Utils\MiscUtils;

class Cart extends AbstractSessionObject implements CartInterface
{

    public function type(): string
    {
        return 'Cart';
    }

    /**
     * Compute the total sum of the cart 
     * accordingly to the product prices and quantities
     *
     * @return array optimized cart form
     */
    public function computeCart(): array
    {
        $result = [];

        $total = 0.0;
        $numberOfProducts = 0;

        $items = $this->items();

        foreach ($items as $productId => $quantity) {
            if (is_array($quantity)) {
                continue;
            }
            $attr = ProductsHelper::getAttributesByProductId($productId);
            $price = floatval($attr['price']);

            $numberOfProducts += $quantity;
            $total += $price * $quantity;
        }

        $result = [
            "quantity" => $numberOfProducts,
            "total" => $total,
        ];

        return $result;
    }

    public function prepare(?array $data = null): void
    { 
        $this->reduce($data);
    }

    /**
     * Retrieve the cart state from the given session data
     *
     * @return array a state of the cart in session
     */
    public function retrieve(): array
    {
        $result = $this->makeEmptySessionObject();

        $result = session('cart') ?: $result;
        if (is_object($result)) {
            $result = self::toArray($result);
        }

        return $result;
    }

    /**
     * Store the cart in session
     *
     * @return array an optimized session object
     */
    public function store(array $input): array
    {
        $sessioncData = $this->retrieve();

        $this->reduce($sessioncData, $input);
        $sessionCart = $this->makeSessionObject();
        session(['cart' => $sessionCart]);

        return $sessionCart;
    }

    /**
     * Make the Cart object ready to dipslay
     *
     * @return array a simplified form of the Cart
     */
    public function prepareViewFields(): array
    {
        $result = $this->computeCart();

        return $result;
    }

    /**
     * Optimize the cart so that there's no duplicate key
     * This allows the compute the exact sum of a given product
     * accordingly to its actual quantity
     *
     * @param array $sessioncData state of the cart in session
     * @param array $input data to update the cart with
     * @return Cart Cart object
     */
    public function reduce(array $sessioncData, ?array $input = null): void
    {

        $sessionContent = $sessioncData['content'];

        foreach ($sessionContent as $key => $item) {
            if (is_array($item)) {
                continue;
            }
            $this->add(["$key" => $item]);
        }

        if ($input === null) {
            return;
        }

        $content = $input["type"] === "Cart" && isset($input["content"]) ?  $input["content"] : null;
        if ($content !== null) {

            foreach ($content as $item) {
                $this->add(["{$item['productId']}" => $item['quantity']]);
            }
        }
    }


    

}
