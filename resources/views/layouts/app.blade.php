<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--gstatic fetch-->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @include('fragments.main_script_tags')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/mFix.css">
</head>
<body>
    <div id="app">
        @include('fragments.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
