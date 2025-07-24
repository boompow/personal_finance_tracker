<x-layout>
    <div class="md:w-[80%] w-[100%] bg-blue-50 shadow-md rounded-lg flex flex-col">
        <div class="p-6 flex flex-col gap-3">

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
            <div class="ml-6 flex flex-col gap-3 text-lg">
                <p><strong>Item : </strong>{{$transaction->item}}</p>
                <p><strong>Amount : </strong>{{$transaction->amount}}</p>
                <p><strong>Price : </strong>{{$transaction->price}}</p>
                <p><strong>Category : </strong>{{$transaction->category->name}}</p>
                <p><strong>Remark : </strong>{{$transaction->note}}</p>
            </div>
            <p class="w-[100%] text-end italic text-slate-600 mt-4 mr-2 ">{{$transaction->created_at}}</p>
        </div>
        <div class="bg-slate-300 w-[100%] flex justify-end items-center rounded-b-lg px-4">
            <button onclick="window.location='{{route('transactions.gotoedit', $transaction->id)}}'" class="blue-btn">Edit</button>
            <form action="{{route('transactions.delete', $transaction->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="red-btn" type="submit">Delete</button>
            </form>
        </div>
    </div>
</x-layout>