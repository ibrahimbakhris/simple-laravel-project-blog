<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') | Aplikasi Blog</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <x-style />
    </head>
    <body class="bg-white text-gray-900 min-h-screen flex flex-col">
        <!-- Navigation -->
        <x-navbar/>

        <!-- Main Content -->
        <main class="flex-1">
        <div class="max-w-6xl mx-auto px-6 py-16">
            @yield('content')
            @yield('scripts')
        </div>
        </main>

        <!-- Footer -->
        <x-footer/>
    </body>
</html>
