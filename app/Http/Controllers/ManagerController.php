<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * Menampilkan Laporan Cuti Karyawan.
     */
    public function laporancuti(){
        $vertifikasis= DB::select('SELECT * FROM vertifikasis RIGHT JOIN admins ON admins.nik=vertifikasis.nik
							RIGHT JOIN cutis ON cutis.id=vertifikasis.id
                            RIGHT JOIN data_cutis ON data_cutis.id_cuti=vertifikasis.id_cuti
                            WHERE vertifikasis.nik=admins.nik;');
        return view('manager.layouts.laporancuti', [
            "title" => "Data Laporan Cuti Karyawan", 'vertifikasis' => $vertifikasis,
        ]);
    }
    public function laporandetail(){
        $vertifikasis= DB::select('SELECT * FROM vertifikasis RIGHT JOIN admins ON admins.nik=vertifikasis.nik
							RIGHT JOIN cutis ON cutis.id=vertifikasis.id
                            RIGHT JOIN data_cutis ON data_cutis.id_cuti=vertifikasis.id_cuti
                            WHERE vertifikasis.nik=admins.nik');
        return view('manager.layouts.laporandetail', [
            "title" => "Data Laporan Cuti Karyawan", 'vertifikasis' => $vertifikasis,
        ]);
    }

    /**
     * Profil Karyawan.
     */
    public function profil(){
        $nik = auth()->user()->nik;
        $admins  = DB::table('admins')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('manager.layouts.profil', [
            "title" => "Profile", 'admins' => $admins,
        ]);
    }
    public function profiledit($nik){
        $admins  = DB::table('admins')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('manager.layouts.profiledit', [
            "title" => "Edit Profile", 'admins' => $admins,
        ]);
    }
    public function editprofil(Request $request, $nik){
        // update data pegawai
	    DB::table('admins')->where('nik',$request->nik)->update([
            'nik'           =>$request->nik,
            'name'          =>$request->name,
            'tempat_lahir'  =>$request->tempat_lahir,
            'tgl_lahir'     =>$request->tgl_lahir,
            'agama'         =>$request->agama,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'no_hp'         =>$request->no_hp,
            'email'         =>$request->email,
            'alamat'        =>$request->alamat,
            'jabatan'       =>$request->jabatan,
            'bagian'        =>$request->bagian,
            'tgl_masuk'     =>$request->tgl_masuk,
        ]);

        return redirect('/manager/profil')->with('success', 'Berhasil Merubah Data Profile');
    }

    /**
     * Update Password User.
     */
    public function updateuser2(Request $request){
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
