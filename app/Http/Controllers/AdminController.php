<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isGuest')->only(['index', 'store']);
    }


    public function index()
    {
        return view('admin.login');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $admin = authCheck($request->email, $request->password);

        if ( ! $admin ) {
            swal("Wrong Credentials", 'error', 'Error');
            return redirect()->back()->withInput();
        }

        session()->put('loggedInAdmin', $admin);
        
        swal("Welcome back, {$admin->name}");

        return redirect('/');
    }


    public function destroy()
    {
        session()->forget('loggedInAdmin');

        swal("You are logged out!");

        return redirect('/');
    }
}
