@extends('kabag.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Vertifikasi Pengajuan Cuti Karyawan</h1>
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
                                    <th>Jumlah Cuti</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
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
                                        <td >{{ $p->jumlah_cuti }}</td>
                                        <td >{{ $p->keterangan }}</td>
                                        <td >
                                            @if($p->approval_kabag == 'Pending' && $p->approval_manager == 'Pending' && $p->vertifikasi_admin == 'Pending')
                                                <span class="text-warning"><i class="fas fa-clock"></i></span> |
                                                <span class="text-warning"><i class="fas fa-clock"></i></span> |
                                                <span class="text-warning"><i class="fas fa-clock"></i></span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/kabag/vertifikasidetail3/{{ $p->id }}" data-toggle="tooltip" data-placement="bottom" title="Detail Vertifikasi">
                                                <button type="submit" class="btn btn-warning" name="detail" value="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="/kabag/approved/{{ $p->id }}" data-toggle="tooltip" data-placement="bottom" title="Approved">
                                                <button type="submit" class="btn btn-success" name="approved" value="Approved">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </a>
                                            <a href="/kabag/rejected/{{ $p->id }}" data-toggle="tooltip" data-placement="bottom" title="Rejected">
                                                <button type="submit" class="btn btn-danger" name="rejected" value="Rejected">
                                                    <i class="fas fa-times"></i>
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
