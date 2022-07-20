<?php

use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\MeetingController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\GatepassController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserProfileController;

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



Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('auth.login');
})->name('site_login');

//Admin routes
Route::group(['prefix'=>'admin','middleware' =>['admin','auth']], function(){
    //Dashboard section
    Route::get('/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');

    //branch section
    Route::get('branch',[BranchController::class,'index'])->name('admin.branch_list');
    Route::post('branch',[BranchController::class,'store'])->name('admin.branch_store');
    Route::get('branch/edit/{id}',[BranchController::class,'edit'])->name('admin.branch_edit');
    Route::post('branch/update',[BranchController::class,'update'])->name('admin.branch_update');
    //department section
    Route::resource('/department',DepartmentController::class);
    
    //User register section
    Route::get('/user-list',[AdminUserController::class, 'userList'])->name('admin.user_list');
    Route::get('/user-create',[AdminUserController::class, 'userCreate'])->name('admin.user_create');
    Route::post('/user-store',[AdminUserController::class, 'userStore'])->name('admin.user_store');
    Route::get('/user-edit/{id}',[AdminUserController::class, 'userEdit'])->name('admin.user_edit');
    Route::post('/user-update',[AdminUserController::class, 'userUpdate'])->name('admin.user_update');
    Route::get('/user/inactive/{id}',[AdminUserController::class,'inactive'])->name('admin.user_inactive');
    Route::get('/user/active/{id}',[AdminUserController::class,'active'])->name('admin.user_active');


    //visitor section
    Route::resource('visitors',VisitorController::class);
    Route::post('visitor/readonly',[VisitorController::class,'employeeData'])->name('visitor_employeeData');
    Route::post('visitor/addmore',[VisitorController::class,'addMore'])->name('visitor_addmore');
    Route::get("visitor/cardToken",[VisitorController::class,'visitorToken'])->name('visitorToken');
    Route::get('/visitor-exit-time/{id}',[VisitorController::class, 'exitVisitor']);
    Route::get('/generate-card/{id}', [VisitorController::class, 'generateCard']);

    //visitor photo section
    Route::get("visitor/photo/{id}", [VisitorController::class, 'visitorPhoto'])->name('visitorPhoto');

    //Visitor Request section
    Route::get('/meeting/new-request',[MeetingController::class,'userWiseRequest'])->name('admin.user-wise-new-request');
    Route::get('/meeting/all-request',[MeetingController::class,'userWiseAllRequest'])->name('admin.user-wise-request');

    //profile setting section
    Route::get("userProfile",[UserProfileController::class,'userProfile'])->name('userProfile');
    Route::post("userProfile/update",[UserProfileController::class,'userProfileUpdate'])->name('userProfileUpdate');
    Route::post("userProfile/update/password",[UserProfileController::class,'UserPassword'])->name('UserPassword');

    //Decline visitor meeting
    Route::get('/meeting-cancel', [MeetingController::class, 'vDecline'])->name('admin.decline-visitor');
    //Accept visitor meeting
    Route::get('/meeting-accept/{id}', [MeetingController::class, 'vAccept'])->name('admin.accept-visitor');
    //Create new visitor by user for himself/herself
    Route::get('/add-visitor-user-wise', [MeetingController::class, 'createUserWiseVisitor'])->name('admin.create-user-wise-visitor');

    //Report section
    Route::get('reports',[ReportsController::class,'vDate'])->name('reports_generate');
    Route::get('/visitor-list-show', [ReportsController::class, 'vDateShow'])->name('admin.vDateShow');

    //Role and permission section
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);



});


//User routes
Route::group(['prefix'=>'user','middleware' =>['user','auth']], function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
});
