<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Finance Tracker</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <nav class="fixed top-0 flex backdrop-blur-sm z-50 px-4 h-[3rem] border-b border-b-slate-200 items-center w-[100vw] text-slate-800">
            <a class="text-2xl" href="/"><strong class="pr-1 uppercase">Track</strong>Money</a>
            <div class="absolute right-4 flex gap-4">
                <a class="hover:text-red-500 mx-4" href="{{route('categories.index')}}">Categories</a>
                <a class="hover:text-red-500 mx-4" href="{{route('reports.index')}}">Report</a>
            </div>
        </nav>
    </header>
    {{-- flash message for successful response --}}
    @if (session('success'))
        <div class="mt-[3rem] p-4 text-center bg-green-50 text-green-500 text-bold">
            {{session('success')}}
        </div>
    @endif
    <main class="min-h-[calc(100vh-2.5rem)] flex flex-col pt-[3rem] p-4 items-center justify-center">
        {{$slot}}
    </main>
    <footer class="px-4 h-[2.5rem] flex items-center justify-center text-center border-t border-t-slate-200 text-slate-800">
        <p>Made with ❤️ by <a href="https://github.com/boompow" target="_space" class="hover:text-red-500 active:text-red-600">Boom Pow</a></p>
    </footer>
</body>
</html>