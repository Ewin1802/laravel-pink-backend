<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Pink Manajemen</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PINK</a>
        </div>
        <ul class="sidebar-menu">

            {{-- <li class="nav-item dropdown">
                <li class="nav-item {{ Request::is('user*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="fas fa-fire"></i><span>Pengguna</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="fas fa-fire"></i><span>Kategori</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('produ*') ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="fas fa-fire"></i><span>Produk</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('discounts*') ? 'active' : '' }}">
                    <a href="{{ route('discounts.index') }}" class="nav-link">
                        <i class="fas fa-fire"></i><span>Diskon</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('orde*') ? 'active' : '' }}">
                    <a href="{{ route('order_reports.index') }}" class="nav-link">
                        <i class="fas fa-fire"></i><span>Laporan Fulus</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('top*') ? 'active' : '' }}">
                    <a href="{{ route('top.products') }}" class="nav-link">
                        <i class="fas fa-fire"></i><span>Laporan Produk</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('invent*') ? 'active' : '' }}">
                    <a href="{{ route('inventories.index') }}" class="nav-link">
                        <i class="fas fa-fire"></i><span>Inventory</span>
                    </a>
                </li>
            </li> --}}

            <li class="nav-item dropdown {{ Request::is('users*', 'categories*', 'products*', 'discounts*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-pencil-alt"></i>
                    <span>Input</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('users*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users.index') }}">Pengguna</a>
                    </li>
                    <li class="{{ Request::is('categories*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.index') }}">Kategori</a>
                    </li>
                    <li class="{{ Request::is('products*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
                    </li>
                    <li class="{{ Request::is('discounts*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('discounts.index') }}">Diskon</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('bahan*','inventories*','inventory_out*',) ? 'active' : '' }}">

                <a href="javascript:void(0);" class="nav-link has-dropdown">
                    <i class="fas fa-tasks"></i>
                    <span>Persediaan</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('bahan*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('bahans.index') }}">Nama Bahan</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('inventories*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('inventories.index') }}">Persediaan Masuk</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('inventory_out*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('inventory_out.index') }}">Persediaan Keluar</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item {{ Request::is('orde*') ? 'active' : '' }}">
                <a href="{{ route('order_reports.index') }}" class="nav-link">
                    <i class="fas fa-fire"></i><span>Laporan Order</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('top*') ? 'active' : '' }}">
                <a href="{{ route('top.products') }}" class="nav-link">
                    <i class="fas fa-fire"></i><span>Laporan Produk</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('inventory-reports*') ? 'active' : '' }}">
                <a href="{{ route('inventory.reports') }}" class="nav-link">
                    <i class="fas fa-fire"></i><span>Laporan Persediaan</span>
                </a>
            </li>
            


            <li class="nav-item {{ Request::is('laporan-keuangan*') ? 'active' : '' }}">
                <a href="{{ route('financial.report') }}" class="nav-link">
                    <i class="fas fa-chart-line"></i> <span>Analisa Keuangan</span>
                </a>
            </li>


</div>
