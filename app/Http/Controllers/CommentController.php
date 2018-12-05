<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentCreateRequest;
use App\Services\CommentService;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct( CommentService $commentService )
    {
        $this->middleware('isAdmin')->only([
            'destroy'
        ]);

        $this->commentService = $commentService;
    }


    public function store(CommentCreateRequest $request, $id)
    {
        $comment = $this->commentService->add($id, $request->all());

        swal('Comment Added, Yay!');

        return redirect()->back();
    }


    public function destroy($id)
    {
        $this->commentService->destroy($id);

        swal("Comment deleted");

        return redirect()->back();
    }
}
