                <!-- Brand Logo -->
                <a href="/manager" class="brand-link">
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
                                <a href="/manager" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link">
                                    <i class="nav-icon fas fa-bell"></i>
                                    <p>Vertifikasi<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/manager/vertifikasi" class="nav-link">
                                            <i class="far fa-edit nav-icon"></i>
                                            <p>Vertifikasi Cuti</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/manager/riwayat" class="nav-link">
                                            <i class="far fa-list-alt nav-icon"></i>
                                            <p>Riwayat Vertifikasi</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/manager/datakaryawan" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Data Karyawan</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/manager/datacuti" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>Data Cuti Karyawan</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/manager/laporan" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Laporan Cuti Karyawan</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->