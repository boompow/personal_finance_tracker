<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::where('user_id', Auth::id())->with('category')->orderBy("created_at", "asc")->paginate(10);

        // dashboard is the new transaction.index
        return view('dashboard', ['transactions'=>$transactions]);
    }


    public function show($id){
        $transaction = Transaction::where('user_id', Auth::id())->with('category')->findOrFail($id);

        return view("transactions.show", ['transaction'=>$transaction,]);
    }

    public function delete($id){
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);
        $transaction -> delete();

        return redirect()->route('dashboard')->with('success','Transaction Deleted Successfully!');
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
        $merged = [...$validated, 'user_id'=> Auth::id()];
        
        Transaction::create($merged);


        return redirect()->route('dashboard')->with('success', "Transaction created successfully!");
    }

    public function goto($type){
        $categories = Category::where('user_id', Auth::id())->get();
        return view('transactions.create', ['type'=>$type, 'categories'=>$categories]);
    }

    public function gotoedit($id){
        $transaction = Transaction::where('user_id', Auth::id())->with('category')->findOrFail($id);
        $categories = Category::where('user_id', Auth::id())->get();

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

        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);

        $transaction->update($validated);

         return redirect()->route('transactions.show', ['id'=>$id, 'transaction'=>$transaction])->with('success','Transaction Edited Successfully!');
    }
}
