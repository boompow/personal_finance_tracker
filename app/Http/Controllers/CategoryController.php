<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy("created_at", "desc")->paginate(10);

        return view('categories.index', ['categories'=>$categories]);
    }

    public function create(Request $request){
        $validated = $request->validate([
            'name'=> 'required|string|max:20|min:1',
            'type'=>'required|in:expense,income',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', "New Category Created!");

    }


    public function delete(Request $request){
        $id = $request->input('category_id');
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')->with('success', "Category Delted Successfully!");
    }

    public function goto($type){
        return view('categories.create', ['type'=>$type]);
    }
}
