<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository
{
    protected $comment;

    public function __construct( Comment $comment )
    {
        $this->comment = $comment;
    }


    public function create( int $id, array $request )
    {
        return $this->comment->create([
            'post_id'           => $id,
            'user'              => $request['name'],
            'body'              => $request['body']
        ]);
    }
}
