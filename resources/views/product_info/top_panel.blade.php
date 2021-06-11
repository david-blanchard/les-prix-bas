@php
    use App\Library\Utils\MiscUtils;
    $hasDiscount = $props->discount > 0;
    $priceTag = $hasDiscount ? $props->discount : $priceTag = $props->price;

    $priceTag = MiscUtils::formatPrice($priceTag);
    $basePrice = MiscUtils::formatPrice($props->price);
@endphp
<div class="row">
    <div id="product" name="product-data" data-id="{{ $props->id }}"> {{ $props->name }} </div>
</div>
<div class="row justify-content-between">
    <div> {{ $props->brand }} </div>
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