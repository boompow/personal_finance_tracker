<x-app-layout>
    <form action="{{route('categories.create')}}" method="POST"
    class="bg-white border border-slate-400 rounded-lg p-6 m-2 flex flex-col justify-start max-w-[800px] w-[100%]"
   >
    @csrf
    @method('POST')

    @switch($type)
        @case('expense')
            <h1 class="text-3xl font-bold mb-4 text-slate-800">Create Expense Category</h1>
            @break
        @case('income')
            <h1 class="text-3xl font-bold mb-4 text-slate-800">Create Income Category</h1>
            @break           
    @endswitch
    <label class="font-bold mx-3" for="item">Category</label>
    <input required class="my-3 ml-6 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[80%] " type="text" name="name" placeholder="Item name">

    <input type="hidden" class="my-3 ml-6 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[80%] italic text-slate-800 " name="type" value={{$type}}>

     <button type="submit" class="green-btn !mt-6">Create</button>
</form>
</x-app-layout>