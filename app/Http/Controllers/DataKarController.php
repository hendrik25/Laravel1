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

class DataKarController extends Controller
{
    /**
     * Menampilkan data karyawan.
     */
    public function karyawandata(Admin $admins){
        $admins  = DB::table('admins')
                    ->whereIn('jabatan', ['Manager', 'Kepala Bagian', 'Operator'])
                    ->get();

        // $admins = DB::select('SELECT * FROM admins WHERE jabatan IN ("Admin", "Manager")');
        return view('admin.layouts.karyawandata', [
            "title" => "Data Karyawan", 'admins' => $admins,
        ])->with('count', $admins);
    }
    public function karyawandata2(Admin $admins){
        $admins  = DB::table('admins')
                    ->whereIn('jabatan', ['Kepala Bagian', 'Operator'])
                    ->get();

        // $admins = DB::select('SELECT * FROM admins WHERE jabatan IN ("Admin", "Manager")');
        return view('manager.layouts.karyawandata', [
            "title" => "Data Karyawan", 'admins' => $admins,
        ])->with('count', $admins);
    }
    /**
     * Menampilkan form tambah karyawan.
     */
    public function karyawantambah(){
        return view('admin.layouts.karyawantambah', [
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
            return redirect('/admin/karyawandata')->with('success', 'Berhasil Menambahkan Data Karyawan');
    }

    /**
     * Menampilkan Form edit karyawan.
     */
    public function edit($nik){
        $admins = DB::table('admins')->where('nik',$nik)->get();
        return view('admin.layouts.karyawanedit', [
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

        return redirect('/admin/karyawandata')->with('success', 'Berhasil Merubah Data Karyawan');
    }

    /**
     * Detail Data Karyawan.
     */
    public function detail($nik){
        $admins = DB::table('admins')->where('nik',$nik)->get();
        return view('admin.layouts.karyawandetail', [
            "title" => "Detail Data Karyawan", 'admins' => $admins,
        ]);
    }
    public function detail2($nik){
        $admins = DB::table('admins')->where('nik',$nik)->get();
        return view('manager.layouts.karyawandetail', [
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
            return redirect('/admin/karyawandata')->with('success', 'Berhasil Menghapus Data Karyawan');
            // return redirect('/admin/datakaryawan')->with('gagal', 'Berhasil Menghapus data karyawan');
    }
}
