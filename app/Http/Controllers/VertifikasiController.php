<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\DataCuti;
use App\Models\Cuti;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VertifikasiController extends Controller
{
    /**
     * Menampilkan Verifikasi Cuti Karyawan.
     */
    public function vertifikasi(){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'cutis.nik')
                    ->whereIn('admins.jabatan', ['Operator'])
                    ->get();

        return view('admin.layouts.vertifikasi', [
            "title" => "Vertifikasi Cuti Karyawan", 'cutis' => $cutis,
        ]);
    }
    public function vertifikasi2(){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'cutis.nik')
                    ->whereIn('admins.jabatan', ['Operator'])
                    ->get();

        return view('manager.layouts.vertifikasi', [
            "title" => "Vertifikasi Cuti Karyawan", 'cutis' => $cutis,
        ]);
    }

    /**
     * Menampilkan Detail Verifikasi Cuti Karyawan.
     */
    public function vertifikasidetail($nik){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('admins.nik', $nik)
                    ->get();

        return view('admin.layouts.vertifikasidetail', [
            "title" => "Detail Cuti Karyawan", 'cutis' => $cutis
        ]);
    }
    public function vertifikasidetail2($nik){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('admins.nik', $nik)
                    ->get();

        return view('manager.layouts.vertifikasidetail', [
            "title" => "Detail Cuti Karyawan", 'cutis' => $cutis
        ]);
    }

    /**
     * Menampilkan Riwayat Verifikasi Cuti Karyawan.
     */
    public function riwayat(){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->whereIn('jabatan', ['Manager', 'Kepala Bagian', 'Operator'])
                    ->get();
        return view('admin.layouts.riwayat', [
            "title" => "Riwayat Cuti Karyawan", 'cutis' => $cutis
        ]);
    }
    public function riwayat2(){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->whereIn('jabatan', ['Kepala Bagian', 'Operator'])
                    ->get();
        return view('manager.layouts.riwayat', [
            "title" => "Riwayat Cuti Karyawan", 'cutis' => $cutis
        ]);
    }
    public function riwayatdetail($nik){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('admin.layouts.riwayatdetail', [
            "title" => "Detail Riwayat", 'cutis' => $cutis
        ]);
    }
    public function riwayatdetail2($nik){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('manager.layouts.riwayatdetail', [
            "title" => "Detail Riwayat", 'cutis' => $cutis
        ]);
    }
}
