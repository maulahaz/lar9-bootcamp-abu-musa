<?php

use Illuminate\Support\Facades\Route;
//--ADMIN:
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\TugasController;
//--AUTH:
use App\Http\Controllers\Auth\AuthController;
//--PUBLIC:
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
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

//--AUTH:
Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');;//
Route::post('login', [AuthController::class, 'submit_login'])->middleware('guest');;
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('guest');;
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'submit_register']);

//--ACCOUNT:
Route::get('account/dashboard', [AccountController::class, 'dashboard']);
Route::get('account/profile', [AccountController::class, 'profile']);

//--DASHBOARD:
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

//--USER:
Route::resource('admin/user', UserController::class);

//--MATERI:
Route::resource('admin/materi', MateriController::class);

//--TUGAS:
Route::resource('admin/tugas', TugasController::class);