<?php

namespace App\Interfaces\Api;

use App\Http\Requests\AdminLogin;
use App\Http\Requests\AdminRegister;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

interface AdminRepositoryInterface
{

    public function getAllAdmins();

    public function register(AdminRegister $request);

    public function login(AdminLogin $request);

    public function update(AdminRegister $request, $id);

    public function delete($id);

    public function logout();

} //end of class
