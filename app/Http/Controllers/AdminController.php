<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isGuest')->only(['index', 'store']);
        $this->middleware('isAdmin')->only(['show', 'update']);
    }


    public function index()
    {
        return view('admin.login');
    }


    public function show()
    {
        return view('admin.profile');
    }


    public function update(Request $request)
    {
        $admin = admin();

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ( $request->new_password ) {
            $this->validate($request, [
                'new_password'              => 'required|confirmed',
                'new_password_confirmation' => 'required'
            ]);
            
            $admin->password = bcrypt($request->new_password);
        }

        $admin->save();

        session()->forget('loggedInAdmin');
        session()->put('loggedInAdmin', $admin);

        swal("Profile Updated successfully");

        return redirect()->back();
    }


    public function store(LoginRequest $request)
    {
        $attempt = Auth::attempt(
            $request->only('email', 'password'), true
        );

        if ( ! $attempt ) {
            swal("Wrong Credentials", 'error', 'Error');
            
            return redirect()->back()->withInput();
        }

        $admin = Auth::user();
        
        swal("Welcome back, {$admin->name}");

        return redirect('/');
    }


    public function destroy()
    {
        Auth::logout();

        swal("You are logged out!");

        return redirect('/');
    }
}
