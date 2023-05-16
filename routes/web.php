<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataKarController;
use App\Http\Controllers\DataCutiController;
use App\Http\Controllers\VertifikasiController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\KabagController;
use App\Http\Controllers\OperatorController;
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
    //admin
    Route::group(['middleware' =>['cekUserLogin:Admin']], function(){
        //menu
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');

        // Vertifikasi
        Route::get('/admin/vertifikasi', [VertifikasiController::class, 'vertifikasi'])->name('veritifikasi');
        Route::get('/admin/vertifikasidetail/{id}', [VertifikasiController::class, 'vertifikasidetail'])->name('vertifikasidetail');
        Route::get('/admin/riwayat', [VertifikasiController::class, 'riwayat'])->name('riwayat');
        Route::get('/admin/riwayatdetail/{id}', [VertifikasiController::class, 'riwayatdetail'])->name('riwayatdetail');
        Route::get('/admin/approved/{id}', [VertifikasiController::class, 'approved'])->name('approved');
        Route::get('/admin/rejected/{id}', [VertifikasiController::class, 'rejected'])->name('rejected');

        Route::get('/admin/riwayatapproved', [VertifikasiController::class, 'approvedadmin'])->name('approvedadmin');
        Route::get('/admin/riwayatrejected', [VertifikasiController::class, 'rejectedadmin'])->name('rejectedadmin');

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
        Route::get('/admin/profiledit/{nik}', [AdminController::class, 'profiledit'])->name('profiledit');
        Route::post('/admin/editprofil/{nik}', [AdminController::class, 'editprofil'])->name('editprofil');

        //laporan
        Route::get('/admin/laporan', [AdminController::class, 'laporancuti'])->name('laporancuti');
        Route::get('/admin/laporandetail/{id}', [AdminController::class, 'laporandetail'])->name('laporandetail');
        Route::get('/admin/laporanprint/{id_vertif}', [AdminController::class, 'laporanprint'])->name('laporanprint');

    });
    //manager
    Route::group(['middleware' =>['cekUserLogin:Manager']], function(){
        //menu
        Route::get('/manager', [ManagerController::class, 'index'])->name('manager');

        //vertifikasi
        Route::get('/manager/vertifikasi', [VertifikasiController::class, 'vertifikasi2'])->name('veritifikasi2');
        Route::get('/manager/vertifikasidetail2/{id}', [VertifikasiController::class, 'vertifikasidetail2'])->name('vertifikasidetail2');
        Route::get('/manager/approved/{id}', [VertifikasiController::class, 'approved2'])->name('approved2');
        Route::get('/manager/rejected/{id}', [VertifikasiController::class, 'rejected2'])->name('rejected2');

        //riwayat
        Route::get('/manager/riwayat2', [VertifikasiController::class, 'riwayat2'])->name('riwayat2');
        Route::get('/manager/riwayatdetail2/{id}', [VertifikasiController::class, 'riwayatdetail2'])->name('riwayatdetail2');

        Route::get('/manager/riwayatapproved', [VertifikasiController::class, 'approvedmanager'])->name('approvedmanager');
        Route::get('/manager/riwayatrejected', [VertifikasiController::class, 'rejectedmanager'])->name('rejectedmanager');

        //Data Karyawan
        Route::get('/manager/karyawandata', [DataKarController::class, 'karyawandata2'])->name('karyawandata2');
        Route::get('/manager/karyawandetail/{nik}', [DataKarController::class, 'detail2'])->name('detail2');

        //data cuti
        Route::get('/manager/cutidata2', [DataCutiController::class, 'cutidata2'])->name('cutidata2');
        Route::get('/manager/cutidetail2/{nik}', [DataCutiController::class, 'cutidetail2'])->name('cutidetail2');

        //profil
        Route::get('/manager/profil', [ManagerController::class, 'profil'])->name('profil');
        Route::get('/manager/profiledit/{nik}', [ManagerController::class, 'profiledit'])->name('profiledit');
        Route::post('/manager/editprofil/{nik}', [ManagerController::class, 'editprofil'])->name('editprofil');

        //changepassword
        Route::post('/manager/user/update', [ManagerController::class, 'updateuser2'])->name('updateuser2');
        //laporan
        Route::get('/manager/laporan', [ManagerController::class, 'laporancuti'])->name('laporancuti');
        Route::get('/manager/laporandetail/{id}', [ManagerController::class, 'laporandetail'])->name('laporandetail');
    });
    //kabag
    Route::group(['middleware' =>['cekUserLogin:Kepala Bagian']], function(){
        //menu
        Route::get('/kabag', [KabagController::class, 'index'])->name('kepala bagian');

        //vertifikasi
        Route::get('/kabag/vertifikasi', [VertifikasiController::class, 'vertifikasi3'])->name('veritifikasi3');
        Route::get('/kabag/vertifikasidetail3/{id}', [VertifikasiController::class, 'vertifikasidetail3'])->name('vertifikasidetail3');
        Route::get('/kabag/approved/{id}', [VertifikasiController::class, 'approved3'])->name('approved3');
        Route::get('/kabag/rejected/{id}', [VertifikasiController::class, 'rejected3'])->name('rejected3');

        //riwayat
        Route::get('/kabag/riwayat3', [VertifikasiController::class, 'riwayat3'])->name('riwayat3');
        Route::get('/kabag/riwayatdetail3/{nik}', [VertifikasiController::class, 'riwayatdetail3'])->name('riwayatdetail3');

        Route::get('/kabag/riwayatapproved', [VertifikasiController::class, 'approvedkabag'])->name('approvedkabag');
        Route::get('/kabag/riwayatrejected', [VertifikasiController::class, 'rejectedkabag'])->name('rejectedkabag');


        //Data Karyawan
        Route::get('/kabag/karyawandata', [DataKarController::class, 'karyawandata3'])->name('karyawandata3');
        Route::get('/kabag/karyawandetail/{nik}', [DataKarController::class, 'detail3'])->name('detail3');

        //data cuti
        Route::get('/kabag/cutidata3', [DataCutiController::class, 'cutidata3'])->name('cutidata3');
        Route::get('/kabag/cutidetail3/{nik}', [DataCutiController::class, 'cutidetail3'])->name('cutidetail3');

        //profil
        Route::get('/kabag/profil', [KabagController::class, 'profil'])->name('profil');
        Route::get('/kabag/profiledit/{nik}', [KabagController::class, 'profiledit'])->name('profiledit');
        Route::post('/kabag/editprofil/{nik}', [KabagController::class, 'editprofil'])->name('editprofil');

        //changepassword
        Route::post('/kabag/user/update', [KabagController::class, 'updateuser3'])->name('updateuser3');
    });

    //operator
    Route::group(['middleware' =>['cekUserLogin:Operator']], function(){
        //menu
        Route::get('/operator', [OperatorController::class, 'index'])->name('operator');

        //pengajuan cuti
        Route::get('/operator/pengajuancuti', [OperatorController::class, 'pengajuan'])->name('pengajuan');
        Route::post('/operator/pengajuanproses', [OperatorController::class, 'pengajuanproses'])->name('pengajuanproses');

        //riwayat
        Route::get('/operator/riwayat', [VertifikasiController::class, 'riwayat4'])->name('riwayat4');
        Route::get('/operator/riwayatdetail4/{id}', [VertifikasiController::class, 'riwayatdetail4'])->name('riwayatdetail4');
        Route::get('/operator/riwayatedit4/{id}', [VertifikasiController::class, 'riwayatedit4'])->name('riwayatedit4');
        Route::post('/operator/riwayatupdate/{id}', [VertifikasiController::class, 'riwayatupdate'])->name('riwayatupdate');
        Route::get('/operator/riwayathapus4/{id}', [VertifikasiController::class, 'riwayathapus4'])->name('riwayathapus4');

        Route::get('/operator/riwayatpending', [VertifikasiController::class, 'pending4'])->name('pending4');
        Route::get('/operator/riwayatapproved', [VertifikasiController::class, 'approved4'])->name('approved4');
        Route::get('/operator/riwayatrejected', [VertifikasiController::class, 'rejected4'])->name('rejected4');

        //data cuti
        Route::get('/operator/cutidata4', [DataCutiController::class, 'cutidata4'])->name('cutidata4');
        Route::get('/operator/cutidetail4/{nik}', [DataCutiController::class, 'cutidetail4'])->name('cutidetail4');

        //profil
        Route::get('/operator/profil', [OperatorController::class, 'profil'])->name('profil');
        Route::get('/operator/profiledit/{nik}', [OperatorController::class, 'profiledit'])->name('profiledit');
        Route::post('/operator/editprofil/{nik}', [OperatorController::class, 'editprofil'])->name('editprofil');

        //changepassword
        Route::post('/operator/user/update', [OperatorController::class, 'updateuser4'])->name('updateuser4');
    });
});
