<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\DataCuti;
use App\Models\Vertifikasi;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

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
     * Menampilkan Laporan Cuti Karyawan.
     */
    public function laporancuti(){
        $vertifikasis= DB::select('SELECT * FROM vertifikasis RIGHT JOIN admins ON admins.nik=vertifikasis.nik
							RIGHT JOIN cutis ON cutis.id=vertifikasis.id
                            RIGHT JOIN data_cutis ON data_cutis.id_cuti=vertifikasis.id_cuti
                            WHERE vertifikasis.nik=admins.nik;');
        return view('admin.layouts.laporancuti', [
            "title" => "Data Laporan Cuti Karyawan", 'vertifikasis' => $vertifikasis,
        ]);
    }
    public function laporandetail(){
        $vertifikasis= DB::select('SELECT * FROM vertifikasis RIGHT JOIN admins ON admins.nik=vertifikasis.nik
							RIGHT JOIN cutis ON cutis.id=vertifikasis.id
                            RIGHT JOIN data_cutis ON data_cutis.id_cuti=vertifikasis.id_cuti
                            WHERE vertifikasis.nik=admins.nik');
        return view('admin.layouts.laporandetail', [
            "title" => "Data Laporan Cuti Karyawan", 'vertifikasis' => $vertifikasis,
        ]);
    }
    public function laporanprint($id_vertif){
        $vertifikasis = DB::table('vertifikasis')
                        ->rightjoin('admins', 'admins.nik', '=', 'vertifikasis.nik')
                        ->rightjoin('cutis', 'cutis.id' ,'=', 'vertifikasis.id')
                        ->rightjoin('data_cutis', 'data_cutis.id_cuti', '=', 'vertifikasis.id_cuti')
                        ->where('vertifikasis.id_vertif', $id_vertif)
                        ->get();
        // $vertifikasis = Vertifikasi::findOrFail($id_vertif);

        return view('admin.layouts.laporanprint', [
            "title" => "Print Laporan", 'vertifikasis' => $vertifikasis,
        ]);
    }

    /**
     * Menampilkan Profil Karyawan.
     */
    public function profil(){
        $nik = auth()->user()->nik;
        $admins  = DB::table('admins')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('admin.layouts.profil', [
            "title" => "Profile", 'admins' => $admins,
        ]);
    }
    public function profiledit($nik){
        $admins  = DB::table('admins')
                    ->where('admins.nik', $nik)
                    ->get();
        return view('admin.layouts.profiledit', [
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

        return redirect('/admin/profil')->with('success', 'Berhasil Merubah Data Profile');
    }

    /**
     * Menampilkan Kelola User.
     */
    public function user(){
        $users = DB::table('users')
                    ->rightjoin('admins', 'admins.nik', '=', 'users.nik')
                    ->whereIn('admins.jabatan', ['Manager','Kepala Bagian', 'Operator'])
                    ->get();

        return view('admin.layouts.user', [
            "title" => "Kelola User", 'users' => $users,
        ]);
    }

    /**
     * tambah user.
     */
    public function regist(Request $request, $nik) {
        // cek apakah password dan password confirm sama
        if ($request->password !== $request->password2) {
            return redirect()->back()->with('error', 'Password dan konfirmasi password tidak sama');
        } else if (empty($request->username) || empty($request->password)) {
            return redirect()->back()->with('error', 'Username dan password harus diisi');
        } else if ($request->level == "-"){
            return redirect()->back()->with('error', 'Mohon diisikan hak aksesnya...!');
        }
        else {
            // validasi input
            $request->validate([
                'nik'       => 'required',
                'username'  => 'required',
                'password'  => 'required',
                'password2' => 'required',
                'level'     => 'required',
            ]);

            // simpan data ke dalam database
            User::create([
                'nik'       => $nik,
                'username'  => $request->username,
                'password'  => bcrypt($request->password),
                'level'     => $request->level,
            ]);

            // redirect ke halaman sebelumnya
            return redirect()->back()->with('success', 'Data Berhasil Di Registrasi');
        }
    }

    //edit user
    public function edituser(Request $request, $nik){
        $username = $request->input('username');
        $password = $request->input('password');
        $password2 = $request->input('password2');
        $level = $request->input('jabatan'); // Mengganti 'level' menjadi 'jabatan'

        // cek apakah password lama dan username sudah sesuai
        $user = User::where('nik', $nik)->where('username', $username)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Data user tidak ditemukan.');
        }

        // cek apakah password lama benar
        if (!Hash::check($password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama salah.');
        }

        // cek apakah password baru sesuai dengan konfirmasi password
        if ($password2 !== $request->input('password3')) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak sesuai.');
        }
        // update data user
        $user->level = $level; // Mengganti 'level' menjadi 'jabatan'
        if ($password2) {
            $user->password = Hash::make($password2);
        }
        $user->save();

        return redirect()->back()->with('success', 'Data user berhasil diupdate.');
    }

    /**
     * Hapus user.
     */
    public function destroy($nik){
        $user = User::select('*')
            ->where('nik', $nik)
            ->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }

    /**
     * Update Password User.
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
