@php
    $home = $_SERVER['REQUEST_URI'];
@endphp

<button type="button" class="btn btn-secondary dropdown-toggle my-2 my-sm-0 ml-3"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-user"></i>
</button>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby='dropdown01'>
    <button class='dropdown-item' href='{{ $home }}'>Connexion</button>
    <button class='dropdown-item' href='{{ $home }}'>Pas encore inscrit ?</button>
    <button class='dropdown-item' href='{{ $home }}'>F.A.Q</button>
    <button class='dropdown-item' href='{{ $home }}'>Mentions légales</button>
</div>

