<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::with('category')->orderBy("created_at", "asc")->paginate(10);

        return view('transactions.index', ['transactions'=>$transactions]);
    }


    public function show($id){
        $transaction = Transaction::with('category')->findOrFail($id);

        return view("transactions.show", ['transaction'=>$transaction,]);
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
            'category_id'=> 'required|integer|gte:0',
        ]);

        // fake user
        $merged = [...$validated, 'user_id'=> 1];
        
        Transaction::create($merged);


        return redirect()->route('welcome')->with('success', "Transaction created successfully!");
    }

    public function goto($type){
        $categories = Category::all();
        return view('transactions.create', ['type'=>$type, 'categories'=>$categories]);
    }

    public function gotoedit($id){
        $transaction = Transaction::with('category')->findOrFail($id);
        $categories = Category::all();

        return view('transactions.edit', ['transaction'=>$transaction, 'categories'=>$categories]);
    }

    public function edit(Request $request, $id){
        $validated = $request->validate([
            'item'=> 'required|string|max:100',
            'amount'=> 'required|integer|gte:0',
            'price'=> 'required|numeric|gt:0',
            'note'=> 'nullable|string|max:1000',
            'type'=>'required|in:expense,income',
            'category_id'=> 'required|integer|gte:0',
        ]);

        $transaction = Transaction::findOrFail($id);

        $transaction->update($validated);

        return view('transactions.show', ['id'=>$id, 'transaction'=>$transaction]);
    }
}
