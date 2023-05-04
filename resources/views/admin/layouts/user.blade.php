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
                                    <th>Level</th>
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
                                        <td >{{ substr($p->password, 0, 0) . str_repeat('*', 6) }}</td>
                                        <td >{{ $p->level }}</td>
                                        <td>
                                            <a href="/" data-toggle="tooltip" data-placement="bottom" title="Registrasi User">
                                                <button type="submit" class="btn btn-primary" name="regist" value="Regist">
                                                    <i class="fas fa-registered"></i>
                                                </button>
                                            </a>
                                            <a href="/" data-toggle="tooltip" data-placement="bottom" title="Edit User">
                                                <button type="submit" class="btn btn-warning" name="update" value="Update">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="/" data-toggle="tooltip" data-placement="bottom" title="Delete User">
                                                <button type="submit" class="btn btn-danger" name="delete" value="Delete">
                                                    <i class="fas fa-trash"></i>
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
