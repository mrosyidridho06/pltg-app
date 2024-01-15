<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\LogsheetController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\BlackStartDieselController;
use App\Http\Controllers\ChecklistFirePumpController;
use App\Http\Controllers\ChecklistStartMesinController;
use App\Http\Controllers\ChecklistStopMesinController;
use App\Http\Controllers\PatrolCheckController;
use App\Http\Controllers\JenisLogsheetController;
use App\Http\Controllers\LogsheetHmitm1Controller;
use App\Http\Controllers\LogsheetHmitm2Controller;
use App\Http\Controllers\ParameterLogsheetController;
use App\Http\Controllers\PenyulangPembangkitController;

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


Auth::routes([
    'register' => false,
]);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/pegawai/roles', RoleController::class);
    Route::resource('/pegawai/permissions', PermissionController::class);
    Route::resource('/pegawai/data', PegawaiController::class);
    Route::resource('/berita-acara', BeritaAcaraController::class);
    Route::resource('/laporan/patrol-check', PatrolCheckController::class);
    Route::post('/patroldetail', [PatrolCheckController::class, 'storeDetail'])->name('patroldetail');
    Route::post('/patrolisi', [PatrolCheckController::class, 'storeIsiDetail'])->name('patrolisi');
    Route::get('/isipatrol/{slug}', [PatrolCheckController::class, 'isi'])->name('isipatrol');
    Route::resource('/laporan/logsheet-hmitm1', LogsheetHmitm1Controller::class);
    Route::resource('/laporan/logsheet-hmitm2', LogsheetHmitm2Controller::class);
    Route::resource('/laporan/logsheet', LogsheetController::class);
    Route::resource('/checklist-mesin/start', ChecklistStartMesinController::class);
    Route::get('/isistart/{slug}', [ChecklistStartMesinController::class, 'isi'])->name('isistart');
    Route::post('/startdetail', [ChecklistStartMesinController::class, 'storeDetail'])->name('startdetail');
    Route::post('/startisi', [ChecklistStartMesinController::class, 'storeIsiDetail'])->name('startisi');
    Route::resource('/checklist-mesin/stop', ChecklistStopMesinController::class);
    Route::get('/isistop/{slug}', [ChecklistStopMesinController::class, 'isi'])->name('isistop');
    Route::post('/stopdetail', [ChecklistStopMesinController::class, 'storeDetail'])->name('stopdetail');
    Route::post('/stopisi', [ChecklistStopMesinController::class, 'storeIsiDetail'])->name('stopisi');
    Route::resource('/document/bsd', BlackStartDieselController::class);
    Route::post('/bsddetail', [BlackStartDieselController::class, 'storeDetail'])->name('bsddetail');
    Route::post('/isibsd', [BlackStartDieselController::class, 'storeIsi'])->name('isibsd');
    Route::resource('/document/firepump', ChecklistFirePumpController::class);
    Route::post('/firepumpdetail', [ChecklistFirePumpController::class, 'storeDetail'])->name('firepumpdetail');
    Route::post('/firepumpisi', [ChecklistFirePumpController::class, 'storeIsiDetail'])->name('firepumpisi');
    Route::get('/isifirepump/{slug}', [ChecklistFirePumpController::class, 'isi'])->name('isifirepump');
    Route::resource('/document/penyulang-pembangkit', PenyulangPembangkitController::class);
    Route::post('/document/penyulang-pembangkit/penyulangdetail', [PenyulangPembangkitController::class, 'storeDetail'])->name('penyulangdetail');
    Route::post('/document/penyulang-pembangkit/penyulangisi', [PenyulangPembangkitController::class, 'storeIsiDetail'])->name('penyulangisi');
    Route::get('/document/penyulang-pembangkit/isi/{slug}', [PenyulangPembangkitController::class, 'isi'])->name('isipenyulang');
    Route::resource('/master/shift', ShiftController::class);
    Route::resource('/master/jenis-logsheet', JenisLogsheetController::class);
    Route::resource('/master/parameter-logsheet', ParameterLogsheetController::class);
});
