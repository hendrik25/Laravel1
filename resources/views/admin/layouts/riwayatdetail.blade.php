@extends('admin.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Riwayat Cuti Karyawan</h1>
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
                                            <td>
                                                <input type="text" name="jabatan" class="form-control" value="{{ $p->jabatan }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">BAGIAN</label></td>
                                            <td>
                                                <input type="text" name="bagian" class="form-control" value="{{ $p->bagian }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">TANGGAL PENGAJUAN</label></td>
                                            <td><input type="date" name="tgl_pengajuan" class="form-control" value="{{ $p->tgl_pengajuan }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">NAMA CUTI</label></td>
                                            <td>
                                                <input type="text" name="nama_cuti" class="form-control" value="{{ $p->nama_cuti }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">JUMLAH CUTI</label></td>
                                            <td>
                                                <input type="text" name="jumlah_cuti" class="form-control" value="{{ $p->jumlah_cuti }}" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td><label class="col-form-label">TANGGAL AWAL CUTI</label></td>
                                            <td width="350px"><input type="date" name="tgl_awal" class="form-control" value="{{ $p->tgl_awal }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">TANGGAL AKHIR CUTI</label></td>
                                            <td width="350px"><input type="date" name="tgl_akhir" class="form-control" value="{{ $p->tgl_akhir }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">KETERANGAN</label></td>
                                            <td><textarea name="keterangan" class="form-control" rows="3" value="{{ $p->keterangan }}" readonly>{{ $p->keterangan }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">APP KABAG</label></td>
                                            <td><input type="text" name="approval_kabag" class="form-control" value="{{ $p->approval_kabag }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">APP MANAGER</label></td>
                                            <td><input type="text" name="approval_manager" class="form-control" value="{{ $p->approval_manager }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">VERTIFIKASI ADMIN</label></td>
                                            <td><input type="text" name="vertifikasi_admin" class="form-control" value="{{ $p->vertifikasi_admin }}" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-warning" name="batal" value="BATAL" onclick="window.location.href='/admin/riwayat'">
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

