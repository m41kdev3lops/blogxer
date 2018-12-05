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


    public function update($request)
    {
        $admin = admin();

        $admin->name = $request->name;
        $admin->email = $request->email;
        
        if ( $request->new_password ) $admin->password = bcrypt($request->new_password);

        $admin->save();

        Auth::logout();

        Auth::login($admin, true);
    }
}
