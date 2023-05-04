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

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dashboard.
     */
    public function index(){
        $admins = Admin::all();
        return view('admin.index', [
            "title" => "Dashboard", 'admins' => $admins
        ]);
    }

    /**
     * Menampilkan Verifikasi Cuti Karyawan.
     */
    public function vertifikasi(){
        return view('admin.layouts.vertifikasi', [
            "title" => "Data Vertifikasi Cuti Karyawan"
        ]);
    }

    /**
     * Menampilkan Riwayat Verifikasi Cuti Karyawan.
     */
    public function riwayat(){
        return view('admin.layouts.riwayatvertifikasi', [
            "title" => "Data Riwayat Cuti Karyawan"
        ]);
    }

    /**
     * Menampilkan data karyawan.
     */
    public function datakaryawan(Admin $admins){
        $admins  = DB::table('admins')
                    ->whereIn('jabatan', ['Admin','Manager'])
                    ->get();

        // $admins = DB::select('SELECT * FROM admins WHERE jabatan IN ("Admin", "Manager")');
        return view('admin.layouts.datakaryawan', [
            "title" => "Data Karyawan", 'admins' => $admins,
        ])->with('count', $admins);
    }

    /**
     * Menampilkan Data Cuti Karyawan.
     */
    public function datacuti(){
        // $data_cutis = DB::select('SELECT * FROM data_cutis RIGHT JOIN admins
        //                 on admins.nik=data_cutis.nik WHERE admins.jabatan');
        $data_cutis = DB::table('data_cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'data_cutis.nik')
                    ->whereIn('admins.jabatan', ['Admin','Manager'])
                    ->get();

        return view('admin.layouts.datacutikaryawan', [
            "title" => "Data Cuti Karyawan", 'data_cutis' => $data_cutis,
        ]);
    }

    /**
     * Menampilkan Laporan Cuti Karyawan.
     */
    public function laporancuti(){
        return view('admin.layouts.laporancuti', [
            "title" => "Data Laporan Cuti Karyawan"
        ]);
    }

    /**
     * Menampilkan Kelola User.
     */
    public function user(){
        $users = DB::table('users')
                    ->rightjoin('admins', 'admins.nik', '=', 'users.nik')
                    ->whereIn('admins.jabatan', ['Admin','Manager'])
                    ->get();

        return view('admin.layouts.user', [
            "title" => "Kelola User", 'users' => $users,
        ]);
    }

    /**
     * Menampilkan Profil Karyawan.
     */
    public function profil(){
        return view('admin.layouts.profil', [
            "title" => "Profil Karyawan"
        ]);
    }

    /**
     * tambah user.
     */
    public function tambahuser(Request $request){
        $request->validate([
            'password'  => 'required',
            'password2' => 'required',
            'password3' => 'required',
          ]);

        $user = Auth::user();
        // Password lama tidak sesuai dengan yang ada di database
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password Lama Salah!');
        }
        // cek apakah password baru sesuai dengan password konfirmasi
        else if ($request->password2 != $request->password3) {
            return redirect()->back()->with('error', 'Password Baru Tidak Sesuai Dengan Konfirmasi Password!');
        }
        // cek apakah password lama sesuai dengan yang ada di database
        else if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->password2);
            $user->save();

            // Simpan data dan redirect back
            return redirect()->back()->with('success', 'Password Berhasil Di Ubah!');
        }
    }
    /**
     * Update User.
     */
    public function updateuser(Request $request){
        $request->validate([
            'password'  => 'required',
            'password2' => 'required',
            'password3' => 'required',
          ]);

        $user = Auth::user();
        // Password lama tidak sesuai dengan yang ada di database
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password Lama Salah!');
        }
        // cek apakah password baru sesuai dengan password konfirmasi
        else if ($request->password2 != $request->password3) {
            return redirect()->back()->with('error', 'Password Baru Tidak Sesuai Dengan Konfirmasi Password!');
        }
        // cek apakah password lama sesuai dengan yang ada di database
        else if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->password2);
            $user->save();

            // Simpan data dan redirect back
            return redirect()->back()->with('success', 'Password Berhasil Di Ubah!');
        }
    }
}
