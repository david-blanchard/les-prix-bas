@php
    $home = $_SERVER['REQUEST_URI'];
    $logo = '/assets/images/logos/lesprixbas_small.png';
@endphp
  <header>
      <nav class='navbar navbar-expand-md fixed-top navbar-dark bg-white shadow-sm'>
          <a class='navbar-brand mr-auto mr-lg-0' href='{{ $home }}'>
              <img src='{{ $logo }}' alt='Cpascher' />
          </a>

          <a class='navbar-toggler p-0 border-0' type='button' data-toggle='offcanvas' href='{{ $home }}'>
              <span class='navbar-toggler-icon' />
          </a>

          <div class='navbar-collapse offcanvas-collapse' id='navbarsExampleDefault'>
              <ul class='navbar-nav navbar-dark mr-auto'>
                  <li class='nav-item active'>
                      <a class='nav-link text-dark' href='{{ $home }}'>Tous nos rayons <span class='sr-only'>(current)</span></a>
                  </li>
                  <li class='nav-item'>
                      <a class='nav-link text-dark' href='{{ $home }}'>Promos de l'été</a>
                  </li>
                  <li class='nav-item dropdown'>
                      <a class='nav-link text-dark dropdown-toggle' href='{{ $home }}' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Mon compte</a>
                      <div class='dropdown-menu' aria-labelledby='dropdown01'>
                          <button class='dropdown-item' href='{{ $home }}'>Pas encore inscrit ?</button>
                          <button class='dropdown-item' href='{{ $home }}'>F.A.Q</button>
                          <button class='dropdown-item' href='{{ $home }}'>Mentions légales</button>
                      </div>
                  </li>
              </ul>
              @include('search.search_nav_bar')
              @include('cart.cart_nav_button')
          </div>
      </nav>

      <div class='nav-scroller bg-light shadow-sm'>
          <nav class='nav nav-underline'>
              <a class='nav-link disabled' href='{{ $home }}'>
                  <span class='badge badge-pill bg-light align-text-bottom'>Nos partenaires</span>
              </a>
              <a class='nav-link' href='{{ $home }}'>Voyages.pascher </a>
              <a class='nav-link' href='{{ $home }}'>Locations.pascher</a>
              <a class='nav-link' href='{{ $home }}'>Voitures.pascher</a>
          </nav>
      </div>
  </header>