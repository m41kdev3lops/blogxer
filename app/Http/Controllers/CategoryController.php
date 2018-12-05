<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\CategoryCreateRequest;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('isAdmin')->only([
            'store', 'create'
        ]);

        $this->categoryService = $categoryService;
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


    public function store(CategoryCreateRequest $request)
    {
        $this->categoryService->add( $request->all() );

        swal("Category added");

        return redirect('/');
    }


    public function destroy( $id )
    {
        return $this->categoryService->delete($id);
    }
}
