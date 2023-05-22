<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use App\Models\Cuti;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
    /**
     * Dashboard.
     */
    public function index(){
        return view('operator.index', [
            "title" => "Dashboard",
        ]);
    }

    /**
     * Pengajuan cuti.
     */
    public function pengajuan(){
        return view('operator.layouts.pengajuancuti', [
            "title" => "Pengajuan Cuti Karyawan"
        ]);
    }

    /**
     * Pengajuan proses cuti.
     */
    public function pengajuanproses(Request $request){
        // validasi input
        $request->validate([
            'tgl_awal' => 'required|date|after_or_equal:today',
            'tgl_akhir' => 'required|date|after_or_equal:tgl_awal',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // hitung selisih hari antara tgl_awal dan tgl_akhir
        $tanggal        = Carbon::parse($request->tgl_pengajuan)->format('Y-m-d');
        $tgl_awal       = Carbon::parse($request->tgl_awal);
        $tgl_akhir      = Carbon::parse($request->tgl_akhir);
        $selisih_hari   = $tgl_awal->diffInDays($tanggal); // hitung selisih hari antara tanggal pengajuan dan tanggal awal cuti
        $jumlah_cuti    = $tgl_awal->diffInDays($tgl_akhir) + 1; // hitung jumlah cuti dari tanggal awal dan tanggal akhir

        // cek selisih hari
        if ($selisih_hari < 7) {
            return redirect()->back()->with('error', 'Pengajuan cuti harus diajukan minimal 7 hari sebelum tanggal awal cuti.');
        } else {
            // simpan data ke database
            $pengajuan                          = new Cuti();
            $pengajuan->nik                     = $request->nik;
            $pengajuan->tgl_pengajuan           = $tanggal;
            $pengajuan->nama_cuti               = $request->nama_cuti;
            $pengajuan->jumlah_cuti             = $jumlah_cuti; // simpan jumlah cuti ke dalam database
            $pengajuan->tgl_awal                = $request->tgl_awal;
            $pengajuan->tgl_akhir               = $request->tgl_akhir;
            $pengajuan->keterangan              = $request->keterangan;
            $pengajuan->approval_kabag          = 'Pending';
            $pengajuan->approval_manager        = 'Pending';
            $pengajuan->vertifikasi_admin       = 'Pending';
            $pengajuan->save();

            // redirect ke halaman operator
            return redirect()->route('operator')->with('success', 'Pengajuan cuti berhasil disimpan.');
        }
    }


     /**
     * Profil Karyawan.
     */
    public function profil(){
        $nik = auth()->user()->nik;
        $admins  = DB::table('admins')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('operator.layouts.profil', [
            "title" => "Profile", 'admins' => $admins,
        ]);
    }
    public function profiledit($nik){
        $admins  = DB::table('admins')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('operator.layouts.profiledit', [
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

        return redirect('/operator/profil')->with('success', 'Berhasil Merubah Data Profile');
    }

    /**
     * Update Password User.
     */
    public function updateuser4(Request $request){
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
