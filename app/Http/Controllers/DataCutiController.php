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
    // ADMIN
    // Menampilkan Data Cuti Karyawan.
    public function cutidata(){
        $data_cutis = DB::table('data_cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'data_cutis.nik')
                    ->whereIn('admins.jabatan', ['Operator'])
                    ->get();

        return view('admin.layouts.cutidata', [
            "title" => "Data Cuti Karyawan", 'data_cutis' => $data_cutis,
        ]);
    }
    // Detail Cuti Karyawan.
    public function cutidetail($nik){
        // $admins = DB::select('SELECT * FROM admins RIGHT JOIN data_cutis on admins.nik=data_cutis.nik WHERE admins.nik');
        $data_cutis = DB::table('data_cutis')
                    ->rightjoin('admins', 'data_cutis.nik', '=', 'admins.nik')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('admin.layouts.cutidetail', [
            "title" => "Detail Cuti Karyawan", 'data_cutis' => $data_cutis,
        ]);
    }
    // Tambah Cuti Karyawan
    public function cutitambah(Request $request, $nik) {
        // $admins     = DB::table('admins')->where('nik',$nik)->first()->tgl_masuk;
        // $now        = Carbon::now(); // Tanggal sekarang
        // $masuk      = Carbon::parse($admins); // Tanggal Masuk
        // $tahun_masuk = $masuk->year; // Mendapatkan tahun masuk
        // $tahun      = $masuk->diffInYears($now);  // Menghitung Masa Kerja

        // if($tahun>=1){
        //     $data_cutis = DB::table('data_cutis')->insert([
        //         'nik'           => $nik,
        //         'nama_cuti'     => 'Cuti Tahunan',
        //         'periode'       => Carbon::now()->format('Y'),
        //         'hak_cuti'      => '12',
        //         'cuti_diambil'  => '0',
        //         'sisa_cuti'     => '12',
        //     ]);
        //     return redirect()->back()->with('success', 'Data Cuti Berhasil Ditambah, Sesuai Dengan Periode Tahun ini...!!!');
        // }
        // else if($tahun<1){
        //     return redirect()->back()->with('warning', 'Masa Kerja Kurang Dari 1 Tahun...!!! Silahkan Menunggu Periode Selanjutnya...');
        // }
        $admins       = DB::table('admins')->where('nik',$nik)->first()->tgl_masuk;
        $now          = Carbon::now()->format('Y'); // Tahun sekarang
        $masuk        = Carbon::parse($admins); // Tanggal Masuk
        $tahun_masuk  = $masuk->year; // Mendapatkan tahun masuk
        // $tahun        = $masuk->diffInYears($now);  // Menghitung Masa Kerja

        if($tahun_masuk != $now){
            $cuti = DB::table('data_cutis')->where('nik', $nik)
                ->where('periode', Carbon::now()->format('Y'))
                ->where('nama_cuti', 'Cuti Tahunan')
                ->first();

                if (!$cuti) {
                    // hitung sisa cuti
                    $periode = Carbon::now()->format('Y');
                    $startDate = Carbon::parse($admins); // Mengambil tgl_masuk dari database sebagai startDate
                    $endDate = Carbon::now(); // Tanggal akhir adalah saat ini
                    $selisihbulan = $startDate->diffInMonths($endDate); // Menghitung selisih bulan antara startDate dan endDate
                    $cuti_diambil = 0;

                    // tambahkan data cuti baru
                    $data_cutis = DB::table('data_cutis')->insert([
                        'nik'           => $nik,
                        'nama_cuti'     => 'Cuti Tahunan',
                        'periode'       => $periode,
                        'hak_cuti'      => $selisihbulan,
                        'cuti_diambil'  => $cuti_diambil,
                        'sisa_cuti'     => $selisihbulan - $cuti_diambil,
                    ]);

                    return redirect()->back()->with('success', 'Data Cuti Berhasil Ditambah, Sesuai Dengan Periode Tahun ini...!!!');
                }
                else {
                    return redirect()->back()->with('warning', 'Data Cuti Tahunan Sudah Ada...!!!');
                }
        }
        else{
            return redirect()->back()->with('warning', 'Belum Memasuki Periode Tahun Baru...!!! Silahkan Menunggu Periode Selanjutnya...');
        }

    }
    // Update Cuti Karyawan.
    public function cutiupdate(Request $request, $nik){
        $now = Carbon::now()->year; // Tahun sekarang
        $data_cutis = DB::table('data_cutis')
                        ->rightjoin('admins', 'data_cutis.nik', '=', 'admins.nik')
                        ->where('admins.nik', $nik)
                        ->get();

        foreach ($data_cutis as $row) {
            if($row->periode != $now){
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
            }
        }
    }

    // MANAGER
    // data cuti
    public function cutidata2(){
        $data_cutis = DB::table('data_cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'data_cutis.nik')
                    ->whereIn('admins.jabatan', ['Operator'])
                    ->get();

        return view('manager.layouts.cutidata', [
            "title" => "Data Cuti Karyawan", 'data_cutis' => $data_cutis,
        ]);
    }
    // detail data cuti
    public function cutidetail2($nik){
        // $admins = DB::select('SELECT * FROM admins RIGHT JOIN data_cutis on admins.nik=data_cutis.nik WHERE admins.nik');
        $data_cutis = DB::table('data_cutis')
                    ->rightjoin('admins', 'data_cutis.nik', '=', 'admins.nik')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('manager.layouts.cutidetail', [
            "title" => "Detail Cuti Karyawan", 'data_cutis' => $data_cutis,
        ]);
    }

    // KABAG
    // data cuti
    public function cutidata3(){
        $data_cutis = DB::table('data_cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'data_cutis.nik')
                    ->whereIn('admins.jabatan', ['Operator'])
                    ->get();

        return view('kabag.layouts.cutidata', [
            "title" => "Data Cuti Karyawan", 'data_cutis' => $data_cutis,
        ]);
    }
    // detail data cuti
    public function cutidetail3($nik){
        // $admins = DB::select('SELECT * FROM admins RIGHT JOIN data_cutis on admins.nik=data_cutis.nik WHERE admins.nik');
        $data_cutis = DB::table('data_cutis')
                    ->rightjoin('admins', 'data_cutis.nik', '=', 'admins.nik')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('kabag.layouts.cutidetail', [
            "title" => "Detail Cuti Karyawan", 'data_cutis' => $data_cutis,
        ]);
    }

    //OPERATOR
    // data cuti
    public function cutidata4(){
        $nik = auth()->user()->nik;
        $data_cutis = DB::table('data_cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'data_cutis.nik')
                    ->where('data_cutis.nik', $nik)
                    ->get();

        return view('operator.layouts.cutidata', [
            "title" => "Data Cuti Karyawan", 'data_cutis' => $data_cutis,
        ]);
    }
    // detail data cuti
    public function cutidetail4($nik){
        $data_cutis = DB::table('data_cutis')
                    ->rightjoin('admins', 'data_cutis.nik', '=', 'admins.nik')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('operator.layouts.cutidetail', [
            "title" => "Detail Cuti Karyawan", 'data_cutis' => $data_cutis,
        ]);
    }


}
