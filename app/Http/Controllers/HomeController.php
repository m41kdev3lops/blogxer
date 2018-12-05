<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    protected $postService;

    public function __construct( PostService $postService )
    {
        $this->postService = $postService;
    }


    public function index()
    {
        $posts = $this->postService->index();

        return view('home', compact('posts'));
    }
}
