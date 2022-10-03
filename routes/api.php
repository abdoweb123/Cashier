<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\BigStoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware'=>'api', 'namespace'=>'Api'], function (){


    Route::group(['prefix'=>'admin'], function (){

        Route::get('get/all/admins',[AdminController::class,'getAllAdmins'])->middleware('check:admin-api');
        Route::post('create/new/admin',[AdminController::class,'register'])->middleware('check:admin-api');
        Route::post('login/admin',[AdminController::class,'login']);
        Route::put('update/admin/{id}',[AdminController::class,'update'])->middleware('check:admin-api');
        Route::delete('delete/admin/{id}',[AdminController::class,'delete'])->middleware('check:admin-api');
        Route::post('logout/admin',[AdminController::class,'logout'])->middleware('check:admin-api');

    });



    Route::group(['prefix'=>'client', 'middleware'=>'check:admin-api'], function (){

        Route::get('get/all/clients',[ClientController::class, 'index']);
        Route::post('create/new/client',[ClientController::class, 'store']);
        Route::put('update/client/{id}',[ClientController::class, 'update']);
        Route::delete('softDelete/client/{id}',[ClientController::class, 'softDelete']);
        Route::get('back/from/trash/{id}', [ClientController::class, 'backFromTrash']);
        Route::get('trashed/clients', [ClientController::class, 'trashed']);
        Route::get('delete/forever/{id}', [ClientController::class, 'deleteForever']);
        Route::get('client/products/{id}', [ClientController::class, 'showProductsOfClient']);

    });



    Route::group(['prefix'=>'BigStore', 'middleware'=>'check:admin-api'], function (){

          Route::get('get/all/products', [BigStoreController::class, 'index']);
          Route::post('create/new/product', [BigStoreController::class, 'store']);
          Route::get('show/product/{id}', [BigStoreController::class, 'show']);
          Route::put('update/product/{id}', [BigStoreController::class, 'update']);
          Route::delete('soft/delete/product/{id}', [BigStoreController::class, 'softDelete']);
          Route::get('trashed/products', [BigStoreController::class, 'trashedProducts']);
          Route::get('back/from/trash/{id}', [BigStoreController::class, 'backFromSoftDelete']);
          Route::get('delete/from/database/{id}', [BigStoreController::class, 'deleteForever']);



//        Route::resource('/product_ForAdmin', 'BigStoreController');
//        Route::get('/soft/delete/{id}', [BigStoreController::class, 'softDelete'])->name('productForAdmin.soft.delete');
//        Route::get('/admin_home', [BigStoreController::class, 'index'])->name('admin_home');


    });



});












