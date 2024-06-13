<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('admin_auth')->group(function(){
    Route::redirect('/', '/user/dashboard');
    Route::get('/register',[AuthController::class,'register'])->name("register");
    Route::get('/login',[AuthController::class,'login'])->name("login");
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard',[AuthController::class,'dashboard']);
    Route::middleware(['admin_auth'])->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('/count',[AdminController::class,'overallcount'])->name('overallcount');
           Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
           Route::get('/profile',[ProfileController::class,'index'])->name('admin.profile');
           Route::get('/profile/edit/{id}',[ProfileController::class,'edit'])->name('admin.profile.edit');
           Route::post('/profile/update/{id}',[ProfileController::class,'update'])->name('admin.profile.update');
        });
       // Category
       Route::resource('category',CategoryController::class);
       Route::resource('post',PostController::class);

       Route::get('list',[OrderController::class,'orderlist'])->name('order#listpage');
       Route::get('orderdetail/{code}',[OrderController::class,'orderdetail'])->name('order#detail');

       Route::get('contact',[AdminController::class,'contact'])->name('admin#contact');


       Route::prefix('ajax')->group(function(){
             Route::get('statusupdate',[AjaxController::class,'statusupdate'])->name('Ajax#statusupdate');
        });



       Route::prefix('admin')->group(function(){
        // // Password
        // Route::get('changepasswordpage',[AdminController::class,'changepasswordpage'])->name('admin#changepasswordpage');
        // Route::post('changepassword',[AdminController::class,'changepassword'])->name('admin#changepassword');

        // // Account detail
        // Route::get('account',[AdminController::class,'accountpage'])->name('account#page');
        // Route::get('accountedit',[AdminController::class,'accountedit'])->name('account#edit');
        // Route::post('accountupdate',[AdminController::class,'accountupdate'])->name('account#update');

        // user account
        Route::get('adminlist',[AdminController::class,'adminlist'])->name('admin#adminlist');
        Route::get('ajaxadminrolechange',[AjaxController::class,'useradminrolechange'])->name('Ajax#adminrolechange');
        Route::get('deleteadmin/{id}',[AdminController::class,'admindelete'])->name('admin#delete');


        // user account
        Route::get('userlist',[AdminController::class,'userlist'])->name('admin#userlist');
        Route::get('ajaxrolechange',[AjaxController::class,'userrolechange'])->name('Ajax#userrolechange');
        Route::get('deleteuser/{id}',[UserController::class,'delete'])->name('user#delete');

    });

       });

    // user
    Route::middleware(['user_auth'])->group(function(){
        Route::get('cart',[CartController::class,'index'])->name('cart');
        Route::get('detail/{id}',[UserController::class,'detail'])->name('post#detail');
        Route::get('orderhistory',[UserController::class,'orderhistory'])->name('user#orderhistory');
        Route::get('profiledetail',[ProfileController::class,'userprofiledetail'])->name('user.profiledetail');
        Route::get('user/profile/edit/{id}',[ProfileController::class,'useredit'])->name('user.profile.edit');
        Route::post('user/profile/update/{id}',[ProfileController::class,'userupdate'])->name('user.profile.update');

    });



    // ajax
        Route::prefix('ajax')->group(function(){
            Route::get('product',[AjaxController::class,'productdata'])->name('Ajax#product');
            Route::post('cart',[AjaxController::class,'cart'])->name('Ajax#cart');
            Route::post('order',[AjaxController::class,'order'])->name('Ajax#order');
            Route::post('removecart',[AjaxController::class,'removecart'])->name('Ajax#removecart');
        });
    });
        Route::get('user/dashboard',[UserController::class,'index'])->name('user.dashboard');
        Route::get('user/contactpage',[ContactController::class,'index'])->name('user.contactpage');
        Route::post('contactcreate',[ContactController::class,'contactcreate'])->name('user.contactcreate');

        Route::get('user/aboutus',function(){
            return view('user.aboutus');
        })->name('user.aboutus');


        Route::get('ajax/filter',[AjaxController::class,'filter']);
