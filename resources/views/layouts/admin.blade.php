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
    <link rel="stylesheet" href="/css/index.css" />


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    @yield('stylesheets')
    <script src="/assets/js/vendor/jquery.slim.min.js"></script>
    <script src="/assets/dist/js/bootstrap.bundle.js"></script>
    @yield('header_javascripts')

</head>

<body class="d-flex flex-column h-100">
    @include('admin.header')
    @yield('children')
    @include('admin.footer')
    @yield('body_javascripts')
    
</body>

</html>