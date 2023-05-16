                <!-- Brand Logo -->
                <a href="/operator" class="brand-link">
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
                                <a href="/operator" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/operator/pengajuancuti" class="nav-link">
                                    <i class="nav-icon fas fa-newspaper"></i>
                                    <p>Pengajuan Cuti</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link">
                                    <i class="nav-icon fas fa-bell"></i>
                                    <p>Riwayat Cuti<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item has-treeview">
                                        <a href="/operator/riwayatpending" class="nav-link">
                                            <i class="nav-icon fas fa-clock"></i>
                                            <p>Pending</p>
                                        </a>
                                    </li>
                                    <li class="nav-item has-treeview">
                                        <a href="/operator/riwayatapproved" class="nav-link">
                                            <i class="nav-icon fas fa-check"></i>
                                            <p>Approved</p>
                                        </a>
                                    </li>
                                    <li class="nav-item has-treeview">
                                        <a href="/operator/riwayatrejected" class="nav-link">
                                            <i class="nav-icon fas fa-times"></i>
                                            <p>Rejected</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="/operator/cutidata4" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>Data Cuti</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
