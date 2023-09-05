<?php

use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\LogsheetController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('/pegawai/roles', RoleController::class);
    Route::resource('/pegawai/permissions', PermissionController::class);
    Route::resource('/pegawai/data', PegawaiController::class);
    Route::resource('/laporan/berita-acara', BeritaAcaraController::class);
    Route::resource('/laporan/logsheet', LogsheetController::class);
});
