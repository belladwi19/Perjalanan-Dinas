<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPegawaiController;
use App\Http\Controllers\Admin\AdminKotaController;
use App\Http\Controllers\Admin\AdminPerdinController;

use App\Http\Controllers\Pegawai\PegawaiHomeController;
use App\Http\Controllers\Pegawai\PegawaiHistoryController;
use App\Http\Controllers\Pegawai\PegawaiPerdinController;

use App\Http\Controllers\SDM\SDMHomeController;
use App\Http\Controllers\SDM\SDMPerdinController;
use App\Http\Controllers\SDM\SDMHistoryController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth', 'isAdmin:0'])->group(function () {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
    
    Route::get('/datapegawai', [AdminPegawaiController::class, 'index'])->name('datapegawai');
    Route::get('/show/{id}', [AdminPegawaiController::class, 'show'])->name('detail.datapegawai');
    Route::get('/create', [AdminPegawaiController::class, 'create'])->name('create');
    Route::post('/store',  [AdminPegawaiController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [AdminPegawaiController::class, 'delete'])->name('delete');

    Route::get('/datakota',  [AdminKotaController::class, 'index'])->name('datakota');
    Route::post('/storekota',  [AdminKotaController::class, 'store'])->name('storekota');
    Route::get('/createkota', [AdminKotaController::class, 'create'])->name('createkota');
    Route::get('/deletekota/{id}', [AdminKotaController::class, 'delete'])->name('deletekota');
    Route::get('/showkota/{id}', [AdminKotaController::class, 'show'])->name('showkota');
    Route::post('/updatekota/{id}', [AdminKotaController::class, 'update'])->name('updatekota');
    Route::get('/searchkota', [AdminKotaController::class, 'searchkota'])->name('searchkota.datakota');

    Route::get('/dataperdin',  [AdminPerdinController::class, 'index'])->name('dataperdin');
    Route::get('/detailperdin/{id}',  [AdminPerdinController::class, 'detail'])->name('detailperdin');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'isAdmin:1'])->group(function () {
    Route::get('/homepegawai', [PegawaiHomeController::class, 'index'])->name('pegawai.home');

    Route::get('/pengajuan', [PegawaiPerdinController::class, 'index'])->name('pengajuan');
    Route::get('/createperdin', [PegawaiPerdinController::class, 'create'])->name('createperdin');
    Route::post('/store',  [PegawaiPerdinController::class, 'store'])->name('store.perdin');

    Route::get('/history', [PegawaiHistoryController::class, 'index'])->name('history');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'isAdmin:2'])->group(function () {
  
    Route::get('/homeSDM', [SDMHomeController::class, 'index'])->name('SDM.home');

    Route::get('/approval', [SDMPerdinController::class, 'index'])->name('approval');
    Route::get('/show/{id}', [SDMPerdinController::class, 'show'])->name('detail.approval');
    Route::get('/reject/{id}',  [SDMPerdinController::class, 'reject'])->name('reject');
    Route::get('/acc/{id}',  [SDMPerdinController::class, 'acc'])->name('acc');

    Route::get('/historySDM', [SDMHistoryController::class, 'index'])->name('historySDM');
});