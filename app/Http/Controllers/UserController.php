<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $transactions = Transaction::with('category')->orderBy("created_at", "desc")->paginate(10);

        // calculating the balance of the total expense and income
        $total = 0;

        foreach($transactions as $transaction){
            $price = $transaction->price;
            $amount = $transaction->amount;
            $type = $transaction->type;

            if($type === "expense"){
                $total -= ($price * $amount);
            }
            elseif($type === "income"){
                $total += ($price * $amount);
            }
        }

        return view('welcome', ['transactions'=>$transactions, 'total'=>$total]);
    }
}
