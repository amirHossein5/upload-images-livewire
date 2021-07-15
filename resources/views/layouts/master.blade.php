<!DOCTYPE html>
<html lang="{{ str_replace('-', '_', app()->getLocale()) }}">

<head>

    @include('layouts.head-tag')
    @yield('styles')

</head>

<body class="bg-gray-800 min-h-screen">

    @yield('content')

    @include('layouts.scripts')
    @yield('scripts')

</body>

</html>
