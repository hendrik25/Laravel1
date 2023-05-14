@extends('operator.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pengajuan Cuti Karyawan</h1>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content-header -->
                @php
                    use App\Models\User;
                    use App\Models\Admin;
                    use Carbon\Carbon;
                    // Mendapatkan data user yang sedang login
                    $user = User::find(Auth::id());

                    // Join database user dengan data-karyawan menggunakan relasi
                    $admins2 = Admin::where('nik', $user->nik)->first();
                    $now = Carbon::now()->format('d-m-Y');
                @endphp
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/operator/pengajuanproses">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <table width="auto" border="0" cellpadding="5">
                                    <tr>
                                        <td><label class="col-form-label">NIK</label></td>
                                        <td width="350px"><input type="text" name="nik" class="form-control" value="{{ $admins2->nik }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">NAMA LENGKAP</label></td>
                                        <td><input type="text" name="name" class="form-control" value="{{ $admins2->name }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">JABATAN</label></td>
                                        <td><input type="text" name="jabatan" class="form-control" value="{{ $admins2->jabatan }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">BAGIAN</label></td>
                                        <td><input type="text" name="bagian" class="form-control" value="{{ $admins2->bagian }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">NO HP</label></td>
                                        <td width="350px"><input type="text" name="no_hp" class="form-control" value="{{ $admins2->no_hp }}" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table width="auto" border="0" cellpadding="5">
                                    <tr>
                                        <td><label class="col-form-label">TANGGAL PENGAJUAN</label></td>
                                        <td width="350px"><input type="text" name="tgl_pengajuan" class="form-control" value=" {{ $now }} " readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">NAMA CUTI</label></td>
                                        <td><input type="text" name="nama_cuti" class="form-control" value="Cuti Tahunan" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">TANGGAL AWAL CUTI</label></td>
                                        <td><input type="date" name="tgl_awal" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">TANGGAL AKHIR CUTI</label></td>
                                        <td><input type="date" name="tgl_akhir" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">KETERANGAN</label></td>
                                        <td><textarea name="keterangan" rows="3" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table width="auto" border="0" cellpadding="5">
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-success" name="simpan" value="SIMPAN">
                                                <i class="fas fa-save"></i> SIMPAN
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" name="batal" value="BATAL" onclick="window.location.href='/operator'">
                                                <i class="fas fa-ban"></i> CENCEL
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.main content -->
@endsection
