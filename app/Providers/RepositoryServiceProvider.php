<?php

namespace App\Providers;

use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\BigStoreRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ClientInvoiceRepositoryInterface;
use App\Interfaces\ClientRepositoryInterface;
use App\Interfaces\ExpensesRepositoryInterface;
use App\Interfaces\InvoiceRepositoryInterface;
use App\Interfaces\SafeRepositoryInterface;
use App\Interfaces\SellRepositoryInterface;
use App\Interfaces\StoreRepositoryInterface;
use App\Interfaces\SupplierRepositoryInterface;
use App\Repositories\web\AdminRepository;
use App\Repositories\web\BigStoreRepository;
use App\Repositories\web\CategoryRepository;
use App\Repositories\web\ClientInvoiceRepository;
use App\Repositories\web\ClientRepository;
use App\Repositories\web\ExpensesRepository;
use App\Repositories\web\InvoiceRepository;
use App\Repositories\web\SafeRepository;
use App\Repositories\web\SellRepository;
use App\Repositories\web\StoreRepository;
use App\Repositories\web\SupplierRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(AdminRepositoryInterface::class,AdminRepository::class);
        $this->app->bind(BigStoreRepositoryInterface::class,BigStoreRepository::class);
        $this->app->bind(ClientRepositoryInterface::class,ClientRepository::class);
        $this->app->bind(ClientInvoiceRepositoryInterface::class,ClientInvoiceRepository::class);
        $this->app->bind(ExpensesRepositoryInterface::class,ExpensesRepository::class);
        $this->app->bind(InvoiceRepositoryInterface::class,InvoiceRepository::class);
        $this->app->bind(SafeRepositoryInterface::class,SafeRepository::class);
        $this->app->bind(SellRepositoryInterface::class,SellRepository::class);
        $this->app->bind(StoreRepositoryInterface::class,StoreRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class,SupplierRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);

    }


    public function boot()
    {
        //
    }
}
