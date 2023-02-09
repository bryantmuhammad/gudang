<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard.index') }}">Kayla Sport</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard.index') }}">KSP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="fas fa-futbol"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="menu-header">Data Master</li>
            <li
                class="nav-item dropdown {{ in_array(request()->segment(2), ['user', 'kategori', 'toko', 'supplier', 'produk']) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-table-tennis"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard/user*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.user.index') }}">Admin</a>
                    </li>
                    <li class="{{ Request::is('dashboard/kategori*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.kategori.index') }}">Kategori</a>
                    </li>
                    <li class="{{ Request::is('dashboard/supplier*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.supplier.index') }}">Supplier</a>
                    </li>
                    <li class="{{ Request::is('dashboard/toko*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.toko.index') }}">Toko</a>
                    </li>
                    <li class="{{ Request::is('dashboard/produk*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.produk.index') }}">Produk</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Barang Masuk</li>
            <li class="nav-item dropdown {{ in_array(request()->segment(2), ['barangmasuk']) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-football-ball"></i>
                    <span>Barang Masuk</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard/barangmasuk*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.barangmasuk.index') }}">Barang Masuk</a>
                    </li>

                </ul>
            </li>


            <li class="menu-header">Barang Keluar</li>
            <li class="nav-item dropdown {{ in_array(request()->segment(2), ['barangkeluar']) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-basketball-ball"></i>
                    <span>Barang Keluar</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard/barangkeluar*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.barangkeluar.index') }}">Barang Keluar</a>
                    </li>

                </ul>
            </li>

            <li class="menu-header">Laporan</li>
            <li
                class="nav-item dropdown {{ in_array(request()->segment(3), ['barangkeluar','barangmasuk', 'produk']) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-bullhorn"></i>
                    <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard/laporan/produk') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.laporan.produk') }}">Laporan Produk</a>
                    </li>
                    <li class="{{ Request::is('dashboard/laporan/barangmasuk') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.laporan.barangmasuk') }}">Laporan Barang Masuk</a>
                    </li>
                    <li class="{{ Request::is('dashboard/laporan/barangkeluar') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.laporan.barangkeluar') }}">Laporan Barang
                            Keluar</a>
                    </li>
                </ul>
            </li>

            @can('crud_admin')

            @endcan




        </ul>


    </aside>
</div>