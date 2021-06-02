@php
    $home = $_SERVER['REQUEST_URI'];
    $logo_desktop = '/assets/images/logos/lesprixbas_small.png';
    $logo_mobile = '/assets/images/logos/lesprixbas_smaller.png';
@endphp

<header>
    <nav id="navbar0" class='navbar navbar-expand-md fixed-top navbar-dark bg-white shadow-sm'>
        <a class='navbar-brand mr-auto mr-lg-0' href='{{ $home }}'>
            <picture>
                <source 
                srcset="{{ $logo_mobile }}" media="(max-width: 1200px)" 
                srcset="{{ $logo_desktop }}" media="(min-width: 1200px)" 
                />
                <img id="logo" src='{{ $logo_desktop }}' alt='Les Prix Bas' />

            </picture>
        </a>

        <a class='navbar-toggler p-0 border-0' type='button' data-toggle='offcanvas' href='{{ $home }}'>
            <span class='navbar-toggler-icon' />
        </a>

        <div id="subnavbar0" class='navbar-collapse offcanvas-collapse'>
            <ul class="navbar-nav navbar-dark mr-auto">
            </ul>
            @include('search.search_nav_bar')
            @include('cart.cart_nav_button')
            @include('user.user_nav_button')
        </div>
    </nav>

    <div class='nav-scroller bg-light shadow-sm'>
        <nav class='nav nav-underline'>
            <li class='nav-item active'>
                <a class='nav-link badge badge-pill bg-light align-text-bottom' href='{{ $home }}'>Tous nos rayons <span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
                <a class='nav-link text-dark' href='{{ $home }}'>Promos</a>
            </li>
        </nav>
    </div>
</header>