<x-layout>
    <div class="flex max-md:flex-col gap-4 m-2 md:w-[80%]">
        <div class="p-4 bg-white rounded-lg border border-slate-300 md:w-[50%]">
            <h1 class="text-2xl my-2 font-bold text-slate-800">Expense Categories</h1>
            <div class="flex flex-wrap">
                @foreach ($categories as $category)
                    @if ($category->type === 'expense')
                        <div class="red-tag">{{$category->name}}</div> 
                    @endif
                @endforeach

                {{-- add more categories --}}
                <div onclick="window.location='{{route('categories.goto', 'expense')}}'" class="slate-tag">+ Add</div>
            </div>
        </div>
        <div class="p-4 bg-white rounded-lg border border-slate-300 md:w-[50%]">
            <h1 class="text-2xl my-2 font-bold text-slate-800">Income Categories</h1>
            <div class="flex flex-wrap">
                @foreach ($categories as $category)
                    @if ($category->type === 'income')
                        <div class="green-tag">{{$category->name}}</div> 
                    @endif
                @endforeach

                 {{-- add more categories --}}
                <div onclick="window.location='{{route('categories.goto', 'income')}}'" class="slate-tag">+ Add</div>
            </div>
        </div>
    </div>
</x-layout>