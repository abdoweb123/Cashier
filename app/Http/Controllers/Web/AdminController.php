<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLogin;
use App\Http\Requests\AdminRegister;
use App\Interfaces\Web\AdminRepositoryInterface;
use Illuminate\Http\Request;


class AdminController extends Controller
{

  private $adminRepositoryInterface;


    public function __construct(AdminRepositoryInterface $adminRepositoryInterface)
    {
        $this->adminRepositoryInterface = $adminRepositoryInterface;
    }



    public function registerView()
    {
        return $this->adminRepositoryInterface->registerView();
    }


    public function loginView()
    {
        return $this->adminRepositoryInterface->loginView();
    }


    public function registerTest(AdminRegister $request)
    {
        return $this->adminRepositoryInterface->registerTest($request);
    }


    public function loginTest(AdminLogin $request)
    {
        return $this->adminRepositoryInterface->loginTest($request);
    }



    public function adminDashboard()
    {
        return $this->adminRepositoryInterface->adminDashboard();
    }


    public function dashboardContent($tap)
    {
        return $this->adminRepositoryInterface->dashboardContent($tap);
    }


}
