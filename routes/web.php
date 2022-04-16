<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeritaController;
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

Route::get('/',[BeritaController::class,'index']);

Route::get('/berita/{berita:slug}',[BeritaController::class,'detail']);


Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LoginController::class,'logout']);



Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth');
// create route resource berita for admin get Controller Auth/BeritaController
Route::resource('/admin/berita',App\Http\Controllers\Admin\BeritaController::class)->middleware('auth');
Route::resource('/admin/user',App\Http\Controllers\Admin\UserController::class)->middleware('auth');



