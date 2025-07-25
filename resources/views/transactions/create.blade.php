<x-app-layout>
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
    <input required class="input-bar" type="text" name="item" placeholder="Item name">

    <label class="font-bold mx-3" for="amount">Amount</label>
    <input required class="input-bar" type="number" name="amount" placeholder="Number of items">

    <label class="font-bold mx-3" for="price">Price (ETB)</label>
    <input required class="input-bar" type="number" name="price" placeholder="Item price">

    <label class="font-bold mx-3" for="price">Category</label>
    <select name="category_id" id="category_id" required  class="input-bar">
        <option value="" disabled selected>Select category</option>
        @foreach ($categories as $category)
            @if ($category->type === $type)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
        @endforeach
    </select>
    
    <label class="font-bold mx-3" for="note">Remark</label>
    <input class="input-bar" type="text" name="note" placeholder="Remark">

    <input type="hidden" class="input-bar" name="type" value={{$type}}>
    <button type="submit" class="green-btn !mt-6">Add</button>
   </form>
</x-app-layout>