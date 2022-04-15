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
Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'submit_login'])->middleware('guest');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'submit_register']);

//--ACCOUNT:
Route::get('account/dashboard', [AccountController::class, 'dashboard']);
Route::get('account/profile', [AccountController::class, 'profile']);

//--DASHBOARD:
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

//--USER:
Route::post('/admin/user/update-status-user', [UserController::class, 'updateStatusUser']);
Route::get('/admin/user/hapus/{id}', [UserController::class, 'hapus']);
// Route::get('/admin/user/{id}/detail', [UserController::class, 'detail']);
Route::resource('admin/user', UserController::class);

//--MATERI:
Route::PUT('/admin/materi/uploadfile/{id}', [MateriController::class, 'uploadFile']);
Route::resource('admin/materi', MateriController::class);

//--TUGAS:
Route::resource('admin/tugas', TugasController::class);