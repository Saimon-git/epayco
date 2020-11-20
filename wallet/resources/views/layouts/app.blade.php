<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel = "icon" type="image/png" href="{{ config('app.logo_compacted') }}">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-screen antialiased leading-none bg-gray_body">
<div id="app" class="h-full">
    <div class="flex h-full flex-wrap">
        <div class="w-full  bg-gray_body" id="content-ppal">
            <div class="flex flex-wrap">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
