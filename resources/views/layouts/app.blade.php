<html lang="en" class="h-100">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/footer.css" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 1280px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
            #breadcrumb0 {
                position: sticky;
                padding-top: 31px;
                float: left;
            }
        }

        @media (max-width: 420px) {
            #dropdown01 {
                bottom: 88px;
                position: relative;
                left: 59%;
            }
            #cartCta {
                bottom: 88px;
                position: relative;
                left: 61%;
            }
            #navbar0 {
                height: 88px;
            }
            #subnavbar0 {
                height: 44px;
            }

            #breadcrumb0 {
                position: sticky;
                padding-top: 55px;
                float: left;
            }
            
            #form0 {
                width: 100%;
            }
        }
    </style>
    @yield('stylesheets')
    <script src="/assets/js/vendor/jquery.slim.min.js"></script>
    <script src="/assets/dist/js/bootstrap.bundle.js"></script>
    <script src="/js/cookies.js"></script>
    @yield('header_javascripts')

</head>

<body class="d-flex flex-column h-100">
    @include('app.header')
    @yield('children')
    @include('app.footer')
    <script src="/js/main.js"></script>
    <script src="/js/cart.js"></script>
    <script src="/js/promo.js"></script>
    <script>
        showCookiesPopin();
    </script>
    @yield('body_javascripts')
    
</body>

</html>