<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){
    // Transaction CRUD
    // dashboard is the new transaction.index
    Route::get('/dashboard', [UserController::class, 'index'])->name("dashboard");
    Route::get('/transactions/show/{id}', [TransactionController::class, 'show'])->name("transactions.show");
    Route::post('/transactions/create', [TransactionController::class, 'create'])->name("transactions.create");
    Route::put('/transactions/edit/{id}', [TransactionController::class, 'edit'])->name("transactions.edit");
    Route::get('/transactions/create/{type}', [TransactionController::class, 'goto'])->name("transactions.goto");
    Route::get('/transactions/edit/{id}', [TransactionController::class, 'gotoedit'])->name("transactions.gotoedit");
    Route::delete('/transactions/show/{id}', [TransactionController::class, 'delete'])->name("transactions.delete");
});

Route::middleware('auth')->group(function(){
    // Category CRUD
    Route::get('/categories/index', [CategoryController::class, 'index'])->name("categories.index");
    Route::post('/categories/create', [CategoryController::class, 'create'])->name("categories.create");
    Route::get('/categories/create/{type}', [CategoryController::class, 'goto'])->name("categories.goto");
    Route::delete('/categories/index', [CategoryController::class, 'delete'])->name("categories.delete");
});


Route::middleware('auth')->group(function(){
    // Report CRUD
    Route::get('/reports/index', function () {
        return view('reports.index');
    })->name("reports.index");
});
