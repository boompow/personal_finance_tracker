<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $transactions = Transaction::where('user_id', Auth::id())->with('category')->orderBy("created_at", "desc")->paginate(10);

        $user = Auth::user();

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

        return view('dashboard', ['transactions'=>$transactions, 'total'=>$total, 'user'=>$user]);
    }
}
