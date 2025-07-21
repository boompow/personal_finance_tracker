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
        <nav class="flex w-[100vw] px-4 h-[3rem] border-b border-b-slate-200 items-center relative text-slate-800">
            <a class="text-2xl" href="/"><strong class="pr-1 uppercase">Track</strong>Money</a>
            <div class="absolute px-4 right-0 flex gap-4">
                <a class="hover:text-red-500" href="{{route('transactions.index')}}">Transaction</a>
                <a class="hover:text-red-500" href="{{route('reports.index')}}">Report</a>
            </div>
        </nav>
    </header>
    <main class="w-[100vw] h-[calc(100vh-5.5rem)] flex flex-col p-4">
        {{$slot}}
    </main>
    <footer class="absolute px-4 h-[2.5rem] flex items-center justify-center w-[100vw] text-center bottom-0 border-t border-t-slate-200 text-slate-800">
        <p>Made with ❤️ by <a href="https://github.com/boompow" target="_space" class="hover:text-red-500 active:text-red-600">Boom Pow</a></p>
    </footer>
</body>
</html>