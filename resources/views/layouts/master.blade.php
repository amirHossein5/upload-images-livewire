<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head-tag')
    @yield('head-tag')

    @include('layouts.style')
    @yield('styles')
    @stack('styles')
</head>

<body class="min-h-screen bg-gray-800">

    @yield('content')

    @include('layouts.scripts')
    @yield('scripts')
    @stack('scripts')
</body>

</html>
