<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
        <div class="sidebar-brand-text mx-3">Prambanan <sup>Rental</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->is('dashboard-admin*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider my-0">

    @if (auth()->user()->email == 'superadmin@admin.com')
        <li class="nav-item {{ request()->is('data-admin*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('data-admin.index') }}">
                <i class="fas fa-fw fa-folder"></i>
                <span>Data Admin</span>
            </a>
        </li>
    @endif

    <hr class="sidebar-divider my-3">
    <div class="sidebar-heading pb-2">
        Data Kendaraan
    </div>

    <li class="nav-item {{ request()->is('merk*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('merk.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Merk</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('kendaraan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kendaraan.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kendaraan</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('harga-sewa*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('harga-sewa.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Harga Sewa</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('supir*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('supir.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Supir</span>
        </a>
    </li>

    <hr class="sidebar-divider my-3">
    <div class="sidebar-heading pb-2">
        Data Pelanggan
    </div>

    <li class="nav-item {{ request()->is('pelanggan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pelanggan.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pelanggan</span>
        </a>
    </li>
    
    <hr class="sidebar-divider my-3">
    <div class="sidebar-heading pb-2">
        Data Transaksi
    </div>

    <li class="nav-item {{ request()->is('peminjaman*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('peminjaman.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Peminjaman</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('pengembalian*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pengembalian.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengembalian</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('laporan-transaksi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan-transaksi.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan Transaksi</span>
        </a>
    </li>
    
    <hr class="sidebar-divider my-3">
    <div class="sidebar-heading pb-2">
        Data Paket Wisata
    </div>

    <li class="nav-item {{ request()->is('data-paket-wisata*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data-paket-wisata.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Paket Wisata</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('transaksi/paket-wisata*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('transaksi-paket-wisata.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Transaksi</span>
        </a>
    </li>

</ul>