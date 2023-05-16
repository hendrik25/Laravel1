@extends('admin.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
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
                        @foreach ( $admins as $p )
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
                                            <td><label class="col-form-label">TEMPAT LAHIR</label></td>
                                            <td><input type="text" name="tempat_lahir" class="form-control" value="{{ $p->tempat_lahir }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">TANGGAL LAHIR</label></td>
                                            <td><input type="date" name="tgl_lahir" class="form-control" value="{{ $p->tgl_lahir }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">AGAMA</label></td>
                                            <td>
                                                <input type="text" name="agama" class="form-control" value="{{ $p->agama }}" readonly>
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
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td><label class="col-form-label">EMAIL</label></td>
                                            <td width="350px"><input type="email" name="email" class="form-control" value="{{ $p->email }}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">ALAMAT</label></td>
                                            <td><textarea name="alamat" class="form-control" rows="5" value="{{ $p->alamat }}" readonly>{{ $p->alamat }}</textarea>
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
                                            <td><label class="col-form-label">TANGGAL MASUK</label></td>
                                            <td><input type="date" name="tgl_masuk" class="form-control" value="{{ $p->tgl_masuk }}" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td>
                                                <a href="/admin/profiledit/{{ $p->nik }}" onclick="event.preventDefault(); confirmEdit(this.href);">
                                                    <button type="submit" class="btn btn-primary" name="edit" value="EDIT">
                                                        <i class="fas fa-edit">EDIT</i>
                                                    </button>
                                                </a>
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
