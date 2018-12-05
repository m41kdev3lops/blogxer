<?php

namespace App\Services;

use App\Category;
use App\Repositories\PostRepository;

class PostService
{
    protected $postRepo;

    public function __construct( PostRepository $postRepo )
    {
        $this->postRepo = $postRepo;
    }

    
    public function showCreateForm()
    {
        if ( ! Category::first() ) {
            swal("Please add a category first", 'error', 'error');
            
            return redirect('category/create');
        }

        return view('posts.create');
    }


    public function index()
    {
        return $this->postRepo->all();
    }


    public function store( array $request )
    {
        return $this->postRepo->create([
            'category_id'           => $request['category_id'],
            'title'                 => $request['title'],
            'short_description'     => $request['short_description'],
            'body'                  => $request['body']
        ]);
    }


    public function destroy( int $id )
    {
        return $this->postRepo->delete($id);
    }
}
