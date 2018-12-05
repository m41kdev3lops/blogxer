<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    protected $postService;

    public function __construct( PostService $postService )
    {
        $this->middleware('isAdmin')->only([
            'destroy', 'create', 'store'
        ]);


        $this->postService = $postService;
    }


    public function index()
    {
        $posts = $this->postService->index();

        return view('home', compact('posts'));
    }


    public function create()
    {
        return $this->postService->showCreateForm();
    }


    public function store(PostCreateRequest $request)
    {
        $post = $this->postService->store( $request->all() );

        swal("Post added");

        return redirect( $post->getLink() );
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function destroy($id)
    {
        $this->postService->destroy($id);

        swal("Post Deleted!");

        return redirect('/');
    }
}
