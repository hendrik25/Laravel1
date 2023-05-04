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
            return redirect('/admin/datakaryawan')->with('success', 'Berhasil Menambahkan Data Karyawan');
            // return redirect('/admin/datakaryawan')->with('sukses', 'Berhasil menambahkan data karyawan');
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

        return redirect('/admin/datakaryawan')->with('success', 'Berhasil Merubah Data Karyawan');
        // return redirect('/admin/datakaryawan')->with('warning', 'Berhasil merubah data karyawan');
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
            return redirect('/admin/datakaryawan')->with('success', 'Berhasil Menghapus Data Karyawan');
            // return redirect('/admin/datakaryawan')->with('gagal', 'Berhasil Menghapus data karyawan');
    }
}
