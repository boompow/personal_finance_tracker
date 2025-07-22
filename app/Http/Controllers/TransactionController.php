<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::orderBy("created_at", "asc")->paginate(10);

        return view('transactions.index', ['transactions'=>$transactions]);
    }


    public function show($id){
        $transaction = Transaction::findOrFail($id);

        return view("transactions.show", ['transaction'=>$transaction]);
    }

    public function delete($id){
        $transaction = Transaction::findOrFail($id);
        $transaction -> delete();

        return redirect()->route('welcome')->with('success','Transaction Deleted Successfully!');
    }

    public function create(Request $request){
        $validated = $request->validate([
            'item'=> 'required|string|max:100',
            'amount'=> 'required|integer|gte:0',
            'price'=> 'required|numeric|gt:0',
            'note'=> 'nullable|string|max:1000',
            'type'=>'required|in:expense,income',
            // 'category_id'=> 'required|integer|gte:0',
        ]);

        // fake user and category id
        $merged = [...$validated, 'user_id'=> 1, 'category_id'=>5];
        
        Transaction::create($merged);


        return redirect()->route('welcome')->with('success', "Transaction created successfully!");
    }

    public function goto($type){
        return view('transactions.create', ['type'=>$type]);
    }
}
