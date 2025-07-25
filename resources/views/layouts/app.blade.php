<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Track Money</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            {{-- flash message for successful response --}}
            @if (session('success'))
                <div class="p-4 text-center bg-green-50 text-green-500 text-bold">
                    {{session('success')}}
                </div>
            @endif

            <!-- Page Content -->
            <main class="min-h-[calc(100vh-7rem)] flex flex-col pt-[3rem] p-4 items-center justify-center">
                {{$slot}}
            </main>

            <!-- Footer -->
            <footer class="px-4 h-[2.5rem] flex items-center justify-center text-center border-t border-t-slate-200 text-slate-800">
                <p>Made with ❤️ by <a href="https://github.com/boompow" target="_space" class="hover:text-red-500 active:text-red-600">Boom Pow</a></p>
            </footer>
        </div>
    </body>
</html>
