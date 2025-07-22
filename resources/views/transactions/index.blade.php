<x-layout>
    @foreach ($transactions as $transaction)    
        <ul class="my-2 bg-slate-50 rounded-md w-[100%] p-3">
            <li>{{$transaction->item}}</li>
            <li>{{$transaction->amount}}</li>
            <li>{{$transaction->price}}</li>
            <li>{{$transaction->user_id}}</li>
            <li>{{$transaction->category_id}}</li>
            <li>{{$transaction->note}}</li>
        </ul>
    @endforeach
    
</x-layout>