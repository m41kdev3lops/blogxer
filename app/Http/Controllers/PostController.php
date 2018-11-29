<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->only([
            'destroy', 'create', 'store'
        ]);
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'           => 'required',
            'title'                 => 'required|unique:posts',
            'short_description'     => 'required',
            'body'                  => 'required',
        ]);

        $post = new Post;

        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->body = $request->body;

        $post->save();

        swal("Post added");

        return redirect( $post->getLink() );
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function destroy(Post $post)
    {
        $post->comments()->delete();
        $post->delete();

        swal("Post Deleted!");

        return redirect()->back();
    }
}
