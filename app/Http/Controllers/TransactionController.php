<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transaction = Transaction::orderBy("created_at, asc")->paginate(10);

        return view('transactions.index', ['transactions', $transaction]);
    }
}
