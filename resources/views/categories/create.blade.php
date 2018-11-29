@extends('layouts.base')

@section('content')
    <h1>Add Category</h1>
    <hr>

    <form action="{{ url('category') }}" method="post">
        {{ csrf_field() }}
        
        <div class='form-group'>
            <label for='name'>Name</label>
            <input class='form-control' id='name' name='name' required>
        </div>

        <div class='form-group'>
            <button type='submit' class='btn btn-success btn-block'>Add Category</button>
        </div>
    </form>
@endsection
