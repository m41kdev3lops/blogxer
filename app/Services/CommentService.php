<?php

namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService
{
    protected $commentRepo;

    public function __construct( CommentRepository $commentRepo )
    {
        $this->commentRepo = $commentRepo;
    }

    
    public function add( int $id, array $request )
    {
        if ( loggedIn() ) $request['name'] = admin()->name;

        return $this->commentRepo->create( $id, $request );
    }


    public function destroy(int $id)
    {
        return $this->commentRepo->delete($id);
    }
}
