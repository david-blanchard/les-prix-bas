@include('product_info.breadcrumb')
 
<div class="container marketing" >
    <div class='row featurette'>

        @include('product_info.tabs')
        <div class='col-md-5 order-md-1'>

            @php
                $image = $props->images[0];
                $size = 500;
            @endphp
            
            <div id="main-picto">
            @include('product_info.image')
            </div>

            @php
                $size = 50;
            @endphp

            @foreach( $props->images as $image)
            @if ($loop->first)
            <button id="first-picto" class="btn focus" focusable='true' name="btn-picto" data-toggle="button" aria-pressed="true" >
            @else
            <button class="btn"  name="btn-picto" focusable='true' data-toggle="button" aria-pressed="true" >
            @endif
            @include('product_info.image')
            </button>
            @endforeach
        </div>

    </div>
</div>