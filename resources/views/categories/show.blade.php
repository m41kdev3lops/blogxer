@extends('layouts.base')

@section('content')
    <br>

    <h3>
        <i class="fa fa-list"></i> Posts in {{ $category->name }}

        @auth
            <form action="{{ $category->getLink() }}" method="post" class="pull-right">
                {{ csrf_field() }}
                {{ method_field('delete') }}

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');" title="delete category with its posts?"><i class="fa fa-trash"></i></button>
            </form>
        @endauth
    </h3>

    <hr>

    @include('partials.post_partial')

    <hr>

    <p class="text-center"><a href="/">Back to Home</a></p>
@endsection
