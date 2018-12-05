<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateAdminRequest;

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


    public function update(UpdateAdminRequest $request)
    {
        $this->adminService->update($request);

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
