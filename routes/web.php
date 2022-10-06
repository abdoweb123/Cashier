<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\StoreController;
use App\Http\Controllers\Web\ClientInvoiceController;
use App\Http\Controllers\Web\BigStoreController;
use App\Http\Controllers\Web\testController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\SafeController;
use App\Http\Controllers\Web\ExpensesController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\ClientController;
use App\Http\Controllers\Web\SellController;
use App\Http\Controllers\Web\SupplierController;
use App\Http\Controllers\Web\InvoiceController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();
Route::get('/home', [ProductController::class, 'index'])->name('home');


define('page' , 5);



Route::group(['prefix'=> LaravelLocalization::setLocale() , 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]] , function () {


    Route::get('/', function () {
        return view('auth.login');
    });


// Admin
    Route::group(['namespace' => 'Web'], function () {

        Route::get('register/admin/view', [AdminController::class, 'registerView'])->name('registerView')->middleware('auth:admin');
        Route::get('login/admin/view', [AdminController::class, 'loginView'])->name('loginView');
        Route::post('register/test', [AdminController::class, 'registerTest'])->name('registerTest');
        Route::post('login/test', [AdminController::class, 'loginTest'])->name('loginTest');
        Route::get('admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('auth:admin');
        Route::get('admin/dashboard/content/{tap}', [AdminController::class, 'dashboardContent'])->name('admin.dashboard.content')->middleware('auth:admin');

    });


// ======================  products for user ======================
    Route::group(['namespace' => 'Web'], function () {

        Route::resource('products', 'ProductController');
        Route::get('products/soft/delete/{id}', [ProductController::class, 'softDelete'])->name('soft.delete');
        Route::get('product/trash', [ProductController::class, 'trashedProducts'])->name('product.trash');
        Route::get('product/back/from/trash/{id}', [ProductController::class, 'backFromSoftDelete'])->name('product.back.from.trash');
        Route::get('product/delete/from/database/{id}', [ProductController::class, 'deleteForever'])->name('product.delete_from.database');

    });

// ======================  products for admin ======================
    Route::group(['prefix' => 'productForAdmin', 'namespace' => 'Web', 'middleware' => 'auth:admin'], function () {

        Route::resource('/product_ForAdmin', 'BigStoreController');
        Route::get('/soft/delete/{id}', [BigStoreController::class, 'softDelete'])->name('productForAdmin.soft.delete');
        Route::get('/back/from/trash/{id}', [BigStoreController::class, 'backFromSoftDelete'])->name('productForAdmin.back.from.trash');
        Route::get('/delete/from/database/{id}', [BigStoreController::class, 'deleteForever'])->name('productForAdmin.delete_from.database');
        Route::get('/admin_home', [BigStoreController::class, 'index'])->name('admin_home');

    });


// ====================== for users ======================
    Route::group(['namespace' => 'Web'], function () {

        Route::resource('users', 'UserController');
        Route::get('product/{id}', [UserController::class, 'showProductsOfUser'])->name('showProductsOfUser');
        Route::get('users/soft/delete/{id}', [UserController::class, 'softDelete'])->name('soft.deleteUser');
        Route::get('trash', [UserController::class, 'trashed'])->name('user.trash');
        Route::get('users/back/from/trash/{id}', [UserController::class, 'backFromSoftDelete'])->name('users.back.from.trash');
        Route::get('users/delete/from/database/{id}', [UserController::class, 'deleteForever'])->name('users.delete_from.database');

    });


// ====================== for Client users ======================
    Route::group(['namespace' => 'Web', 'middleware' => 'auth:admin'], function () {

        Route::resource('clients', 'ClientController');
        Route::get('client/soft/delete/{id}', [ClientController::class, 'softDelete'])->name('soft.delete.client');
        Route::get('trash/client', [ClientController::class, 'trashed'])->name('client.trash');
        Route::get('clients/back/from/trash/{id}', [ClientController::class, 'backFromSoftDelete'])->name('client.back.from.trash');
        Route::get('clients/delete/from/database/{id}', [ClientController::class, 'deleteForever'])->name('clients.delete_from.database');
        Route::get('client/product/{id}', [ClientController::class, 'showProductsOfClient'])->name('show.products.of.client');

    });


// ======================  supplier ======================
    Route::group(['namespace' => 'Web', 'middleware' => 'auth:admin'], function () {

        Route::resource('suppliers', 'SupplierController');
        Route::get('suppliers/soft/delete/{id}', [SupplierController::class, 'softDelete'])->name('supplier.soft.delete');
        Route::get('supplier/trash', [SupplierController::class, 'trashedProducts'])->name('supplier.trash');
        Route::get('supplier/back/from/trash/{id}', [SupplierController::class, 'backFromSoftDelete'])->name('supplier.back.from.trash');
        Route::get('supplier/delete/from/database/{id}', [SupplierController::class, 'deleteForever'])->name('supplier.delete_from.database');
        Route::get('products/of/supplier/{id}', [SupplierController::class, 'showProductOfSupplier'])->name('productOfSupplier');

    });


// ======================  Store ======================
    Route::group(['namespace' => 'Web', 'middleware' => 'auth:admin'], function () {
        Route::get('index/buy', [StoreController::class, 'index'])->name('index.buy');
        Route::get('delete/buy/{id}', [StoreController::class, 'deleteForever'])->name('delete.buy');
    });


// ======================  supplier and invoices ======================
    Route::group(['prefix' => 'invoice', 'namespace' => 'Web'], function () {

        Route::post('pay/money/for/supplier/{id}', [InvoiceController::class, 'payMoneyToSupplier'])->name('pay.money.for.supplier');
        Route::get('edit/invoice/{invoice}', [InvoiceController::class, 'edit'])->name('edit.invoice');
        Route::put('update/invoice/{invoice}', [InvoiceController::class, 'update'])->name('update.invoice');
        Route::get('forceDelete/invoice/{invoice}', [InvoiceController::class, 'forceDelete'])->name('forceDelete.invoice');
        Route::get('index/{id}', [InvoiceController::class, 'index'])->name('invoices.index');

    });


// ======================  sells for Client user ======================
    Route::group(['namespace' => 'Web'], function () {

        Route::resource('sells', 'SellController');
        Route::get('search/product', [SellController::class, 'searchProduct'])->name('search.product');
        Route::get('create/sell/{id?}', [SellController::class, 'createSell'])->name('create.sell');
        Route::post('store/sell/ration/{id}', [SellController::class, 'storeSellRation'])->name('store.sell.ration');
        Route::post('store/sell/cash/{id}', [SellController::class, 'storeSellCash'])->name('store.sell.cash');
        Route::post('store/sell/remain/{id}', [SellController::class, 'storeSellRemain'])->name('store.sell.remain');
        Route::put('update/sell/ration/{sell_id}/{productBigStore_quantity}', [SellController::class, 'updateSellRation'])->name('update.sell.ration');
        Route::put('update/sell/cash/{sell_id}/{productBigStore_quantity}', [SellController::class, 'updateSellCash'])->name('update.sell.cash');
        Route::put('update/sell/remain/{sell_id}/{productBigStore_quantity}', [SellController::class, 'updateSellRemain'])->name('update.sell.remain');
        Route::get('softDelete/sell/{id}', [SellController::class, 'softDelete'])->name('softDelete.sell');
        Route::get('trashed/sells', [SellController::class, 'trashedSells'])->name('trashed.sells');
        Route::get('back/trashed/sell/{id}', [SellController::class, 'backTrashedSell'])->name('back.trashed.sells');
        Route::put('delete/sell/forever/{sell_id}/{product_id}', [SellController::class, 'deleteForever'])->name('delete.sell.forever');

    });

// ======================  Client and invoices ======================
    Route::group(['prefix' => 'clientInvoice', 'namespace' => 'Web'], function () {
        Route::post('get/money/from/client', [ClientInvoiceController::class, 'getMoneyFromClient'])->name('get.money.from.client');
        Route::get('edit/invoice/client/{clientInvoice}', [ClientInvoiceController::class, 'edit'])->name('edit.invoice.client');
        Route::put('update/invoice/client/{clientInvoice}', [ClientInvoiceController::class, 'update'])->name('update.invoice.client');
        Route::get('forceDelete/client/invoice/{clientInvoice}', [ClientInvoiceController::class, 'forceDelete'])->name('forceDelete.invoice.client');
        Route::get('index/client/{id}', [ClientInvoiceController::class, 'index'])->name('invoices.client.index');

    });


// ======================  Expenses ======================
    Route::group(['prefix' => 'Expenses', 'namespace' => 'Web'], function () {

        Route::resource('expenses', 'ExpensesController');
        Route::get('expense/forceDelete/{expense}', [ExpensesController::class, 'forceDelete'])->name('expense.forceDelete');

    });


// ======================  Safe ======================
    Route::group(['prefix' => 'Safe', 'namespace' => 'Web'], function () {

        Route::resource('safe', 'SafeController');
        Route::get('delete/added/forever/{safe}', [SafeController::class, 'forceDelete'])->name('safe.forceDelete');
        Route::get('collected/data', [SafeController::class, 'collectedData'])->name('collected.data');
        Route::get('reports', [SafeController::class, 'reports'])->name('reports');

        Route::get('general/view', [SafeController::class, 'sales'])->name('general.view');
        Route::get('profits', [SafeController::class, 'profits'])->name('profits');
        Route::get('best/seller', [SafeController::class, 'salesBestSeller'])->name('best.seller');
        Route::get('best/profits', [SafeController::class, 'salesBestProfits'])->name('best.profits');

    });


// ======================  Category ======================
    Route::group(['prefix' => 'Category', 'middleware' => 'auth:admin', 'namespace' => 'Web'], function () {

        Route::resource('category', 'CategoryController');
        Route::get('category/delete/forever/{id}', [CategoryController::class, 'forceDelete'] )->name('category.forceDelete');

    });


    Route::group(['prefix' => 'invoiceTest', 'middleware' => 'auth:admin', 'namespace' => 'Web'], function () {

        Route::resource('invoice', 'testController');
        Route::get('invoice/delete/{id}', [testController::class, 'delete'])->name('invoice.delete');
        Route::get('invoice/print/{id}', [testController::class, 'print'])->name('invoice.print');
        Route::get('invoice/pdf/{id}', [testController::class, 'pdf'])->name('invoice.pdf');
        Route::get('invoice/send/to/email/{id}', [testController::class, 'send_to_email'])->name('invoice.send_to_email');
    });


});


