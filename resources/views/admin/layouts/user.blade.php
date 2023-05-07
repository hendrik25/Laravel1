@extends('admin.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kelola Users</h1>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Bagian</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ( $users as $p )
                                    <tr>
                                        <td scope="row">{{ $no++ }}</td>
                                        <td >{{ $p->nik }}</td>
                                        <td >{{ $p->name }}</td>
                                        <td >{{ $p->bagian }}</td>
                                        <td >{{ $p->username }}</td>
                                        <td >
                                            @if (!empty($p->password))
                                                {{ str_repeat('*', 6) }}
                                            @endif
                                        </td>
                                        <td >{{ $p->level }}</td>
                                        <td>
                                            @if(empty($p->username) || empty($p->password))
                                                <a href="#registModal{{ $p->nik }}" data-toggle="modal">
                                                    <button type="submit" class="btn btn-primary" name="regist" value="Regist" data-toggle="tooltip" data-placement="bottom" title="Registrasi User">
                                                        <i class="fas fa-registered"></i>
                                                    </button>
                                                </a>
                                                <a href="" onclick="return false;" disabled>
                                                    <button type="submit" class="btn btn-warning" name="edit" value="Edit" disabled data-toggle="tooltip" data-placement="bottom" title="Edit User">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="" onclick="return false;" disabled>
                                                    <button type="submit" class="btn btn-danger" name="delete" value="Delete" disabled data-toggle="tooltip" data-placement="bottom" title="Delete User">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </a>
                                            @else
                                                <a href="" onclick="return false;" disabled>
                                                    <button type="submit" class="btn btn-primary" name="regist" value="Regist" disabled data-toggle="tooltip" data-placement="bottom" title="Registrasi User">
                                                        <i class="fas fa-registered"></i>
                                                    </button>
                                                </a>
                                                <a href="#editModal{{ $p->nik }}" data-toggle="modal">
                                                    <button type="submit" class="btn btn-warning" name="edit" value="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit User">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="/admin/user-delete{{ $p->nik }}" data-toggle="tooltip" data-placement="bottom" title="Delete User" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
                                                    <button type="submit" class="btn btn-danger" name="delete" value="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </section>
    <!-- /.main content -->

    {{-- Modal Regist--}}
@foreach ( $users as $p )
<div class="modal fade" id="registModal{{ $p->nik }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br><h2 style="text-align: center"> FORM REGISTRASI USER</h2>
            <div class="modal-header"></div>
            <div class="modal-body">
                <form method="post" action="{{ route('regist', $p->nik) }}">
                    @csrf
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-12">
                                <table width="auto" border="0" cellpadding="5">
                                    <tr>
                                        <td width="150px"><label class="col-form-label">NIK</label></td>
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
                                        <td><label class="col-form-label">USERNAME</label></td>
                                        <td><input type="text" name="username" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">PASSWORD</label></td>
                                        <td><input type="password" name="password" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">PASS. CONFIRM</label></td>
                                        <td><input type="password" name="password2" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">HAK AKSES</label></td>
                                        <td>
                                            <select name="level" class="form-control">
                                                <option value="-">- Pilih -</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Kepala Bagian">Kepala Bagian</option>
                                                <option value="Operator">Operator</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Regist</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Edit --}}
@foreach ( $users as $p )
<div class="modal fade" id="editModal{{ $p->nik }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br><h2 style="text-align: center"> FORM EDIT USER</h2>
            <div class="modal-header"></div>
            <div class="modal-body">
                <form method="post" action="{{ route('edit', $p->nik) }}">
                    @csrf
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-12">
                                <table width="auto" border="0" cellpadding="5">
                                    <tr>
                                        <td width="150px"><label class="col-form-label">NIK</label></td>
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
                                        <td><label class="col-form-label">USERNAME</label></td>
                                        <td><input type="text" name="username" class="form-control" value="{{ $p->username }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">PASSWORD LAMA</label></td>
                                        <td><input type="password" name="password" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">PASSWORD BARU</label></td>
                                        <td><input type="password" name="password2" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">PASS. CONFIRM</label></td>
                                        <td><input type="password" name="password3" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">HAK AKSES</label></td>
                                        <td>
                                            <select name="level" class="form-control">
                                                <option {{old('level',$p->level)=="Admin"? 'selected':''}} value="Admin">Admin</option>
                                                <option {{old('level',$p->level)=="Manager"? 'selected':''}} value="Manager">Manager</option>
                                                <option {{old('level',$p->level)=="Kepala Bagian"? 'selected':''}} value="Kepala Bagian">Kepala Bagian</option>
                                                <option {{old('level',$p->level)=="Opertor"? 'selected':''}} value="Opertor">Opertor</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
