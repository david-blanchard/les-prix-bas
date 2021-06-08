@php 
    $hasNoImage = !isset($props->images[0]);
    $isAdmin = \App\Http\Middleware\Admin::userIsAdmin();

    if($hasNoImage) {
        for($i = 0; $i < 4; $i++) {
            $image = new stdclass;
            $image->url = "/assets/images/misc/no-image.png";
            $image->alt = "pas d'image disponible";
            $image->title = "pas d'image disponible";

            array_push($props->images, $image);
        }
    }

    $image = $props->images[0];
    $size = 500;
@endphp

<div id="main-picto">
@include('product_info.image')
</div>

@php
    $size = 50;
@endphp

@foreach($props->images as $image)
@if ($loop->first)
<button class="btn focus" name="btn-picto" focusable="true" data-toggle="button" aria-pressed="true" >
@else
<button class="btn" name="btn-picto" focusable="true" data-toggle="button" aria-pressed="true" >
@endif
@include('product_info.image')
</button>
@endforeach

@if($isAdmin)
<div class="row bg-cyan justify-content-center my-3 mx-3">
    <a href="{{ route('product_images_man.create', $props->id) }}" class="btn btn-danger">
        Ajouter des images au produit
    </a>
</div>
@endif