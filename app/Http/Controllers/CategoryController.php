<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->only([
            'store', 'create'
        ]);
    }


    public function show(Category $category)
    {
        $posts = $category->posts()->where('is_published', 1)->get();

        return view('categories.show', compact('category', 'posts'));
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|unique:categories'
        ]);

        $category = new Category;
        $category->name = $request->name;

        $category->save();

        swal("Category added");

        return redirect('/');
    }
}
