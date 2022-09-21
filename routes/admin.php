<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AssetManagerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\User\UserController;

//admin part start
Route::group(['prefix' =>'admin/', 'middleware' => ['auth', 'is_admin']], function(){
    Route::get('dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard')->middleware('is_admin');
    //profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [AdminController::class, 'adminProfileUpdate']);
    Route::post('changepassword', [AdminController::class, 'changeAdminPassword']);
    Route::put('image/{id}', [AdminController::class, 'adminImageUpload']);
    //profile end
    //admin registration
    Route::get('register','App\Http\Controllers\Admin\AdminController@adminindex');
    Route::post('register','App\Http\Controllers\Admin\AdminController@adminstore');
    Route::get('register/{id}/edit','App\Http\Controllers\Admin\AdminController@adminedit');
    Route::put('register/{id}','App\Http\Controllers\Admin\AdminController@adminupdate');
    Route::get('register/{id}', 'App\Http\Controllers\Admin\AdminController@admindestroy');
    //admin registration end
    //agent registration
    Route::get('agent-register','App\Http\Controllers\Admin\AdminController@agentindex');
    Route::post('agent-register','App\Http\Controllers\Admin\AdminController@agentstore');
    Route::get('agent-register/{id}/edit','App\Http\Controllers\Admin\AdminController@agentedit');
    Route::put('agent-register/{id}','App\Http\Controllers\Admin\AdminController@agentupdate');
    Route::get('agent-register/{id}', 'App\Http\Controllers\Admin\AdminController@agentdestroy');
    //agent registration end
    //user registration
    Route::get('user-register','App\Http\Controllers\User\UserController@userindex')->name('admin.users');;
    Route::post('user-register','App\Http\Controllers\User\UserController@userstore');
    Route::get('user-register/{id}/edit','App\Http\Controllers\User\UserController@useredit');
    Route::post('user-register/{id}','App\Http\Controllers\User\UserController@update')->name('user.update');
    Route::get('user-register/{id}', 'App\Http\Controllers\User\UserController@userdestroy');
    //user registration end
    //code master 
    Route::resource('softcode','App\Http\Controllers\Admin\SoftcodeController');
    Route::resource('master','App\Http\Controllers\Admin\MasterController');
    //code master end
    //company details
    Route::resource('company-detail','App\Http\Controllers\Admin\CompanyDetailController');
    //company details end
    

    Route::resource('role','App\Http\Controllers\RoleController');
    Route::post('roleupdate','App\Http\Controllers\RoleController@roleUpdate');
    Route::resource('staff','App\Http\Controllers\StaffController');



    
    Route::get('/assetmanager', [AssetManagerController::class, 'assetmanager'])->name('assetmanager');
    Route::get('/assetmanager-details/{id}', [AssetManagerController::class, 'assetmanagerdetails'])->name('assetmanager.show');
    Route::post('assetmanager', [AssetManagerController::class, 'assetstore'])->name('asset.store');
    Route::post('assetmanager/{id}', [AssetManagerController::class, 'update'])->name('asset.update');
    // Route::put('/assetmanager/{id}', [AssetManagerController::class, 'update']);
    Route::get('/assetmanager/{id}', [AssetManagerController::class, 'delete']);
    Route::get('/active-assetmanager',[AssetManagerController::class, 'activeassetmanager']);

});
//admin part end