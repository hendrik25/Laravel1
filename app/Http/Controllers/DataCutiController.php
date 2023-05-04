<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\DataCuti;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DataCutiController extends Controller
{
    /**
     * Detail Cuti Karyawan.
     */

     public function detailcuti($nik){
        // $admins = DB::select('SELECT * FROM admins RIGHT JOIN data_cutis on admins.nik=data_cutis.nik WHERE admins.nik');
        $data_cutis = DB::table('data_cutis')
                    ->rightjoin('admins', 'data_cutis.nik', '=', 'admins.nik')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('admin.layouts.detailcuti', [
            "title" => "Data Cuti Karyawan", 'data_cutis' => $data_cutis,
        ]);
    }
    /**
     * Tambah Cuti Karyawan.
     */
    public function tambahcuti(Request $request, $nik) {
        $admins     = DB::table('admins')->where('nik',$nik)->first()->tgl_masuk;
        $now        = Carbon::now(); // Tanggal sekarang
        $masuk      = Carbon::parse($admins); // Tanggal Masuk
        $tahun      = $masuk->diffInYears($now);  // Menghitung Masa Kerja
        if ($posts = DataCuti::where('nik', $nik)->get('id_cuti')->isNotEmpty()) {
            return redirect()->back()->with('warning', 'Data Cuti Sudah Terisi...!!! Silahkan Update Data Cuti...');
            // return redirect('/admin/datacuti')->with('warning', 'Data Cuti Sudah Terisi...!!! Silahkan Update Data Cuti...');
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
            return redirect()->back()->with('success', 'Data Cuti Berhasil Ditambah, Sesuai Dengan Periode Tahun ini...!!!');
            // return redirect('/admin/datacuti')->with('sukses', 'Data Cuti Berhasil Ditambah, Sesuai Dengan Periode Tahun ini...!!!');
        }
        else if($tahun<1){
            return redirect()->back()->with('warning', 'Masa Kerja Kurang Dari 1 Tahun...!!! Silahkan Menunggu Periode Selanjutnya...');
            // return redirect('/admin/datacuti')->with('gagal', 'Masa Kerja Kurang Dari 1 Tahun...!!! Silahkan Menunggu Periode Selanjutnya...');
        }
    }

    /**
     * Update Cuti Karyawan.
     */
    public function updatecuti(Request $request, $nik){
        $now = Carbon::now()->year; // Tahun sekarang
        $data_cutis = DB::table('data_cutis')
                        ->rightjoin('admins', 'data_cutis.nik', '=', 'admins.nik')
                        ->where('admins.nik', $nik)
                        ->get();

        foreach ($data_cutis as $row) {
            if (empty($row->id_cuti)) {
                return redirect()->back()->with('error', 'Data Cuti Belum Terisi...!!! Silahkan Tambah Data Cuti...');
                // return redirect('/admin/datacuti')->with('gagal', 'Data Cuti Belum Terisi...!!! Silahkan Tambah Data Cuti...');
            }
            else if($row->periode == $now){
                return redirect()->back()->with('error', 'Periode Cuti Masih Berlaku...!!! Silahkan Tunggu Periode Selanjutnya Untuk Update Data...');
                // return redirect('/admin/datacuti')->with('gagal', 'Periode Cuti Masih Berlaku...!!! Silahkan Tunggu Periode Selanjutnya Untuk Update Data...');
            }
            else if($row->periode != $now){
                $ID         = $row->id_cuti;
                $NIK        = $row->nik;
                $NAMA       = $row->nama_cuti;
                $PERIODE    = $row->periode;
                $HAK        = $row->hak_cuti;  //12
                $AMBIL      = $row->cuti_diambil; //0
                $SISA       = $row->sisa_cuti;//12

                //menghitung jumlah akumulasi cuti
                $periode    = Carbon::now()->year;
                $hak2       = $HAK+12; //12+12=24;
                $ambil2     = $AMBIL; //0
                $sisa2      = $hak2-$ambil2; //24-0=24

                DB::table('data_cutis')
                    ->where('nik', '=', $nik)
                    ->update([
                        'periode'       => $periode,
                        'hak_cuti'      => $hak2,
                        'cuti_diambil'  => $ambil2,
                        'sisa_cuti'     => $sisa2,
                ]);
                return redirect()->back()->with('success', 'Data Cuti Berhasil DI Update...!!!');
                // return redirect('/admin/datacuti')->with('sukses', 'Data Berhasil DI Update...!!!');
            }
        }
    }
}
