<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\TugasController;

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
//-Dashboard:
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//--Auth:
//--Cara Routing dari Traversy Tutorial:
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
//
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@store');
//
Route::get('logout', 'Auth\LogoutController@store')->name('logout');

// Route::get('register', 'RegisterController@index')->name('register');
// Route::post('register', 'RegisterController@store');

//--Homepage:
// Route::get('/', function () {
//     return view('welcome');
// })->name('homepage');
//
Route::get('/', [WebController::class, 'index']);
Route::get('/map', [WebController::class, 'map']);

//--Kecamatan:
Route::get('admin/kecamatan', 'Admin\KecamatanController@index')->name('kecamatan');
Route::get('admin/kecamatan/create', 'Admin\KecamatanController@create');

//--Sekolah:
Route::resource('admin/sekolah', 'Admin\SekolahController');
Route::post('admin/sekolah/upload-file/{id}', 'Admin\SekolahController@uploadFile');
Route::post('admin/sekolah/remove-file/{id}', 'Admin\SekolahController@removeFile');

//--Tugas:
// Route::get('tugas', 'TugasController@index')->middleware('auth');
// Route::get('tugas/create', 'TugasController@create')->middleware('auth');
// Route::get('tugas/execution/{tugasId}', 'TugasController@execution');

Route::group(['middleware' => 'auth'], function () {
    Route::get('tugas', 'TugasController@index');
    Route::get('tugas/create', 'TugasController@create');
    Route::get('tugas/todo', 'TugasController@todo');
    Route::get('tugas/todo/{id}', 'TugasController@showTodo');
    // Route::get('tugas/execution/{tugasId}', 'TugasController@execution');
    Route::match(['get','post'],'tugas/execution/{tugasId}', 'TugasController@execution');
});

//--Category:
Route::resource('category', 'CategoryController');
//--Post:
Route::get('post/trashedbin', 'PostController@trashedBin')->name('post.trashedbin');
Route::get('post/restore/{id}', 'PostController@restore')->name('post.restore');
Route::delete('post/kill/{id}', 'PostController@kill')->name('post.kill');
Route::resource('post', 'PostController');

//-Dashboard:
Route::get('mhz', 'MHzController@index')->name('mhz');

//--Member:
Route::get('admin/user', 'Admin\UserController@index')->name('user');
Route::get('admin/user/create', 'Admin\UserController@create');

//--Materi:
Route::resource('admin/materi', 'Admin\MateriController');

//--TUGAS:
Route::get('tugas/upload', [TugasController::class, 'uploadForm']);
Route::post('tugas/upload', [TugasController::class, 'submitUpload']);
