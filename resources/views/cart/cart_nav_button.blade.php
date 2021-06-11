@php
    use App\Library\Types\Cart;
    use App\Library\Utils\MiscUtils;

    $cart = new Cart;
    $fields = $cart->prepareViewFields();
    $total = MiscUtils::formatPrice($fields['total']);
    $quantity = $fields['quantity'];
@endphp


<button id="cart-cta" class="btn btn-success my-2 my-sm-0 ml-3" href="javascript:void(0)">
    <i class="fa fa-shopping-cart"></i>
    <span id="cart-count" name="quantity" class="badge badge-light sl-1">{{ $quantity }}</span>
    <span id="cart-total" name="price" class="badge badge-light sl-1">{{ $total }}</span>
    <i class="fa fa-euro"></i>
</button>
