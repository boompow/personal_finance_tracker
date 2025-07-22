<x-layout>
    <div class="w-[100%] h-[100%] flex flex-col items-center justify-center">
       <div class="flex flex-col my-4 backdrop-blur-md bg-blue-50/80 shadow-md border-slate-800 p-6 rounded-lg md:w-[80%] w-[100%]">
        <h1 class="text-4xl font-bold line mb-2">John Doe</h1>
        <label class="text-lg font-semibold ml-4 mb-2" for="balance">Balance</label>
        <div class="flex ml-4 text-6xl">
            @if ($total < 0)
                <x-bxs-down-arrow class="w-5 text-red-500" />
            @else
                <x-bxs-up-arrow class="w-5 text-green-500" />
            @endif
            <h1 class="text-blue-950 font-semibold m-2">{{$total}} ETB</h1>
        </div>
        <div class="flex my-2 items-center justify-end gap-4">
            <button class="red-btn" onclick="window.location='{{route('transactions.goto', 'expense')}}'">- Expense</button>
            <button class="green-btn" onclick="window.location='{{route('transactions.goto', 'income')}}'">+ Income</button>
        </div>
       </div>
       <div class="flex flex-col gap-2 md:w-[80%] w-[100%]">
            <table class="text-start table-fixed border-separate border-spacing-y-2">
                <thead class="bg-slate-200 text-slate-800">
                    <tr class="rounded-lg">
                        <th class="p-2 text-start">Date</th>
                        <th class="p-2 text-start">Type</th>
                        <th class="p-2 text-start">Item</th>
                        <th class="p-2 text-start">Amount</th>
                        <th class="p-2 text-start">Price (ETB)</th>
                        <th class="p-2 text-start">Category</th>
                        <th class="p-2 text-start">User</th>
                        <th class="p-2 text-start">Note</th>
                    </tr>
                </thead>
                <tbody class="mb-2">

                    @foreach ($transactions as $transaction) 
                    <tr class="bg-slate-50 my-2 hover:bg-gray-200 cursor-pointer"
                    onclick="window.location='{{route('transactions.show', $transaction->id)}}'"
                    >
                        <td class="px-3 py-2">{{$transaction->created_at}}</td>
                        <td class="px-3 py-2">
                            @switch($transaction->type)
                                @case("expense")
                                    <x-bxs-down-arrow class="w-3 text-red-500" />
                                    @break
                                @case('income')
                                    <x-bxs-up-arrow class="w-3 text-green-500" />
                                    @break
                            @endswitch
                        </td>
                        <td class="px-3 py-2">{{$transaction->item}}</td>
                        <td class="px-3 py-2">{{$transaction->amount}}</td>
                        <td class="px-3 py-2">{{$transaction->price}}</td>
                        <td class="px-3 py-2">{{$transaction->category_id}}</td>
                        <td class="px-3 py-2">{{$transaction->user_id}}</td>
                        <td class="px-3 py-2">{{$transaction->note}}</td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            <div class="mt-2 border-t border-t-slate-300 p-4">
                {{$transactions->links()}}
            </div>
       </div>
    </div>
</x-layout>