@extends('admin.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Riwayat Rejected Cuti Karyawan</h1>
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
                                    {{-- <th>Nama Cuti</th> --}}
                                    <th>Jumlah Cuti</th>
                                    <th>Awal Cuti</th>
                                    <th>Akhir Cuti</th>
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
                                        {{-- <td >{{ $p->nama_cuti }}</td> --}}
                                        <td >{{ $p->jumlah_cuti }}</td>
                                        <td >@php echo date('d-m-Y', strtotime( $p->tgl_awal )) @endphp </td>
                                        <td >@php echo date('d-m-Y', strtotime( $p->tgl_akhir )) @endphp </td>
                                        <td >{{ $p->keterangan }}</td>
                                        <td >
                                            @if($p->approval_kabag == 'Approved' && $p->approval_manager == 'Approved' && $p->vertifikasi_admin == 'Rejected')
                                                <span class="text-success"><i class="fas fa-check"></i></span> |
                                                <span class="text-success"><i class="fas fa-check"></i></span> |
                                                <span class="text-danger"><i class="fas fa-times"></i></span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/riwayatdetail/{{ $p->id }}" data-toggle="tooltip" data-placement="bottom" title="Detail Riwayat Cuti">
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

