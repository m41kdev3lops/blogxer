@extends('layouts.base')

@section('head')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<h1 class="form-heading">login Form</h1>

<div class="login-form">
    <div class="main-div">
        <div class="panel">
            <h2>Admin Login</h2>
            <p>Please enter your email and password</p>
        </div>
        
        <form id="Login" method="post" action="{{ url('admin') }}">

            {{ csrf_field() }}

            <div class="form-group">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email Address" name="email" required value="{{ old('email') ?? '' }}">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>

        </form>
    </div>
</div>
@endsection
