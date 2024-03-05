<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link align-middle" width="922" height="260">
        <div>
            <img src="{{ asset('dist/img/logokalsel.png') }}" alt="AdminLTE Logo Large" class="brand-image elevation" style="opacity: .8;" width="100" height="100">
            <span class="brand-text font-bold-light" style="display: block; font-size: 24px;">BAWASLU </span>
        </div>

    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/logokalsel.png') }}" class="img-circle elevation" alt="User Image">

            </div>
            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">Pengadaan</a>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-boxes"></i>
                        <p>
                            HOME
                        </p>
                    </a>
                </li>

                <li class="nav-header">MASTER</li>
                <li class="nav-item menu-open">
                    <a href="{{ route('barang.index') }}" class="nav-link {{ request()->routeIs('barang.index') ? 'active' : '' }}">
                        <i class="fas fa-boxes"></i>
                        <p>
                            BARANG
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}">
                        <i class="fas fa-tags"></i>
                        <p>
                            KATEGORI
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('divisi.index') }}" class="nav-link {{ request()->routeIs('divisi.index') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p>
                            SUB DIVISI
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('supplier.index') }}" class="nav-link {{ request()->routeIs('supplier.index') ? 'active' : '' }}">
                        <i class="fas fa-truck"></i>
                        <p>
                            SUPPLIER
                        </p>
                    </a>
                </li>

                <li class="nav-header">TRANSACTION</li>

                <li class="nav-item menu-open">
                    <a href="{{ route('pengajuan.index') }}" class="nav-link {{ request()->routeIs('pengajuan.index') ? 'active' : '' }}">
                        <i class="fas fa-clipboard-list"></i>

                        <p>
                            PENGADAAN
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('pembatalan.index') }}" class="nav-link {{ request()->routeIs('pembatalan.index') ? 'active' : '' }}">
                        <i class="fas fa-times-circle"></i>
                        <p>
                            PEMBATALAN
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('pembelian.index') }}" class="nav-link {{ request()->routeIs('pembelian.index') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart"></i>
                        <p>
                            PEMBELIAN
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('penerimaan.index') }}" class="nav-link {{ request()->routeIs('penerimaan.index') ? 'active' : '' }}">
                        <i class="fas fa-check-circle"></i>
                        <p>
                            PENERIMAAN
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
