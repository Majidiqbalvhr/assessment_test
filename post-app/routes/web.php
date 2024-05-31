<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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

Route::get('/login',[AuthController::class,'view_login'])->name('login');
Route::post('/loginProcess',[AuthController::class,'Login'])->name('login.process');
Route::get('/RegistrationPage',[AuthController::class,'createregistration'])->name('create.registration');
Route::post('/Registration',[AuthController::class,'Registration'])->name('register');

Route::middleware('auth')->group(function() {
    Route::get('/Dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::group(['prefix' => 'user', 'as' => 'post.'], function () {
        Route::post('/store-post', [PostController::class, 'store'])->name('store');
        Route::get('/view-posts', [PostController::class, 'view'])->name('view');
        Route::get('/view-details/{id}', [PostController::class, 'detail'])->name('detail');
        Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('edit');
        Route::post('/update-post', [PostController::class, 'update'])->name('update');
        Route::get('/delete-post/{id}', [PostController::class, 'delete'])->name('delete');
    });
    Route::get('logout', [AuthController::class, 'destroy'])->name('logout');
});
