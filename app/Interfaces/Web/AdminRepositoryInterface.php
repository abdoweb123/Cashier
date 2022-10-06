<?php

namespace App\Interfaces\Web;

use App\Http\Requests\AdminLogin;
use App\Http\Requests\AdminRegister;
use Illuminate\Http\Request;


interface AdminRepositoryInterface
{

    public function registerView();

    public function loginView();

    public function registerTest(AdminRegister $request);

    public function loginTest(AdminLogin $request);

    public function adminDashboard();

    public function dashboardContent($tap);

}
