<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>@yield('title')</title>
    <!-- Bootstrap icons-->
    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet"/>
    @include('layouts.head')
</head>
<body>
@yield('body')
@yield('footer')
</body>
</html>
