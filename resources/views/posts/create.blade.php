@extends('layouts.base')

@section('content')
    <h1>Add Post</h1>
    <hr>

    <form action="{{ url('post') }}" method="post">
        {{ csrf_field() }}

        <div class='form-group'>
            <label for='category_id'>Category</label>
            <select name="category_id" class="form-control" id="category_id" required>
                @foreach( $categories as $category )
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class='form-group'>
            <label for='title'>Title</label>
            <input class='form-control' id='title' name='title' required value="{{ old('value') ?? '' }}">
        </div>

        <div class='form-group'>
            <label for='Short_Description'>Short Description</label>
            <textarea class='form-control' id='Short_Description' name='short_description' rows="3" required>{{ old('short_description') ?? '' }}</textarea>
        </div>

        <div class='form-group'>
            <label for='Body'>Body</label>
            <textarea class='form-control' id='Body' name='body' rows="5" required>{{ old('body') ?? '' }}</textarea>
        </div>

        <div class='form-group'>
            <button type='submit' class='btn btn-success btn-block'>Add Post</button>
        </div>
    </form>
@endsection
