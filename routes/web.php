<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataKarController;
use App\Http\Controllers\DataCutiController;

use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\DataCuti;
use Illuminate\Http\Request;

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
Route::controller(LoginController::class)->group(function(){
    Route::get('/', 'index')->name('login');
    Route::post('/login', 'proses')->name('proses');
    Route::get('logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' =>['cekUserLogin:Admin']], function(){
        //menu
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/vertifikasi', [AdminController::class, 'vertifikasi'])->name('veritifikasi');
        Route::get('/admin/riwayat', [AdminController::class, 'riwayat'])->name('riwayat');
        Route::get('/admin/datakaryawan', [AdminController::class, 'datakaryawan'])->name('tampil');
        Route::get('/admin/datacuti', [AdminController::class, 'datacuti'])->name('datacuti');
        Route::get('/admin/laporan', [AdminController::class, 'laporancuti'])->name('laporancuti');

        //Kelola user
        Route::get('/admin/user', [AdminController::class, 'user'])->name('user');
        Route::get('/admin/user-delete{nik}', [AdminController::class, 'destroy'])->name('destroy');

        Route::post('/admin/user-regist{nik}', [AdminController::class, 'regist'])->name('regist');

        Route::post('/admin/user/edit{nik}', [AdminController::class, 'edit'])->name('edit');

        Route::post('/admin/user/update', [AdminController::class, 'updateuser'])->name('updateuser');

        //profil
        Route::get('/admin/profil', [AdminController::class, 'profil'])->name('profil');

        //datakaryawan
        Route::get('/admin/tambahkaryawan', [DataKarController::class, 'tambahkaryawan'])->name('tambah');
        Route::post('/admin/tambah', [DataKarController::class, 'tambahdata'])->name('tambahdata');
        Route::get('/admin/edit/{nik}', [DataKarController::class, 'edit'])->name('edit');
        Route::post('/admin/update{nik}', [DataKarController::class, 'update']);
        Route::get('/admin/detail/{nik}', [DataKarController::class, 'detail'])->name('detail');
        Route::get('/admin/delete/{nik}', [DataKarController::class, 'destroy']);

        //datacuti
        Route::get('/admin/detailcuti/{nik}', [DataCutiController::class, 'detailcuti'])->name('detailcuti');
        Route::get('/admin/tambahcuti/{nik}', [DataCutiController::class, 'tambahcuti'])->name('tambahcuti');
        Route::get('/admin/updatecuti/{nik}', [DataCutiController::class, 'updatecuti'])->name('updatecuti');
    });

    Route::group(['middleware' =>['cekUserLogin:Manager']], function(){
        //menu
        Route::get('/manager', [ManagerController::class, 'index'])->name('manager');
        Route::get('/manager/vertifikasi', [ManagerController::class, 'vertifikasi'])->name('veritifikasi');
        Route::get('/manager/riwayat', [ManagerController::class, 'riwayat'])->name('riwayat');
        Route::get('/manager/datakaryawan', [ManagerController::class, 'datakaryawan'])->name('tampil');
        Route::get('/manager/datacuti', [ManagerController::class, 'datacuti'])->name('datacuti');
        Route::get('/manager/laporan', [ManagerController::class, 'laporancuti'])->name('laporancuti');
        //profil
        Route::get('/manager/profil', [ManagerController::class, 'profil'])->name('profil');

    });
});
