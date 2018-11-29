@extends('layouts.base')

@section('content')
    <br>
    <h1>{{ $post->title }}</h1>
    <p class="pull-left"><a href="{{ $post->category->getLink() }}">{{ $post->category->name }}</a></p>
    <p class="text-info pull-right">{{ $post->created_at->diffForHumans() }}</p>
    <div class="clearfix"></div>
    
    <hr><br>

    <p>{{ $post->body }}</p>

    <hr>

    <h3>Comments</h3>
    
    <hr>

    @include('partials.comment_partial')

    <hr><br>

    <h3>Leave A Comment</h3>
    
    <hr>

    <form action="{{ url('post/' . $post->id . '/comment') }}" method="post">
        {{ csrf_field() }}

        @if ( ! loggedIn() )
            <div class='form-group'>
                <label for='name'>Name</label>
                <input class='form-control' id='name' name='name' required>
            </div>
        @endif

        <div class='form-group'>
            <label for='body'>Comment</label>
            <textarea class='form-control' id='body' name='body' rows="5" required></textarea>
        </div>
        
        <div class='form-group'>
            <button type='submit' class='btn btn-success btn-block'>Add Comment</button>
        </div>
    </form>

    @if ( loggedIn() )
        <form action="{{ $post->getLink() }}" method="post" class="text-center">
            {{ csrf_field() }}
            {{ method_field('delete') }}

            <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure?');">Delete Post</button>
        </form>
    @endif

    <br><hr>

    <p class="text-center">
        <a href="{{ url('/') }}">Back to posts</a> |
        <a href="{{ $post->category->getLink() }}">Back to {{ $post->category->name }}</a>
    </p>
@endsection
