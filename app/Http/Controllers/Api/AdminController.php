<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLogin;
use App\Http\Requests\AdminRegister;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\CheckApi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class AdminController extends Controller
{
    use CheckApi;

    public function getAllAdmins()
    {
        try {
            $admin = AdminResource::collection(Admin::all());
            return $this->returnMessageData('Data is fetched successfully','200','All admins',$admin);
        }
        catch (\Exception $exception)
        {
            return $this->returnMessageError('Some thing went wrong','500');
        }
    }



    public function register(AdminRegister $request)
    {

        $admin = new AdminResource(Admin::create([

            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password']),
        ]));


        if ($admin){
            return $this->returnMessageData('admin is created successfully','200','admins',$admin);
        }
        else{
            return $this->returnMessageError('Some thing went wrong','500');
        }

    }



    public function login(AdminLogin $request)
    {

        $token = auth()->guard('admin-api')->attempt($request->only(['email','password']));

        if (!$token)
        {
            return  $this->returnMessageError('Email or password is not correct','500');
        }

        $admin = new AdminResource(auth()->guard('admin-api')->user());
        $admin->token = $token;

        return $this->returnMessageData('Login Successfully','201', 'admin', $admin);
    }



    public function update(AdminRegister $request, $id)
    {

        $admin = Admin::find($id);

        if (!$admin)
        {
            return $this->returnMessageError('Admin is not found','404');
        }


        $admin->update([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password']),
        ]);

        if ($admin)
        {
            return $this->returnMessageData('Data is updated successfully','200','admin',$admin);
        }

    }



    public function delete($id)
    {
        $admin = Admin::find($id);

        if (!$admin)
        {
            return $this->returnMessageError('Admin is not found','404');
        }

        $admin->delete();
        return $this->returnMessageSuccess('data is deleted successfully','200');

    }


    public function logout()
    {
        try {
            auth('admin-api')->logout();
            return $this->returnMessageSuccess('logout successfully','201');
        }
        catch (\Exception $exception){
            return $this->returnMessageError($exception->getMessage(),'500');
        }

    }



}
