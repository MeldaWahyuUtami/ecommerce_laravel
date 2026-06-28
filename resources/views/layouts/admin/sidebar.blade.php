<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <!-- BRAND -->
        <div class="sidebar-brand">
            <a href="#">Teknik Informatika | RPL</a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">RPL</a>
        </div>

        <!-- MENU -->
        <ul class="sidebar-menu">

            <li class="menu-header">Menu</li>

            <!-- DASHBOARD -->
            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- PRODUK -->
            <li class="{{ Route::is('admin.product*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.product') }}">
                    <i class="fas fa-box"></i>
                    <span>Produk</span>
                </a>
            </li>

            <!-- DISTRIBUTOR -->
            <li class="{{ Route::is('admin.distributor*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.distributor') }}">
                    <i class="fas fa-truck"></i>
                    <span>Distributor</span>
                </a>
            </li>

            <!-- RIWAYAT PEMBELIAN (FIX FULL HISTORY SYSTEM) -->
            <li class="{{ Route::is('admin.history*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.history') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Riwayat Pembelian</span>
                </a>
            </li>

        </ul>

    </aside>
</div>