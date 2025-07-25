<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Money Track</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a class="text-2xl" href="/"><strong class="pr-1 uppercase">Track</strong>Money</a>
            </div>

            {{-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div> --}}

            <main class="min-h-[calc(100vh-7rem)] flex flex-col pt-[3rem] p-4 items-center justify-center">
                {{$slot}}
            </main>

            <footer class="px-4 h-[2.5rem] flex items-center justify-center text-center border-t border-t-slate-200 text-slate-800">
                <p>Made with ❤️ by <a href="https://github.com/boompow" target="_space" class="hover:text-red-500 active:text-red-600">Boom Pow</a></p>
            </footer>
        </div>
    </body>
</html>
