@extends('admin.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Cuti Karyawan</h1>
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
                            @if(session()->has('sukses'))
                                <div class="alert alert-success alert-block">
                                <strong>{{ session()->get('sukses') }}</strong>
                                </div>
                            @endif
                            @if(session()->has('warning'))
                                <div class="alert alert-warning alert-block">
                                <strong>{{ session()->get('warning') }}</strong>
                                </div>
                            @endif
                            @if(session()->has('gagal'))
                                <div class="alert alert-danger alert-block">
                                <strong>{{ session()->get('gagal') }}</strong>
                                </div>
                            @endif
                            @if(session()->has('abu'))
                                <div class="alert alert-secondary alert-block">
                                <strong>{{ session()->get('abu') }}</strong>
                                </div>
                            @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Bagian</th>
                                    <th>Nama Cuti</th>
                                    <th>Periode</th>
                                    <th>Hak Cuti</th>
                                    <th>Sisa Cuti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ( $data_cutis as $p )
                                    <tr>
                                        <td scope="row">{{ $no++ }}</td>
                                        <td >{{ $p->nik }}</td>
                                        <td >{{ $p->name }}</td>
                                        <td >{{ $p->jabatan }}</td>
                                        <td >{{ $p->bagian }}</td>
                                        <td >{{ $p->nama_cuti }}</td>
                                        <td >{{ $p->periode }}</td>
                                        <td >{{ $p->hak_cuti }}</td>
                                        <td >{{ $p->sisa_cuti }}</td>

                                        <td>
                                            <a href="/admin/detailcuti/{{ $p->nik }}" data-toggle="tooltip" data-placement="bottom" title="Detail Data Cuti">
                                                <button type="submit" class="btn btn-warning" name="detail" value="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="/admin/tambahcuti/{{ $p->nik }}" data-toggle="tooltip" data-placement="bottom" title="Tambah Data Cuti">
                                                <button type="submit" class="btn btn-success" name="tambah" value="TAMBAH">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </a>
                                            <a href="/admin/updatecuti/{{ $p->nik }}" data-toggle="tooltip" data-placement="bottom" title="Update Data Cuti">
                                                <button type="submit" class="btn btn-primary" name="update" value="UPDATE">
                                                    <i class="fas fa-edit"></i>
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
