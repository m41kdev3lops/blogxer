@extends('layouts.base')

@section('content')
    <br>

    <h3><i class="fa fa-list"></i> Posts in {{ $category->name }}</h3>

    <hr>

    @include('partials.post_partial')

    <hr>

    <p class="text-center"><a href="/">Back to Home</a></p>
@endsection
