<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLogin;
use App\Http\Requests\AdminRegister;
use App\Http\Resources\AdminResource;
use App\Interfaces\Api\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\CheckApi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class AdminController extends Controller
{

    use CheckApi;

    private $adminRepositoryInterface;

    public function __construct(AdminRepositoryInterface $adminRepositoryInterface)
    {
        $this->adminRepositoryInterface = $adminRepositoryInterface;
    }



    public function getAllAdmins()
    {
        return $this->adminRepositoryInterface->getAllAdmins();
    }



    public function register(AdminRegister $request)
    {
       return $this->adminRepositoryInterface->register($request);
    }



    public function login(AdminLogin $request)
    {
        return $this->adminRepositoryInterface->login($request);
    }



    public function update(AdminRegister $request, $id)
    {
        return $this->adminRepositoryInterface->update($request,$id);
    }



    public function delete($id)
    {
        return $this->adminRepositoryInterface->delete($id);
    }



    public function logout()
    {
        return $this->adminRepositoryInterface->logout();
    }



} //end of class
