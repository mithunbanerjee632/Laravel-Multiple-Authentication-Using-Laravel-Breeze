<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;


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

Route::get('/', function () {
    return view('welcome');
});

//backend login
Route::get('/admin/loginForm',[AdminController::class,'AdminLoginForm']);
Route::post('/admin/login',[AdminController::class,'AdminLogin']);

/*Route::get('/admin/dashboard',[DashboardController::class,'AdminDashbord'])->middleware('admin');*/

Route::group(['middleware'=>'admin'],function(){
     Route::get('/admin/dashboard',[DashboardController::class,'AdminDashbord']);
     Route::get('/admin/logout',[AdminController::class,'AdminLogout']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
