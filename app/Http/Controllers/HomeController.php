<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::getPublished();

        return view('home', compact('posts'));
    }
}
