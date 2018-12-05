<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct( AdminService $adminService )
    {
        $this->middleware('isGuest')->only(['index', 'store']);
        $this->middleware('isAdmin')->only(['show', 'update']);

        $this->adminService = $adminService;
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
        return $this->adminService->login($request);
    }


    public function destroy()
    {
        return $this->adminService->logout();
    }
}
