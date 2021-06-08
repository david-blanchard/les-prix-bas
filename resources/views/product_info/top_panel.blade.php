<div class="row">
    <div class=""> {{ $props->name }} </div>
</div>
<div class="row justify-content-between">
    <div class=""> {{ $props->brand }} </div>
    <div class="">
        <div id="price-tag" name="unit-price" class='badge badge-light sl-1'><del> {{ $props->price }}&nbsp; <i class="fa fa-euro"></i> </del></div>
        <div id="price-tag" name="unit-price">
            <button type="button" class="btn btn-success">
                <span class="">
                    {{ $props->discount }}&nbsp;<i class="fa fa-euro"></i>
                </span>
            </button>
        </div>
    </div>
</div>