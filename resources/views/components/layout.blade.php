<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('css')

</head>
<body>
    <div id="app" class="app">

        <section class="px-8 py-4 mb-6">
            <header class="mx-auto">
                <h1>
                    <a href="{{ route('home') }}">
                        <img src="/images/logo.svg" alt="Tweety">
                    </a>
                </h1>
            </header>
        </section>

        {{ $slot }}

    </div>

    <script src="https://unpkg.com/turbolinks"></script>
</body>
</html>
