@extends('layouts.base')

@section('content')

    <h1 class="text-center">Welcome to Aqar Blog <i class="fa fa-hand-peace-o"></i></h1>

    <hr>

    <h3><i class="fa fa-list"></i> All Posts</h3>

    <br>

    @include('partials.post_partial')

@endsection
