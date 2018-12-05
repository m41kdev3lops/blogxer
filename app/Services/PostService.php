<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    protected $postRepo;

    public function __construct( PostRepository $postRepo )
    {
        $this->postRepo = $postRepo;
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
}
