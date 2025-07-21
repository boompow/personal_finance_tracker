<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transactions/index', [Transaction::class, 'index'])->name("transactions.index");

Route::get('/reports/index', function () {
    return view('reports.index');
})->name("reports.index");
