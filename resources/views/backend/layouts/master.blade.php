<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title',config('app.name'))</title>
    <meta name="googlebot" content="noindex">
    @include('backend.layouts.inc.head')
</head>
<body id="page-top">
<div id="wrapper">
    @include('backend.layouts.inc.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('backend.layouts.inc.topbar')
            @yield('content')

        </div>

        @include('backend.layouts.inc.footer')
    </div>
    <!-- End of Content Wrapper -->

</div>

@include('backend.layouts.inc.footer-script')
</body>

</html>
