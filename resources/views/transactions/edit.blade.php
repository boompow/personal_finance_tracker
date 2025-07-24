<x-layout>
    <div class="md:w-[80%] w-[100%] bg-blue-50 shadow-md rounded-lg flex flex-col">
        <form action="{{route('transactions.edit', $transaction->id)}}" method="POST" class="p-6 flex flex-col gap-3">
                @csrf
                @method('PUT')
                @switch($transaction->type)
                    @case('expense')
                    <div class="flex">
                        <x-bxs-down-arrow class="w-5 text-red-500" /><h1 class="pl-2 text-3xl font-bold">Expense</h1>
                    </div>
                        @break
                    @case('income')
                        <div class="flex">
                            <x-bxs-up-arrow class="w-5 text-green-500" /><h1 class="pl-2 text-3xl font-bold">Income</h1>
                        </div>
                        @break
                    @default
                        
                @endswitch
                <div x-data="{type: @js($transaction->type), categories: @js($categories), initial_category:'{{$transaction->category->id}}'}"  class="ml-6 flex flex-col gap-3 text-lg">
                    <div class="flex items-center">
                        <label class="font-bold mr-2" for="item">Item: </label>
                        <input class="my-1 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[70%]" name="item" placeholder="Add Item Name" type="text" value="{{$transaction->item}}">
                    </div>
                    <div class="flex items-center">
                        <label class="font-bold mr-2" for="amount">Amount: </label>
                        <input class="my-1 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[70%]" name="amount" placeholder="Number of items" type="text" value="{{$transaction->amount}}">
                    </div>
                    <div class="flex items-center">
                        <label class="font-bold mr-2" for="price">Price: </label>
                        <input class="my-1 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[70%]" name="price" placeholder="Add Item Price" type="text" value="{{$transaction->price}}">
                    </div>
                    <div class="flex items-center">
                        <label class="font-bold mr-2" for="item">Type: </label>
                        <select x-model="type" name="type" id="type" class="my-1 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[70%]">
                            <option value="" selected disabled>Select Transaction Type</option>
                            <option value="expense">Expense</option>
                            <option value="income">Income</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <label class="font-bold mr-2" for="item">Category: </label>
                        <select x-model="initial_category" name="category_id" id="category_id" class="my-1 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[70%]">
                            <option value="" selected disabled>Select Category</option>
                            {{-- because the categories shown depend on the transaction type selected I used alpin js properties --}}
                            <template x-for="category in categories.filter(c=>c.type === type)" :key="category.id">
                                <option :value="(category.id)" x-text="category.name"></option>
                            </template>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <label class="font-bold mr-2" for="note">Remark: </label>
                        <input class="my-1 border-b border-b-slate-400 px-2 py-1 outline-none md:w-[70%]" name="note" placeholder="Add Remark" type="text" value="{{$transaction->note}}">
                    </div>
                </div>
                <p class="w-[100%] text-end italic text-slate-600 mt-4 mr-2 ">{{$transaction->created_at}}</p>
                <button class="green-btn" type="submit">Save</button>
        </form>
        <div class="bg-slate-300 w-[100%] flex justify-end items-center rounded-b-lg px-4">
            <form action="{{route('transactions.delete', $transaction->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="red-btn" type="submit">Delete</button>
            </form>
        </div>
    </div>
</x-layout>