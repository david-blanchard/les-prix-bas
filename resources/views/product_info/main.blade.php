<nav id="breadcrumb0" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Hi-Fi</a></li>
        <li class="breadcrumb-item"><a href="#">Platines Vinyles</a></li>
        <li class="breadcrumb-item active" aria-current="page">Auna</li>
    </ol>
</nav>

<div class="container marketing" >

    <div class='row featurette'>
        @include('product_info.tabs')
 
        <div class='col-md-5 order-md-1'>
            <img
            src='{{ $props->image }}' alt='{{ $props->caption }}'
            class='bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto' width='500' height='500'
            preserveAspectRatio='xMidYMid slice' focusable='false' aria-label='{{ $props->caption }}'
            />
        </div>
    </div>
</div>