@extends('manager.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Karyawan</h1>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    {{-- <th>ID</th> --}}
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    {{-- <th>Jenis Kelamin</th> --}}
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th>Bagian</th>
                                    <th>No HP</th>
                                    {{-- <th>Agama</th> --}}
                                    {{-- <th>Tanggal Masuk</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                {{-- @foreach($pegawais as $p) --}}
                                @foreach ( $karyawans as $p )
                                    <tr>
                                        <td scope="row">{{ $no++ }}</td>
                                        <td >{{ $p->nik }}</td>
                                        <td >{{ $p->name }}</td>
                                        <td >{{ $p->tempat_lahir }}</td>
                                        <td >{{ $p->tgl_lahir }}</td>
                                        <td >{{ $p->email }}</td>
                                        <td >{{ $p->level }}</td>
                                        <td >{{ $p->bagian }}</td>
                                        <td >{{ $p->no_hp }}</td>

                                        <td>
                                            <a href="/admin/edit/{{ $p->nik }}" onclick="return confirm('Apakah Anda Ingin Merubah Data...?')">
                                                <button type="submit" class="btn btn-primary" name="edit" value="EDIT">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <a href="/admin/delete/{{ $p->nik }}" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data...?')">
                                                <button type="button" class="btn btn-danger" name="delete" value="DELETE"><i class="fas fa-trash"></i>
                                                </button>
                                            </a>
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
@endsection
