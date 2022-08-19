<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRegController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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


// Route::any('/', [MainController::class,'index'])->name('admin.login');
Route::any('/send', [SmsController::class,'index'])->name('send');
Route::any('/', [AuthController::class,'index'])->name('login');
Route::any('/administrator', [MainController::class,'index'])->name('admin.login');
Route::any('/register', [AuthController::class,'register'])->name('register');

Route::prefix('admin')->group(function(){
    Route::any('/', [AdminController::class,'index'])->name('admin.dashboard');
    Route::any('/set-appointment', [AdminController::class,'schedule'])->name('admin.request');
    Route::any('/add-doctors', [AdminController::class,'doctor'])->name('admin.doctor');
    Route::any('/attendance', [AdminController::class,'attendance'])->name('admin.attendance');
});
Route::prefix('user')->group(function(){
    Route::any('/', [HomeController::class,'index'])->name('user.dashboard');
    Route::any('/notification', [HomeController::class,'notify'])->name('user.notify');

});



