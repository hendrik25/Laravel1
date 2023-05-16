                <!-- Brand Logo -->
                <a href="/admin" class="brand-link">
                    <img src="{{ asset('/') }}dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light"> Welcome </span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="/admin" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/vertifikasi" class="nav-link">
                                    <i class="far fa-edit nav-icon"></i>
                                    <p>Vertifikasi Cuti</p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview">
                                <a class="nav-link">
                                    <i class="nav-icon fas fa-bell"></i>
                                    <p>Riwayat Vertifikasi<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/admin/riwayatapproved" class="nav-link">
                                            <i class="nav-icon fas fa-check"></i>
                                            <p>Approved</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/riwayatrejected" class="nav-link">
                                            <i class="nav-icon fas fa-times"></i>
                                            <p>Rejected</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="/admin/karyawandata" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Data Karyawan</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/cutidata" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>Data Cuti Karyawan</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/laporan" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Laporan Cuti Karyawan</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/user" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Kelola User</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
