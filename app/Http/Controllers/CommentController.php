<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->only([
            'destory'
        ]);
    }


    public function store(Post $post)
    {
        $this->validate(request(), [
            'body'  => 'required'
        ]);

        if ( ! loggedIn() ) {
            $this->validate(request(), ['name' => 'required']);
            $name = request('name');
        } else {
            $name = admin()->name;
        }

        $post->addComment($name, request('body'));

        swal('Comment Added, Yay!');

        return redirect()->back();
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();

        swal("Comment deleted");

        return redirect()->back();
    }
}
