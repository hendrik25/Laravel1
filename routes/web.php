<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LoginController;
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
    Route::group(['middleware' =>['cekUserLogin:admin']], function(){
        //menu
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/vertifikasi', [AdminController::class, 'vertifikasi'])->name('veritifikasi');
        Route::get('/admin/riwayat', [AdminController::class, 'riwayat'])->name('riwayat');
        Route::get('/admin/datakaryawan', [AdminController::class, 'datakaryawan'])->name('tampil');
        Route::get('/admin/datacuti', [AdminController::class, 'datacuti'])->name('datacuti');
        Route::get('/admin/laporan', [AdminController::class, 'laporancuti'])->name('laporancuti');
        Route::get('/admin/user', [AdminController::class, 'user'])->name('user');
        Route::post('/admin/user/update', [AdminController::class, 'updateuser'])->name('updateuser');
        //profil
        Route::get('/admin/profil', [AdminController::class, 'profil'])->name('profil');
        //datakaryawan
        Route::get('/admin/tambahkaryawan', [AdminController::class, 'tambahkaryawan'])->name('tambah');
        Route::post('/admin/tambah', [AdminController::class, 'tambahdata'])->name('tambahdata');
        Route::get('/admin/edit/{nik}', [AdminController::class, 'edit'])->name('edit');
        Route::post('/admin/update{nik}', [AdminController::class, 'update']);
        Route::get('/admin/detail/{nik}', [AdminController::class, 'detail'])->name('detail');
        Route::get('/admin/delete/{nik}', [AdminController::class, 'destroy']);

        //datacuti
        Route::get('/admin/detailcuti/{nik}', [AdminController::class, 'detailcuti'])->name('detailcuti');
        Route::get('/admin/tambahcuti/{nik}', function (Request $request, $nik) {
            $admins     = DB::table('admins')->where('nik',$nik)->first()->tgl_masuk;
            $now        = Carbon::now(); // Tanggal sekarang
            $masuk      = Carbon::parse($admins); // Tanggal Masuk
            $tahun      = $masuk->diffInYears($now);  // Menghitung Masa Kerja
            if ($posts = DataCuti::where('nik', $nik)->get('id_cuti')->isNotEmpty()) {
                return redirect('/admin/datacuti')->with('warning', 'Data Cuti Sudah Terisi...!!! Silahkan Update Data Cuti...');
            }
            else if($tahun>=1){
                $data_cutis = DB::table('data_cutis')->insert([
                    'nik'           => $nik,
                    'nama_cuti'     => 'Cuti Tahunan',
                    'periode'       => Carbon::now()->format('Y'),
                    'hak_cuti'      => '12',
                    'cuti_diambil'  => '0',
                    'sisa_cuti'     => '12',
                ]);
                return redirect('/admin/datacuti')->with('sukses', 'Data Cuti Berhasil Ditambah, Sesuai Dengan Periode Tahun ini...!!!');
            }
            else if($tahun<1){
                return redirect('/admin/datacuti')->with('gagal', 'Masa Kerja Kurang Dari 1 Tahun...!!! Silahkan Menunggu Periode Selanjutnya...');
            }
        });
        // Route::get('/admin/tambahcuti/{nik}', [AdminController::class, 'tambahcuti'])->name('tambahcuti');
        Route::get('/admin/updatecuti/{nik}', [AdminController::class, 'updatecuti'])->name('updatecuti');
    });

    Route::group(['middleware' =>['cekUserLogin:manager']], function(){
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
