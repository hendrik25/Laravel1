<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class KabagController extends Controller
{
   /**
     * Dashboard.
     */
    public function index(){
        return view('kabag.index', [
            "title" => "Dashboard",
        ]);
    }

    /**
     * Profil Karyawan.
     */
    public function profil(){
        return view('kabag.layouts.profil', [
            "title" => "Profil Karyawan"
        ]);
    }

    /**
     * Update Password User.
     */
    public function updateuser3(Request $request){
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

