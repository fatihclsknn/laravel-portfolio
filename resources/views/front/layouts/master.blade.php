<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    @include('front.layouts.inc.head')

    <title>@yield('title',config('app.name'))</title>


</head>
<body>
    @include('front.layouts.inc.navbar')
    @yield('content')
    @include('front.layouts.inc.footer')

    @include('front.layouts.inc.footerScript')


</body>
</body>
</html>
