<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\{UserController,AuthController,TransectionController};


Route::get('/',[UserController::class,'register'])->name('users.register');
Route::post('/users',[UserController::class,'store'])->name('users.store');
Route::get('/login',[AuthController::class,'getLogin'])->name('getLogin');
Route::post('/login',[AuthController::class,'postLogin'])->name('postLogin');

// after login user can access
Route::group(['middleware'=>['user_auth']],function(){
    // users profile
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
    Route::get('/users/{id}',[UserController::class,'index'])->name('users.index');
    Route::get('/transection',[TransectionController::class,'index'])->name('transection.index');
    Route::get('/deposit',[TransectionController::class,'deposit'])->name('get.deposit');
    Route::post('/deposit',[TransectionController::class,'store'])->name('post.deposit');
    
});
