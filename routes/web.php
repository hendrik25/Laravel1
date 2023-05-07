<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataKarController;
use App\Http\Controllers\DataCutiController;
use App\Http\Controllers\VertifikasiController;
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

        // Vertifikasi
        Route::get('/admin/vertifikasi', [VertifikasiController::class, 'vertifikasi'])->name('veritifikasi');
        Route::get('/admin/vertifikasidetail/{nik}', [VertifikasiController::class, 'vertifikasidetail'])->name('vertifikasidetail');
        Route::get('/admin/riwayat', [VertifikasiController::class, 'riwayat'])->name('riwayat');
        Route::get('/admin/riwayatdetail/{nik}', [VertifikasiController::class, 'riwayatdetail'])->name('riwayatdetail');

        //datakaryawan
        Route::get('/admin/karyawandata', [DataKarController::class, 'karyawandata'])->name('karyawandata');
        Route::get('/admin/karyawantambah', [DataKarController::class, 'karyawantambah'])->name('karyawantambah');
       Route::post('/admin/tambahdata', [DataKarController::class, 'tambahdata'])->name('tambahdata');
        Route::get('/admin/karyawanedit/{nik}', [DataKarController::class, 'edit'])->name('edit');
       Route::post('/admin/karyawanupdate{nik}', [DataKarController::class, 'update'])->name('update');
        Route::get('/admin/karyawandetail/{nik}', [DataKarController::class, 'detail'])->name('detail');
        Route::get('/admin/karyawandelete/{nik}', [DataKarController::class, 'destroy'])->name('destroy');

        //datacuti
        Route::get('/admin/cutidata', [DataCutiController::class, 'cutidata'])->name('cutidata');
        Route::get('/admin/cutidetail/{nik}', [DataCutiController::class, 'cutidetail'])->name('cutidetail');
        Route::get('/admin/cutitambah/{nik}', [DataCutiController::class, 'cutitambah'])->name('cutitambah');
        Route::get('/admin/cutiupdate/{nik}', [DataCutiController::class, 'cutiupdate'])->name('cutiupdate');

        //Kelola user
        Route::get('/admin/user', [AdminController::class, 'user'])->name('user');
        Route::post('/admin/user-regist{nik}', [AdminController::class, 'regist'])->name('regist');
        Route::post('/admin/user/edit{nik}', [AdminController::class, 'edit'])->name('edit');
        Route::get('/admin/user-delete{nik}', [AdminController::class, 'destroy'])->name('destroy');
        //changepassword
        Route::post('/admin/user/update', [AdminController::class, 'updateuser'])->name('updateuser');

        //profil
        Route::get('/admin/profil', [AdminController::class, 'profil'])->name('profil');

        //laporan
        Route::get('/admin/laporan', [AdminController::class, 'laporancuti'])->name('laporancuti');
    });

    Route::group(['middleware' =>['cekUserLogin:Manager']], function(){
        //menu
        Route::get('/manager', [ManagerController::class, 'index'])->name('manager');

        //vertifikasi
        Route::get('/manager/vertifikasi', [VertifikasiController::class, 'vertifikasi2'])->name('veritifikasi2');
        Route::get('/manager/vertifikasidetail2/{nik}', [VertifikasiController::class, 'vertifikasidetail2'])->name('vertifikasidetail2');
        Route::get('/manager/riwayat2', [VertifikasiController::class, 'riwayat2'])->name('riwayat2');
        Route::get('/manager/riwayatdetail2/{nik}', [VertifikasiController::class, 'riwayatdetail2'])->name('riwayatdetail2');

        //Data Karyawan
        Route::get('/manager/karyawandata', [DataKarController::class, 'karyawandata2'])->name('karyawandata2');
        Route::get('/manager/karyawandetail/{nik}', [DataKarController::class, 'detail2'])->name('detail2');

        //data cuti
        Route::get('/manager/cutidata2', [DataCutiController::class, 'cutidata2'])->name('cutidata2');
        Route::get('/manager/cutidetail2/{nik}', [DataCutiController::class, 'cutidetail2'])->name('cutidetail2');

        //profil
        Route::get('/manager/profil', [ManagerController::class, 'profil'])->name('profil');
        //user
        Route::post('/manager/user/update', [AdminController::class, 'updateuser2'])->name('updateuser2');
        //laporan
        Route::get('/manager/laporan', [ManagerController::class, 'laporancuti'])->name('laporancuti');
    });
});
