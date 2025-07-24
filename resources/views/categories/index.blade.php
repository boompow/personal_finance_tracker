<x-layout>
    <div x-data="{dialog: false, category: null}" class="flex w-[100%] items-center justify-center">
        <div class="flex max-md:flex-col gap-4 m-2 md:w-[80%]">
            {{-- expense categories --}}
            <div class="bg-white rounded-lg border border-slate-400 md:w-[50%] p-4">
                {{-- add more categories --}}
                <div class="w-[100%] flex gap-4 items-center justify-between pb-1 my-1 border-b border-b-slate-400">
                    <h1 class="text-2xl my-2 font-bold text-slate-800">Expense Categories</h1>
                    <button onclick="window.location='{{route('categories.goto', 'expense')}}'" class="green-btn">+</button>
                </div>
                <div class="flex flex-wrap">
                    @foreach ($categories as $category)
                        @if ($category->type === 'expense')
                            <div x-on:click="dialog = true, category = @js($category->id)" class="red-tag">{{$category->name}}</div> 
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- income categories --}}
            <div class="bg-white rounded-lg border border-slate-400 md:w-[50%] p-4">
                {{-- add more categories --}}
                <div class="w-[100%] flex gap-4 items-center justify-between pb-1 my-1 border-b border-b-slate-400">
                    <h1 class="text-2xl font-bold text-slate-800">Income Categories</h1>
                    <button onclick="window.location='{{route('categories.goto', 'income')}}'" class="green-btn">+</button>
                </div>
                <div class="flex flex-wrap my-2">
                    @foreach ($categories as $category)
                        @if ($category->type === 'income')
                            <div x-on:click="dialog = true, category = @js($category->id)" class="green-tag">{{$category->name}}</div> 
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        {{-- category delete dialog box --}}
        <dialog x-show="dialog" x-on:click.outside="dialog = false" open class="rounded-lg bg-slate-100 shadow-md px-[3rem] py-4 flex flex-col items-center fixed top-[50%] left-[50%] -translate-[50%]">
            <p class="w-[100%] my-4">Are you sure you want to delete this category?</p>
            <div class="w-[100%] flex items-center p-2 justify-end">
                <form action="{{route('categories.index')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- assess the security risk of the code below --}}
                    <input type="text" hidden x-model="category" name="category_id"> 
                    <button class="red-btn" type="submit">Delete</button>
                </form>
                {{-- routing to category delete controller using alpine on click attribute --}}
                <button x-on:click="dialog = false" class="blue-btn">Cancel</button>
            </div>
        </dialog>
    </div>
</x-layout>