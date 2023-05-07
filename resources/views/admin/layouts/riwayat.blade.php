@extends('admin.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Riwayat Vertifikasi Cuti Karyawan</h1>
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
                                    <th>Jabatan</th>
                                    <th>Bagian</th>
                                    <th>Nama Cuti</th>
                                    <th>Jumlah Cuti</th>
                                    <th>Awal Cuti</th>
                                    <th>Akhir Cuti</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ( $cutis as $p )
                                    <tr>
                                        <td scope="row">{{ $no++ }}</td>
                                        <td >{{ $p->nik }}</td>
                                        <td >{{ $p->name }}</td>
                                        <td >{{ $p->jabatan }}</td>
                                        <td >{{ $p->bagian }}</td>
                                        <td >{{ $p->nama_cuti }}</td>
                                        <td >{{ $p->jumlah_cuti }}</td>
                                        <td >{{ $p->tgl_awal }}</td>
                                        <td >{{ $p->tgl_akhir }}</td>
                                        <td >{{ $p->keterangan }}</td>
                                        <td>
                                            <a href="/admin/riwayatdetail/{{ $p->nik }}" data-toggle="tooltip" data-placement="bottom" title="Detail Data Cuti">
                                                <button type="submit" class="btn btn-warning" name="detail" value="Detail">
                                                    <i class="fas fa-eye"></i>
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

