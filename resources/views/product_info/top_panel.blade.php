@php
use App\Library\Utils\MiscUtils;
$hasDiscount = $props->discount > 0;
$priceTag = $hasDiscount ? $props->discount : $props->price;

$priceTag = MiscUtils::formatPrice($priceTag);
$basePrice = MiscUtils::formatPrice($props->price);
@endphp

<div class="row mx-1">
    <div id="product" name="product-data" data-id="{{ $props->id }}">
        <h4 class='featurette-heading'>
            {{ $props->name }}
        </h4>
    </div>
</div>
<div class="row justify-content-between mx-1">
    <div> 
    <h5 class='featurette-heading'>
    {{ $props->brand }} 
    </h5>
    </div>
    <div>
        @if($hasDiscount)
        <div id="stroke-price-tag" name="unit-price" class='badge badge-light'><del> {{ $basePrice }}&nbsp; <i class="fa fa-euro"></i> </del></div>
        @endif
        <div id="price-tag" name="unit-price">
            <button type="button" class="btn btn-success">
                <span>
                    {{ $priceTag }}&nbsp;<i class="fa fa-euro"></i>
                </span>
            </button>
        </div>
    </div>
</div>