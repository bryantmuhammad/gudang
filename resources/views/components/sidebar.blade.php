<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Penjualan</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PJN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard/index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="menu-header">Data Master</li>
            <li
                class="nav-item dropdown {{ in_array(request()->segment(2), ['user', 'kategori', 'toko', 'supplier', 'produk']) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
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
            @can('crud_admin')

            @endcan




        </ul>


    </aside>
</div>