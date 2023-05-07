@extends('admin.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Data Cuti Karyawan</h1>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="card-header"> --}}
                        @foreach ( $cutis as $p )
                        <form method="POST" action="">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td><label class="col-form-label">NIK</label></td>
                                            <td width="350px"><input type="text" name="nik" class="form-control" value="{{ $p->nik }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">NAMA LENGKAP</label></td>
                                            <td><input type="text" name="name" class="form-control" value="{{ $p->name }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">JABATAN</label></td>
                                            <td><input type="text" name="jabatan" class="form-control" value="{{ $p->jabatan }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">BAGIAN</label></td>
                                            <td><input type="text" name="bagian" class="form-control" value="{{ $p->bagian }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">JUMLAH CUTI</label></td>
                                            <td><input type="text" name="jumlah_cuti" class="form-control" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">PENGAJUAN</label></td>
                                            <td><input type="date" name="tgl_pengajuan" class="form-control" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td><label class="col-form-label">AWAL CUTI</label></td>
                                            <td><input type="date" name="tgl_awal" class="form-control" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">AKHIR CUTI</label></td>
                                            <td><input type="date" name="tgl_akhir" class="form-control" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">KETERANGAN</label></td>
                                            <td width="350px"><input type="text" name="keterangan" class="form-control" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">APP. KABAG</label></td>
                                            <td><input type="text" name="approval_kabag" class="form-control" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">APP. MANAGER</label></td>
                                            <td>
                                                <input type="text" name="approval_manager" class="form-control" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">VERTIFIKASI ADMIN</label></td>
                                            <td>
                                                <input type="text" name="vertifikasi_admin" class="form-control" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-warning" name="batal" value="BATAL" onclick="window.location.href='/admin/vertifikasi'">
                                                    <i class="fas fa-ban"></i> BACK
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- /.main content -->
@endsection

