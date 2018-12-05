<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AdminService
{
    public function login($request)
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


    public function logout()
    {
        Auth::logout();

        swal("You are logged out!");

        return redirect('/');
    }
}
