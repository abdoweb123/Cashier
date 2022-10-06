<?php

namespace App\Providers;

use App\Interfaces\Web\AdminRepositoryInterface;
use App\Interfaces\Web\BigStoreRepositoryInterface;
use App\Interfaces\Web\CategoryRepositoryInterface;
use App\Interfaces\Web\ClientInvoiceRepositoryInterface;
use App\Interfaces\Web\ClientRepositoryInterface;
use App\Interfaces\Web\ExpensesRepositoryInterface;
use App\Interfaces\Web\InvoiceRepositoryInterface;
use App\Interfaces\Web\SafeRepositoryInterface;
use App\Interfaces\Web\SellRepositoryInterface;
use App\Interfaces\Web\StoreRepositoryInterface;
use App\Interfaces\Web\SupplierRepositoryInterface;
use App\Repositories\Web\AdminRepository;
use App\Repositories\Web\BigStoreRepository;
use App\Repositories\Web\CategoryRepository;
use App\Repositories\Web\ClientInvoiceRepository;
use App\Repositories\Web\ClientRepository;
use App\Repositories\Web\ExpensesRepository;
use App\Repositories\Web\InvoiceRepository;
use App\Repositories\Web\SafeRepository;
use App\Repositories\Web\SellRepository;
use App\Repositories\Web\StoreRepository;
use App\Repositories\Web\SupplierRepository;
use App\Interfaces\Api\AdminRepositoryInterface as AdminRepositoryInterfaceApi;
use App\Interfaces\Api\BigStoreRepositoryInterface as BigStoreRepositoryInterfaceApi;
use App\Interfaces\Api\ClientRepositoryInterface as ClientRepositoryInterfaceApi;
use App\Repositories\Api\AdminRepository as AdminRepositoryApi;
use App\Repositories\Api\BigStoreRepository as BigStoreRepositoryApi;
use App\Repositories\Api\ClientRepository as ClientRepositoryApi;
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

        $this->app->bind(AdminRepositoryInterfaceApi::class,AdminRepositoryApi::class);
        $this->app->bind(BigStoreRepositoryInterfaceApi::class,BigStoreRepositoryApi::class);
        $this->app->bind(ClientRepositoryInterfaceApi::class,ClientRepositoryApi::class);
    }


    public function boot()
    {
        //
    }
}
