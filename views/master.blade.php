<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <title>Gestion de contacts - @yield('title')</title>
</head>
<body>
@include('header')

<main role="main" class="container">
    @yield('main')
</main>

@include('footer')
@yield('scripts')
</body>
</html>
