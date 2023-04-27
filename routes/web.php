<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyBranchController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

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
Route::prefix('cms/')->middleware('guest:admin')->group(function(){
    Route::get('{guard}/login' , [AdminAuthController::class , 'showLogin'])->name('view.login');
    Route::post('{guard}/login' , [AdminAuthController::class , 'login']);
});
Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {
    Route::get('logout',[AdminAuthController::class, 'logout'])->name('view.logout');
});
Route::get('/', function () {
    return view('welcome');
});
Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {
    Route::view('', 'cms.home')->name('view.admin');
    Route::resource('admins', AdminController::class);
    Route::post('admins_update/{id}',[AdminController::class , 'update'])->name('admins_update');
    Route::get('admins_recycle', [AdminController::class,'recycle'])->name('admins_recycle');
    Route::get('admins_restore/{id}', [AdminController::class,'restoreAdmin'])->name('admins_restore');
    Route::get('admins_delete/{id}', [AdminController::class,'force'])->name('admins_delete');

    Route::resource('companies', CompanyController::class);
    Route::post('companies_update/{id}',[CompanyController::class , 'update'])->name('companies_update');
    Route::get('companies_recycle', [CompanyController::class,'recycle'])->name('companies_recycle');
    Route::get('companies_restore/{id}', [CompanyController::class,'restoreAdmin'])->name('companies_restore');
    Route::get('companies_delete/{id}', [CompanyController::class,'force'])->name('companies_delete');

    Route::resource('companybranches', CompanyBranchController::class);
    Route::post('companybranches_update/{id}',[CompanyBranchController::class , 'update'])->name('companybranches_update');
});