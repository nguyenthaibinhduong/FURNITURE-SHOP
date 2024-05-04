<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'post_login']);
Route::get('/loginadmin', [UserController::class,'loginadmin'])->name('loginadmin');
Route::post('/loginadmin', [UserController::class,'post_loginadmin']);
Route::get('/register', [UserController::class,'register'])->name('register');
Route::post('/register', [UserController::class,'post_register']);
Route::get('/logout', [UserController::class,'logout'])->name('logout');
Route::prefix('admin')->middleware('checkrole')->group(function () {
    Route::get('/', [AdminController::class,'index'])->name('admin');
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class,'index'])->name('category.index');
        Route::get('/create', [CategoryController::class,'create'])->name('category.create');
        Route::post('/store', [CategoryController::class,'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class,'update'])->name('category.update');
        // Route::get('/delete/{id}', [
        //     'as' => 'category.delete',
        //     'uses'=> 'CategoryController@delete'
        // ]);
    });

});

Route::get('/unauthorized', function(){ 
    return view('error.unauthorized');
})->name('unauthorized');
