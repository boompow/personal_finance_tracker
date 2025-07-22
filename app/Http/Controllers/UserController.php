<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $transactions = Transaction::orderBy("created_at", "asc")->paginate(10);

        return view('welcome', ['transactions'=>$transactions]);
    }
}
