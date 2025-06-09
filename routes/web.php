<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" mid dleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('index');
// Route::get('addToCard/{id}',[HomeController::class,'addToCart'])->name('addToCart');
Route::middleware('auth')->group(function () {
    Route::post('addToCard/{id}', [HomeController::class, 'addToCart'])->name('addToCart');



    Route::get('cart',[HomeController::class,'cart'])->name('cart');
    Route::get('xoa san-pham-gio-hang/{id}',[HomeController::class,'deleteCart'])->name('deleteCart');
});

Route::get('cart',[HomeController::class,'cart'])->name('cart');
Route::get('xoa san-pham-gio-hang/{id}',[HomeController::class,'deleteCart'])->name('deleteCart');
Route::post('/newsletter/subscribe', [UserController::class, 'subscribe'])->name('newsletter.subscribe');


Route::get('/login', [LoginController::class, 'getlogin'])->name('login');
Route::post('/login', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('login')->name('admin.')->group(function () {
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::prefix('member')->name('member.')->group(function () {
        /** Show members */
        //List of members
        Route::get('/',[MemberController::class,'index'])->name('index');
        Route::get('index',[MemberController::class,'index'])->name('index');
        //Create Member
        Route::get('create',[MemberController::class,'create'])->name('create');
        Route::post('store',[MemberController::class,'store'])->name('store');
        //Edit Member
        Route::get('edit/{id}',[MemberController::class,'edit'])->name('edit')->where('id','[0-9]+');
        Route::post('update/{id}',[MemberController::class,'update'])->name('update')->where('id','[0-9]+');
        //Delete Member
        Route::get('delete/{id}',[MemberController::class,'delete'])->name('delete')->where('id','[0-9]+');
    });

    Route::prefix('product')->middleware('login')->name('product.')->group(function () {
        //List of product
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::get('index',[ProductController::class,'index'])->name('index');
        //Create product
        Route::get('create',[ProductController::class,'create'])->name('create');
        Route::post('store',[ProductController::class,'store'])->name('store');
        //Edit product
        Route::get('edit/{id}',[ProductController::class,'edit'])->name('edit')->where('id','[0-9]+');
        Route::post('update/{id}',[ProductController::class,'update'])->name('update')->where('id','[0-9]+');
        //Delete product
        Route::get('jejedelete/{id}',[ProductController::class,'delete'])->name('delete')->where('id','[0-9]+');
    });

    Route::prefix('category')->name('category.')->group(function(){
        //List of category
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('index',[CategoryController::class,'index'])->name('index');
        //create category
        Route::get('create',[CategoryController::class,'create'])->name('create');
        Route::post('store',[CategoryController::class,'store'])->name('store');
        //Edit category
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('edit')->where('id','[0-9]+');
        Route::post('update/{id}',[CategoryController::class,'update'])->name('update')->where('id','[0-9]+');
        //Delete category
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('delete')->where('id','[0-9]+');
    });

    Route::get('cart',[AdminController::class,'cart'])->name('cart');
    Route::get('success/{id}',[AdminController::class,'success'])->name('success')->where('id','[0-9]+');
    Route::get('cancel/{id}',[AdminController::class,'cancel'])->name('cancel')->where('id','[0-9]+');


});


Route::prefix('user')->name('user.')->group(function () {
    Route::get('/',[UserController::class , 'index'])->name('index');
    Route::get('index',[UserController::class , 'index'])->name('index');
    Route::get('contact',[UserController::class , 'contact'])->name('contact');
    Route::post('contact', [UserController::class, 'contactPost'])->name('contact.post');
    Route::get('categories',[UserController::class , 'categories'])->name('categories');
    Route::get('single/{id}',[UserController::class , 'single'])->name('single');
    Route::get('payment',[UserController::class , 'payment'])->name('payment');
    Route::post('uppayment',[UserController::class , 'uppayment'])->name('uppayment');
    Route::post('push',[UserController::class,'push'])->name('push');
    Route::get('data_category/{id}',[UserController::class , 'data_category'])->name('data_category');
});
