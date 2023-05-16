@extends('manager.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Laporan Cuti Karyawan</h1>
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
                                    <th>No HP</th>
                                    <th>Hak Cuti</th>
                                    <th>Cuti Diambil</th>
                                    <th>Sisa Cuti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                {{-- @foreach($pegawais as $p) --}}
                                @foreach ( $vertifikasis as $p )
                                    <tr>
                                        <td scope="row">{{ $no++ }}</td>
                                        <td >{{ $p->nik }}</td>
                                        <td >{{ $p->name }}</td>
                                        <td >{{ $p->jabatan }}</td>
                                        <td >{{ $p->bagian }}</td>
                                        <td >{{ $p->no_hp }}</td>
                                        <td >{{ $p->hak_cuti }}</td>
                                        <td >{{ $p->cuti_diambil }}</td>
                                        <td >{{ $p->sisa_cuti }}</td>
                                        <td>
                                            <a href="/manager/laporandetail/{{ $p->id_vertif }}" data-toggle="tooltip" data-placement="bottom" title="Detail">
                                                <button type="submit" class="btn btn-warning" name="detail" value="DETAIL">
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
