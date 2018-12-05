<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    protected $post;

    public function __construct( Post $post )
    {
        $this->post = $post;
    }


    public function all()
    {
        return $this->post->getPublished();
    }


    public function create( array $data )
    {
        return $this->post->create($data);
    }


    public function find( int $id )
    {
        return $this->post->find($id);
    }


    public function delete( int $id )
    {
        return $this->find($id)->delete();
    }
}
