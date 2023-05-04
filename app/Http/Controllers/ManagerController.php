<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use Illuminate\Support\Facades\DB;
use Session;

class ManagerController extends Controller
{
    /**
     * Dashboard.
     */
    public function index(){
        return view('manager.index', [
            "title" => "Dashboard",
        ]);
    }

    /**
     * Profil Karyawan.
     */
    public function profil(){
        return view('manager.layouts.profil', [
            "title" => "Profil Karyawan"
        ]);
    }

    /**
     * Verifikasi Cuti Karyawan.
     */
    public function vertifikasi(){
        return view('manager.layouts.vertifikasi', [
            "title" => "Data Vertifikasi Cuti Karyawan"
        ]);
    }

    /**
     * Riwayat Verifikasi Cuti Karyawan.
     */
    public function riwayat(){
        return view('manager.layouts.riwayatvertifikasi', [
            "title" => "Data Riwayat Cuti Karyawan"
        ]);
    }

    /**
     * Menampilkan data karyawan.
     */
    public function datakaryawan(Manager $admins){
        $admins = Manager::all()->where('level', 'Manager');
        return view('manager.layouts.datakaryawan', [
            "title" => "Data Karyawan", 'admins' => $admins,
        ]);
        // $managers = Manager::all();
        // return view('manager.layouts.datakaryawan', [
        //     "title" => "Data Karyawan", 'admins' => $managers,
        // ]);
    }

     /**
     * Data Cuti Karyawan.
     */
    public function datacuti(){
        return view('manager.layouts.datacutikaryawan', [
            "title" => "Data Cuti Karyawan"
        ]);
    }

    /**
     * Data Cuti Karyawan.
     */
    public function laporancuti(){
        return view('manager.layouts.laporancuti', [
            "title" => "Data Laporan Cuti Karyawan"
        ]);
    }

}
