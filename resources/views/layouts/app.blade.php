<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>livewire</title>
    {{-- styles --}}
    @livewireStyles()
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{--  --}}
    
    @yield('styles')

</head>

<body class="bg-gray-800 min-h-screen">

    @yield('content')

    {{-- scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.17/sweetalert2.all.min.js"></script>
    @livewireScripts()
    <script src="{{ mix('js/app.js') }}"></script>
    {{--  --}}

    @yield('script')

</body>

</html>
