@extends('admin.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Data Karyawan</h1>
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
                        @foreach ( $data_cutis as $p )
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
                                            <td><label class="col-form-label">JENIS KELAMIN</label></td>
                                            <td>
                                                <input type="text" name="jenis_kelamin" class="form-control" value="{{ $p->jenis_kelamin }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">NO HP</label></td>
                                            <td width="350px"><input type="text" name="no_hp" class="form-control" value="{{ $p->no_hp }}" readonly>
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
                                            <td width="350px"><input type="text" name="bagian" class="form-control" value="{{ $p->bagian }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">TANGGAL MASUK</label></td>
                                            <td width="350px"><input type="date" name="tgl_masuk" class="form-control" value="{{ $p->tgl_masuk }}" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td><label class="col-form-label">NAMA CUTI</label></td>
                                            <td width="350px"><input type="text" name="nama_cuti" class="form-control" value="{{ $p->nama_cuti }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">PERIODE CUTI</label></td>
                                            <td width="350px"><input type="text" name="periode" class="form-control" value="{{ $p->periode }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">HAK CUTI</label></td>
                                            <td>
                                                <input type="text" name="hak_cuti" class="form-control" value="{{ $p->hak_cuti }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">CUTI DIAMBIL</label></td>
                                            <td>
                                                <input type="text" name="cuti_diambil" class="form-control" value="{{ $p->cuti_diambil }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">SISA CUTI</label></td>
                                            <td><input type="text" name="sisa_cuti" class="form-control" value="{{ $p->sisa_cuti }}" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-warning" name="batal" value="BATAL" onclick="window.location.href='/admin/cutidata'">
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

