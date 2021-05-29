@php
    $home = route('home');
    $logo = '/assets/images/logos/lesprixbas_smaller.png';
@endphp

<header>
    <nav class='navbar navbar-expand-md fixed-top navbar-dark bg-white shadow-sm'>
        <a class='navbar-brand mr-auto mr-lg-0' href='{{ $home }}'>
            <img src='{{ $logo }}' alt='Cpascher' />
        </a>

        <a class='navbar-toggler p-0 border-0' type='button' data-toggle='offcanvas' href='{{ $home }}'>
            <span class='navbar-toggler-icon' />
        </a>

        <div class='navbar-collapse offcanvas-collapse'>
            <ul class="navbar-nav navbar-dark mr-auto">
            </ul>
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