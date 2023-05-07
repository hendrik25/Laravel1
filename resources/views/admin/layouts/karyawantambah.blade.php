@extends('admin.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Data Karyawan</h1>
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
                        <form method="POST" action="/admin/tambahdata">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td><label class="col-form-label">NIK</label></td>
                                            <td width="350px"><input type="text" name="nik" class="form-control
                                                @error('nik') is-invalid @enderror"  value="{{ old('nik') }}" autofocus>
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">NAMA LENGKAP</label></td>
                                            <td><input type="text" name="name" class="form-control
                                                @error('name') is-invalid @enderror"  value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">TEMPAT LAHIR</label></td>
                                            <td><input type="text" name="tempat_lahir" class="form-control
                                                @error('tempat_lahir') is-invalid @enderror"  value="{{ old('tempat_lahir') }}">
                                                @error('tempat_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">TANGGAL LAHIR</label></td>
                                            <td><input type="date" name="tgl_lahir" class="form-control
                                                @error('tgl_lahir') is-invalid @enderror"  value="{{ old('tgl_lahir') }}">
                                                @error('tgl_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">AGAMA</label></td>
                                            <td>
                                                <select name="agama" class="form-control
                                                @error('agama') is-invalid @enderror"  value="{{ old('agama') }}">
                                                @error('agama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                    <option value="-">--- Pilih ---</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Khatolik">Khatolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">JENIS KELAMIN</label></td>
                                            <td>
                                                <select name="jenis_kelamin" class="form-control
                                                @error('jenis_kelamin') is-invalid @enderror"  value="{{ old('jenis_kelamin') }}">
                                                @error('jenis_kelamin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                    <option value="-">--- Pilih ---</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">NO HP</label></td>
                                            <td width="350px"><input type="text" name="no_hp" class="form-control
                                                @error('no_hp') is-invalid @enderror"  value="{{ old('no_hp') }}">
                                                @error('no_hp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td><label class="col-form-label">EMAIL</label></td>
                                            <td width="350px"><input type="email" name="email" class="form-control
                                                @error('email') is-invalid @enderror"  value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">ALAMAT</label></td>
                                            <td><textarea name="alamat" rows="5" class="form-control
                                                @error('alamat') is-invalid @enderror"  value="{{ old('alamat') }}">
                                                @error('alamat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">JABATAN</label></td>
                                            <td>
                                                <select name="jabatan" class="form-control
                                                @error('jabatan') is-invalid @enderror"  value="{{ old('jabatan') }}">
                                                @error('jabatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                    <option value="-">--- Pilih ---</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Kepala Bagian">Kepala Bagian</option>
                                                    <option value="Operator">Operator</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">BAGIAN</label></td>
                                            <td>
                                                <select name="bagian" class="form-control
                                                @error('bagian') is-invalid @enderror"  value="{{ old('bagian') }}">
                                                @error('bagian')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                    <option value="-">--- Pilih ---</option>
                                                    <option value="Development">Development</option>
                                                    <option value="Plant C">Plant C</option>
                                                    <option value="Plant D">Plant D</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">TANGGAL MASUK</label></td>
                                            <td><input type="date" name="tgl_masuk" class="form-control
                                                @error('tgl_masuk') is-invalid @enderror"  value="{{ old('tgl_masuk') }}">
                                                @error('tgl_masuk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td>
                                                <button type="submit" class="btn btn-primary" name="simpan" value="SIMPAN">
                                                    <i class="fas fa-save"></i> SIMPAN
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" name="batal" value="BATAL" onclick="window.location.href='/admin/karyawandata'">
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
