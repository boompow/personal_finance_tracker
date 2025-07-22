<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('welcome');

// Transaction CRUD
Route::get('/transactions/index', [TransactionController::class, 'index'])->name("transactions.index");
Route::get('/transactions/show/{id}', [TransactionController::class, 'show'])->name("transactions.show");
Route::post('/transactions/create', [TransactionController::class, 'create'])->name("transactions.create");
Route::get('/transactions/create/{type}', [TransactionController::class, 'goto'])->name("transactions.goto");
Route::delete('/transactions/show/{id}', [TransactionController::class, 'delete'])->name("transactions.delete");

// Category CRUD
Route::get('/categories/index', [CategoryController::class, 'index'])->name("categories.index");
Route::post('/categories/create', [CategoryController::class, 'create'])->name("categories.create");
Route::get('/categories/create/{type}', [CategoryController::class, 'goto'])->name("categories.goto");
Route::delete('/categories/index/{id}', [CategoryController::class, 'delete'])->name("categories.delete");

// Report CRUD
Route::get('/reports/index', function () {
    return view('reports.index');
})->name("reports.index");
