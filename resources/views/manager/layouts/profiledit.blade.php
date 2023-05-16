@extends('manager.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Profile</h1>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                {{-- <div class="card-body"> --}}
                <div class="card-header">
                    @foreach ( $admins as $p )
                        <form method="POST" action="/manager/editprofil/{nik}">
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
                                            <td><input type="text" name="name" class="form-control" value="{{ $p->name }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">TEMPAT LAHIR</label></td>
                                            <td><input type="text" name="tempat_lahir" class="form-control" value="{{ $p->tempat_lahir }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">TANGGAL LAHIR</label></td>
                                            <td><input type="date" name="tgl_lahir" class="form-control" value="{{ $p->tgl_lahir }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">AGAMA</label></td>
                                            <td>
                                                <select name="agama" class="form-control">
                                                    <option {{old('agama',$p->agama)=="Islam"? 'selected':''}}  value="Islam">Islam</option>
                                                    <option {{old('agama',$p->agama)=="Kristen"? 'selected':''}} value="Kristen">Kristen</option>
                                                    <option {{old('agama',$p->agama)=="Khatolik"? 'selected':''}}  value="Khatolik">Khatolik</option>
                                                    <option {{old('agama',$p->agama)=="Hindu"? 'selected':''}} value="Hindu">Hindu</option>
                                                    <option {{old('agama',$p->agama)=="Buddha"? 'selected':''}}  value="Buddha">Buddha</option>
                                                    <option {{old('agama',$p->agama)=="Konghucu"? 'selected':''}} value="Konghucu">Konghucu</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">JENIS KELAMIN</label></td>
                                            <td>
                                                <select name="jenis_kelamin" class="form-control">
                                                    <option {{old('jenis_kelamin',$p->jenis_kelamin)=="Laki-Laki"? 'selected':''}} value="Laki-Laki">Laki-Laki</option>
                                                    <option {{old('jenis_kelamin',$p->jenis_kelamin)=="Perempuan"? 'selected':''}} value="Perempuan">Perempuan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">NO HP</label></td>
                                            <td width="350px"><input type="text" name="no_hp" class="form-control" value="{{ $p->no_hp }}">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td><label class="col-form-label">EMAIL</label></td>
                                            <td width="350px"><input type="email" name="email" class="form-control" value="{{ $p->email }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">ALAMAT</label></td>
                                            <td><textarea name="alamat" class="form-control" rows="5" value="{{ $p->alamat }}">{{ $p->alamat }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">JABATAN</label></td>
                                            <td>
                                                <select name="jabatan" class="form-control">
                                                    <option {{old('jabatan',$p->jabatan)=="Operator"? 'selected':''}} value="Operator">Operator</option>
                                                    <option {{old('jabatan',$p->jabatan)=="Kepala Bagian"? 'selected':''}} value="Kepala Bagian">Kepala Bagian</option>
                                                    <option {{old('jabatan',$p->jabatan)=="Manager"? 'selected':''}} value="Manager">Manager</option>
                                                    <option {{old('jabatan',$p->jabatan)=="Admin"? 'selected':''}} value="Admin">Admin</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">BAGIAN</label></td>
                                            <td>
                                                <select name="bagian" class="form-control">
                                                    <option {{old('bagian',$p->bagian)=="Development"? 'selected':''}} value="Development">Development</option>
                                                    <option {{old('bagian',$p->bagian)=="Plant C"? 'selected':''}} value="Plant C">Plant C</option>
                                                    <option {{old('bagian',$p->bagian)=="Plant D"? 'selected':''}} value="Plant D">Plant D</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="col-form-label">TANGGAL MASUK</label></td>
                                            <td><input type="date" name="tgl_masuk" class="form-control" value="{{ $p->tgl_masuk }}">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table width="auto" border="0" cellpadding="5">
                                        <tr>
                                            <td>
                                                <button type="submit" class="btn btn-primary" name="update" value="UPDATE">
                                                    <i class="fas fa-save"></i> UPDATE
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" name="batal" value="BATAL" onclick="window.location.href='/manager/profil'">
                                                    <i class="fas fa-ban"></i> CENCEL
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </section>
    <!-- /.main content -->
@endsection

