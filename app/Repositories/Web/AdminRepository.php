<?php

namespace App\Repositories\Web;

use App\Http\Requests\AdminLogin;
use App\Http\Requests\AdminRegister;
use App\Interfaces\Web\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminRepository implements AdminRepositoryInterface
{


    public function registerView()
    {
        return view('authAdmin.register');
    }



    public function loginView()
    {
        return view('authAdmin.login');
    }



    public function registerTest(AdminRegister $request)
    {

        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admin.dashboard');
    }



    public function loginTest(AdminLogin $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){

            return redirect()->route('admin.dashboard');
        }

        return back()->withInput($request->only('email'));
    }



    public function adminDashboard()
    {
        return view('authAdmin.admin_dashboard');
    }



    public function dashboardContent($tap)
    {
        return view('authAdmin.dashboard_content', compact('tap'));
    }


}
