<x-layout>
   <form action="{{route('transactions.create')}}" method="POST"
    class="bg-white border border-slate-400 rounded-lg p-6 m-2 flex flex-col justify-start max-w-[800px] w-[100%]"
   >
    @csrf
    @method('POST')

    @switch($type)
        @case('expense')
            <h1 class="text-3xl font-bold mb-4 text-slate-800">Add Expense</h1>
            @break
        @case('income')
            <h1 class="text-3xl font-bold mb-4 text-slate-800">Add Income</h1>
            @break           
    @endswitch
    <label class="font-bold mx-3" for="item">Item</label>
    <input required class="my-3 ml-6 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[80%] " type="text" name="item" placeholder="Item name">

    <label class="font-bold mx-3" for="amount">Amount</label>
    <input required class="my-3 ml-6 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[80%] " type="number" name="amount" placeholder="Number of items">

    <label class="font-bold mx-3" for="price">Price (ETB)</label>
    <input required class="my-3 ml-6 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[80%] " type="number" name="price" placeholder="Item price">

    <label class="font-bold mx-3" for="note">Remark</label>
    <input class="my-3 ml-6 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[80%] " type="text" name="note" placeholder="Remark">

    <input type="hidden" class="my-3 ml-6 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[80%] italic text-slate-800 " name="type" value={{$type}}>
    <button type="submit" class="green-btn !mt-6">Add</button>
   </form>
</x-layout>