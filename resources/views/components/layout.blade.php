<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tweety</title>

        <link rel="stylesheet" href="/css/main.css">
        @yield('css')
    </head>
    <body>
        <div id="app">
            {{ $slot }}
        </div>

        <script src="/js/app.js"></script>
        @yield('scripts')
    </body>
</html>
