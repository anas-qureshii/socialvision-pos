<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    @stack('style')
    {{-- <script src={{asset("js/dist/echarts.min.js")}}></script> --}}


</head>

<body>
    <div class="w-full flex flex-wrap">
        @include('Elements.sidebar')
        <div class="w-full max-w-[calc(100%-250px)] ml-[250px] duration-300 ease-in-out transition-all" id="main-wrapper">
            @include('Elements.navbar')
            <div id="main-content" class="py-4 px-10 w-full block">
               @yield('content')
            </div>
            @include('Elements.footer')
        </div>
    </div>

    @yield('popup')

    <script src={{ asset('js/c-charts.js') }}></script>
    <script src={{ asset('js/development.js') }}></script>

    @stack('scripts')

</body>

</html>
