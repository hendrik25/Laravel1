<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\DataCuti;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
     * Profil Karyawan.
     */
    public function profil(){
        return view('admin.layouts.profil', [
            "title" => "Profil Karyawan"
        ]);
    }

    /**
     * Verifikasi Cuti Karyawan.
     */
    public function vertifikasi(){
        return view('admin.layouts.vertifikasi', [
            "title" => "Data Vertifikasi Cuti Karyawan"
        ]);
    }

    /**
     * Riwayat Verifikasi Cuti Karyawan.
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
     * Menampilkan form tambah karyawan.
     */
    public function tambahkaryawan(){
        return view('admin.layouts.tambahkaryawan', [
            "title" => "Tambah Data Karyawan"
        ]);
    }
    /**
     * Proses menambah data karyawan.
     */
    public function tambahdata(Request $request){
        $this->validate($request,[
            'nik'           => 'required|numeric|digits_between:1,50|unique:admins,nik',
            'name'          => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'agama'         => 'required',
            'jenis_kelamin' => 'required',
            'no_hp'         => 'required',
            'email'         => 'required',
            'alamat'        => 'required',
            'jabatan'       => 'required',
            'bagian'        => 'required',
            'tgl_masuk'     => 'required',
        ]);

            $admins = DB::table('admins')->insert([
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

            return redirect('/admin/datakaryawan')->with('sukses', 'Berhasil menambahkan data karyawan');


        // $request->validate([
        //     'nik' => 'required|numeric|digits_between:1,50|unique:admins,nik',
        //     'name' => 'required',
        //     'tempat_lahir'  => 'required',
        //     'tgl_lahir'     => 'required',
        //     'email'         => 'required',
        //     'jabatan'       => 'required',
        //     'bagian'        => 'required',
        //     'no_hp'         => 'required',
        // ]);

        // $admins                 = new Admin;
        // $admins->nik            = $request->nik;
        // $admins->name           = $request->name;
        // $admins->tempat_lahir   = $request->tempat_lahir;
        // $admins->tgl_lahir      = $request->tgl_lahir;
        // $admins->email          = $request->email;
        // $admins->jabatan        = $request->jabatan;
        // $admins->bagian         = $request->bagian;
        // $admins->no_hp          = $request->no_hp;

        // if($admins->save()) {
        //     return redirect('/admin/datakaryawan')->with('sukses', 'Berhasil menambahkan data karyawan');
        // } else {
        //     return redirect()->back()->withErrors([
        //         'nik' => 'Mohon Maaf NIK Yang Anda Masukan Sudah Terdaftar, Silahkan Inputkan NIK Terbaru'
        //     ])->onlyInput('nik');
        // }
    }

    /**
     * Menampilkan Form edit karyawan.
     */
    public function edit($nik){
        $admins = DB::table('admins')->where('nik',$nik)->get();
        return view('admin.layouts.editkaryawan', [
            "title" => "Edit Data Karyawan", 'admins' => $admins,
        ]);
    }

    /**
     * Update Data Karyawan.
     */
    public function update(Request $request, $nik){
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

        // $admins->update($request->all());
        return redirect('/admin/datakaryawan')->with('warning', 'Berhasil merubah data karyawan');
    }

    /**
     * Detail Data Karyawan.
     */
    public function detail($nik){
        $admins = DB::table('admins')->where('nik',$nik)->get();
        return view('admin.layouts.detailkaryawan', [
            "title" => "Detail Data Karyawan", 'admins' => $admins,
        ]);
    }

    /**
     * Hapus Data Karyawan.
     */
    public function destroy($nik){
        $admins = Admin::select('*')
            ->where('nik', $nik)
            ->delete();
            return redirect('/admin/datakaryawan')->with('gagal', 'Berhasil Menghapus data karyawan');
    }

     /**
     * Data Cuti Karyawan.
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
                return redirect('/admin/datacuti')->with('gagal', 'Data Cuti Belum Terisi...!!! Silahkan Tambah Data Cuti...');
            }
            else if($row->periode == $now){
                return redirect('/admin/datacuti')->with('gagal', 'Periode Cuti Masih Berlaku...!!! Silahkan Tunggu Periode Selanjutnya Untuk Update Data...');
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
                    return redirect('/admin/datacuti')->with('sukses', 'Data Berhasil DI Update...!!!');
            }
        }
    }



    /**
     * Laporan Cuti Karyawan.
     */
    public function laporancuti(){
        return view('admin.layouts.laporancuti', [
            "title" => "Data Laporan Cuti Karyawan"
        ]);
    }

    /**
     * Kelola User.
     */
    public function user(){
        return view('admin.layouts.user', [
            "title" => "Data User"
        ]);
    }

    public function updateuser(Request $request){
        $request->validate([
            'password' => 'required',
            'password2' => 'required|',
            'password3' => 'required|same:password2',
          ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Password lama tidak sesuai']);
        }
        $user->password = Hash::make($request->password2);
        $user->save();

        Toastr::success('Password berhasil diperbarui.');
        return redirect()->back();
    }

}
