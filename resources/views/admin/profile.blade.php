@extends('layouts.base')

@section('content')

    <form action="{{ url('admin/profile') }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class='form-group'>
            <label for='name'>Name</label>
            <input class='form-control' id='name' name='name' value="{{ admin()->name }}" required>
        </div>

        <div class='form-group'>
            <label for='email'>Email</label>
            <input class='form-control' id='email' name='email' value="{{ admin()->email }}" required>
        </div>

        <br><hr><br>

        <div class='form-group'>
            <label for='new_password'>New Password</label>
            <input class='form-control' id='new_password' name='new_password' type="password">
        </div>

        <div class='form-group'>
            <label for='new_password_confirmation'>New Password Confirmation</label>
            <input class='form-control' id='new_password_confirmation' name='new_password_confirmation' type="password">
        </div>

        <div class='form-group'>
            <button type='submit' class='btn btn-success btn-block'>Update Info</button>
        </div>
    </form>

@endsection
