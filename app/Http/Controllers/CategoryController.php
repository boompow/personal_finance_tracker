<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $expenseCategories = Category::where('user_id', Auth::id())->where('type', 'expense')->orderBy("created_at", "desc")->get();
        $incomeCategories = Category::where('user_id', Auth::id())->where('type', 'income')->orderBy("created_at", "desc")->get();

        return view('categories.index', ['expenseCategories'=>$expenseCategories, 'incomeCategories'=>$incomeCategories]);
    }

    public function create(Request $request){
        $validated = $request->validate([
            'name'=> 'required|string|max:20',
            'type'=>'required|in:expense,income',
        ]);

        $merged = [...$validated, 'user_id'=>Auth::id()];

        Category::create($merged);

        return redirect()->route('categories.index')->with('success', "New Category Created!");

    }


    public function delete(Request $request){
        $id = $request->input('category_id');
        $category = Category::where('user_id', Auth::id())->findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')->with('success', "Category Deleted Successfully!");
    }

    public function goto($type){
        return view('categories.create', ['type'=>$type]);
    }
}
