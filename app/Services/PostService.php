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
}
