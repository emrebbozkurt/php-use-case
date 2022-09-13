<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <!-- Bootstrap icons-->
    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet"/>
    @include('layouts.head')
</head>
<body>
@include('layouts.navbar')
@yield('body')

@include('layouts.footer')
</body>
</html>
