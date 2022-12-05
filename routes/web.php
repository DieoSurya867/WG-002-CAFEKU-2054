<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//link ke tampilan awal
Route::resource('/', UserController::class);

//autentikasi admin
Route::middleware(['auth', 'admin'])->group(function () {
    //link tampilan admin dashboard
    Route::resource('admin/dashboard', DashboardController::class);
    //link tampilan admin menu
    Route::resource('admin/menu', MenuController::class);
    //link tampilan admin kategori
    Route::resource('admin/kategori', KategoriController::class);
    //route untuk menghapus data kategori
    Route::get('deletekategori/{id}', [KategoriController::class, 'destroy'])->name('deletekategori');
    //route untuk menghapus data menu
    Route::get('deletemenu/{id}', [MenuController::class, 'destroy'])->name('deletemenu');
});
//autentikasi owner
Route::middleware(['auth', 'owner'])->group(function () {
    //link ke tampilan admin user role
    Route::resource('admin/user', RoleController::class);
    //route untuk menghapus data user
    Route::get('deleteuser/{id}', [RoleController::class, 'destroy'])->name('deleteuser');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
