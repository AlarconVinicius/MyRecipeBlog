<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Foodeiblog Template">
    <meta name="keywords" content="Foodeiblog, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Receitas de Casal</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Unna:400,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('blog_assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog_assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog_assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog_assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog_assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog_assets/css/style.css') }}" type="text/css">

    <!-- Unique Styles -->
    @yield("style")
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Responsive navbar-->
    <x-blog.navbar-responsive />
    <!-- Header-->
    <x-blog.header />
    <!-- Main Content-->
    @yield('content')
    <!-- Footer-->
    <x-blog.footer />

    <!-- Js Plugins -->
    <script src="{{ asset('blog_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('blog_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('blog_assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('blog_assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('blog_assets/js/main.js') }}"></script>

    <!-- Unique Scripts -->
    @yield("script")
</body>
</html>