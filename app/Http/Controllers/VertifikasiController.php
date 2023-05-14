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
    // ADMIN
    // Menampilkan Verifikasi Cuti Karyawan.
    public function vertifikasi(){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'cutis.nik')
                    ->where('cutis.vertifikasi_admin', 'Pending')
                    ->where('cutis.approval_manager', 'Approved')
                    ->where('cutis.approval_kabag', 'Approved')
                    ->get();
        return view('admin.layouts.vertifikasi', [
            "title" => "Vertifikasi Cuti Karyawan", 'cutis' => $cutis,
        ]);
    }
    //menu vertifikasi
    public function vertifikasidetail($id){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('cutis.id', $id)
                    ->get();

        return view('admin.layouts.vertifikasidetail', [
            "title" => "Detail Cuti Karyawan", 'cutis' => $cutis
        ]);
    }
    // vertifikasi cuti approved
    public function approved(Request $request, $id){
        $approval = 'Approved';

        // Update data vertifikasi di table cuti
        DB::table('cutis')->where('id', $request->id)->update([
            'vertifikasi_admin' => $approval,
        ]);

        // Gabungkan tabel cutis dengan data_cutis, dan ambil data
        $cuti = DB::table('cutis')
            ->join('data_cutis', 'cutis.nik', '=', 'data_cutis.nik')
            ->select('cutis.*', 'data_cutis.*')
            ->where('cutis.id', $request->id)
            ->first();

        $hak = $cuti->hak_cuti;
        $jumlah_cuti = $cuti->jumlah_cuti;
        $sisa = $cuti->sisa_cuti;
        $total = $hak - $jumlah_cuti;

        // Update data cuti
        DB::table('data_cutis')->where('nik', $cuti->nik)->update([
            'hak_cuti'      => $hak,
            'cuti_diambil'  => $jumlah_cuti,
            'sisa_cuti'     => $total,
        ]);

        return redirect()->back()->with('success', 'Berhasil Approved Cuti. Silahkan Lihat Riwayat Vertifikasi');
    }

    // vertifikasi cuti rejected
    public function rejected(Request $request, $id){
        $approval1 = 'Rejected';
        // update data vertifikasi
	    DB::table('cutis')->where('id',$request->id)->update([
            'vertifikasi_admin'     =>$approval1,
        ]);
        return redirect()->back()->with('warning', 'Anda Telah Melakukan Rejected Cuti Silahkan Lihat Riwayat Vertifikasi');
    }
    //riwayat
    public function riwayat(){
        $cutis = DB::table('cutis')
                ->rightjoin('admins', 'admins.nik', '=', 'cutis.nik')
                ->whereIn('cutis.vertifikasi_admin', ['Approved', 'Rejected'])
                ->where('cutis.approval_manager', 'Approved')
                ->where('cutis.approval_kabag', 'Approved')
                ->get();
        return view('admin.layouts.riwayat', [
            "title" => "Riwayat Cuti Karyawan", 'cutis' => $cutis
        ]);
    }
    //riwayat detail
    public function riwayatdetail($id){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('cutis.id', $id)
                    ->get();
        return view('admin.layouts.riwayatdetail', [
            "title" => "Detail Riwayat", 'cutis' => $cutis
        ]);
    }

    // MANAGER
    public function vertifikasi2(){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'cutis.nik')
                    ->where('cutis.approval_manager', 'Pending')
                    ->where('cutis.approval_kabag', 'Approved')
                    ->get();
        return view('manager.layouts.vertifikasi', [
            "title" => "Vertifikasi Cuti Karyawan", 'cutis' => $cutis,
        ]);
    }
    public function vertifikasidetail2($id){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('cutis.id', $id)
                    ->get();

        return view('manager.layouts.vertifikasidetail', [
            "title" => "Detail Cuti Karyawan", 'cutis' => $cutis
        ]);
    }
    // vertifikasi cuti approved
    public function approved2(Request $request, $id){
        $approval = 'Approved';
        // update data vertifikasi
	    DB::table('cutis')->where('id',$request->id)->update([
            'approval_manager'    =>$approval,
        ]);
        return redirect()->back()->with('success', 'Berhasil Approved Cuti Silahkan Lihat Riwayat Vertifikasi');
    }
    // vertifikasi cuti rejected
    public function rejected2(Request $request, $id){
        $approval2 = 'Rejected';
        $approval1 = 'Rejected';
        // update data vertifikasi
	    DB::table('cutis')->where('id',$request->id)->update([
            'approval_manager'      =>$approval2,
            'vertifikasi_admin'     =>$approval1,
        ]);
        return redirect()->back()->with('warning', 'Anda Telah Melakukan Rejected Cuti Silahkan Lihat Riwayat Vertifikasi');
    }
    // riwayat
    public function riwayat2(){
        $cutis = DB::table('cutis')
                ->rightjoin('admins', 'admins.nik', '=', 'cutis.nik')
                ->whereIn('cutis.approval_manager', ['Approved', 'Rejected'])
                ->where('cutis.approval_kabag', 'Approved')
                ->get();
        return view('manager.layouts.riwayat', [
            "title" => "Riwayat Cuti Karyawan", 'cutis' => $cutis
        ]);
    }
    // riwayat detail
    public function riwayatdetail2($id){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('cutis.id', $id)
                    ->get();
        return view('manager.layouts.riwayatdetail', [
            "title" => "Detail Riwayat", 'cutis' => $cutis
        ]);
    }

    // KABAG
    //Menampilkan menu data vertifikasi
    public function vertifikasi3(){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'cutis.nik')
                    ->where('cutis.approval_kabag', 'Pending')
                    ->get();

        return view('kabag.layouts.vertifikasi', [
            "title" => "Vertifikasi Cuti Karyawan", 'cutis' => $cutis,
        ]);
    }
    // menampilkan detail vertifikasi
    public function vertifikasidetail3($id){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('cutis.id', $id)
                    ->get();

        return view('kabag.layouts.vertifikasidetail', [
            "title" => "Detail Cuti Karyawan", 'cutis' => $cutis
        ]);
    }
    // vertifikasi cuti approved
    public function approved3(Request $request, $id){
        $approval = 'Approved';
        // update data vertifikasi
	    DB::table('cutis')->where('id',$request->id)->update([
            'approval_kabag'           =>$approval,
        ]);
        return redirect()->back()->with('success', 'Berhasil Approved Cuti Silahkan Lihat Riwayat Vertifikasi');
    }
    // vertifikasi cuti rejected
    public function rejected3(Request $request, $id){
        $approval3 = 'Rejected';
        $approval2 = 'Rejected';
        $approval1 = 'Rejected';
        // update data vertifikasi
	    DB::table('cutis')->where('id',$request->id)->update([
            'approval_kabag'        =>$approval3,
            'approval_manager'      =>$approval2,
            'vertifikasi_admin'     =>$approval1,
        ]);
        return redirect()->back()->with('warning', 'Anda Telah Melakukan Rejected Cuti Silahkan Lihat Riwayat Vertifikasi');
    }
    // riwayat
    public function riwayat3(){
        $cutis = DB::table('cutis')
                ->rightjoin('admins', 'admins.nik', '=', 'cutis.nik')
                ->whereIn('cutis.approval_kabag', ['Approved', 'Rejected'])
                ->get();
        return view('kabag.layouts.riwayat', [
            "title" => "Riwayat Cuti Karyawan", 'cutis' => $cutis
        ]);
    }
    // riwayat detail
    public function riwayatdetail3($id){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('cutis.id', $id)
                    ->get();
        return view('kabag.layouts.riwayatdetail', [
            "title" => "Detail Riwayat", 'cutis' => $cutis
        ]);
    }

    // OPERATOR
    // riwayat
    public function riwayat4(){
        $nik = auth()->user()->nik;
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('cutis.nik', $nik)
                    ->get();
        return view('operator.layouts.riwayat', [
            "title" => "Riwayat Cuti Karyawan", 'cutis' => $cutis
        ]);
    }
    // detail riwayat
    public function riwayatdetail4($id){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('cutis.id', $id)
                    ->get();
        return view('operator.layouts.riwayatdetail', [
            "title" => "Detail Riwayat", 'cutis' => $cutis
        ]);
    }
    // edit riwayat
    public function riwayatedit4($id){
        $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'cutis.nik', '=', 'admins.nik')
                    ->where('cutis.id', $id)
                    ->get();
        return view('operator.layouts.riwayatedit', [
            "title" => "Edit Riwayat", 'cutis' => $cutis
        ]);
    }
    //riwayat update
    public function riwayatupdate(Request $request, $id){
        // validasi input
        $request->validate([
            'tgl_awal'      => 'required|date',
            'tgl_akhir'     => 'required|date',
            'keterangan'    => 'nullable|string|max:255',
        ]);
         // hitung selisih hari antara tgl_awal dan tgl_akhir
        $tgl_awal       = Carbon::parse($request->tgl_awal);
        $tgl_akhir      = Carbon::parse($request->tgl_akhir);
        $selisih_hari   = $tgl_awal->diffInDays(Carbon::now()); // hitung selisih hari antara tanggal sekarang dan tanggal awal cuti
        $jumlah_cuti    = $tgl_awal->diffInDays($tgl_akhir) + 1; // hitung jumlah cuti dari tanggal awal dan tanggal akhir

        // cek selisih hari
        if ($selisih_hari < 7) {
            return redirect()->back()->with('error', 'Pengajuan cuti harus diajukan minimal 7 hari sebelum tanggal awal cuti.');
        }
        else{
            //database
            DB::table('cutis')->where('id',$request->id)->update([
                'jumlah_cuti'           =>$jumlah_cuti,
                'tgl_awal'              =>$request->tgl_awal,
                'tgl_akhir'             =>$request->tgl_akhir,
                'keterangan'            =>$request->keterangan,
            ]);
            return redirect('/operator/riwayat')->with('success', 'Berhasil Merubah Data Riwayat Pengajuan Cuti');
        }
    }
    // hapus riwayat
    public function riwayathapus4($id){
        $cutis = DB::table('cutis')
                    ->where('id', $id)
                    ->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Karyawan');
    }
}
