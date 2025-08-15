<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

        <!-- Dashboard -->
        <li class="navigation-header">
            <span data-i18n="nav.category.support">Dashboard</span>
            <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Support"></i>
        </li>
        <li class="nav-item {{ Request::RouteIS('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard')}}"><i class="icon-home"></i><span class="menu-title">Dashboard</span></a>
        </li>

        @if(auth()->user()->role == "admin")
            <li class="nav-item">
                <a href="{{ route('pegawai.index') }}"><i class="icon-people"></i><span class="menu-title">Data Pegawai</span></a>
            </li>

            <!-- Kategori Aset -->
            <li class="nav-item">
                <a href="{{ route('kategori.index') }}"><i class="icon-layers"></i><span class="menu-title">Kategori Aset</span></a>
            </li>
            <!-- Manajemen Aset -->
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-briefcase"></i><span class="menu-title">Aset Manajemen</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('aset.index') }}"> Manajemen Hardware</a></li>
                    <li><a class="menu-item" href="{{ route('inventori.index') }}">Manajemen Jaringan</a></li>
                </ul>
            </li>

        @endif
        <!-- Maintenance -->
        <li class="nav-item">
            <a href="{{ route('maintenance.index') }}">
              <i class="icon-wrench"></i> <!-- Ganti ikon di sini -->
                <span class="menu-title">Maintenance</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('inventaris.index') }}">
              <i class="fa-solid fa fa-book"></i>
                <span class="menu-title">Inventaris</span>
            </a>
        </li>

        <!-- Laporan -->
            <li class="nav-item">
                <a href="{{ route('laporan.index') }}">
                    <i class="icon-chart"></i> <!-- Ikon Grafik Garis -->
                    <span class="menu-title">Laporan</span>
                </a>
            </li>

        @if(auth()->user()->role == "admin")
            <li class="nav-item">
                <a href="{{ route('user.index') }}">
                    <i class="icon-user"></i> <!-- Ikon Grafik Garis -->
                    <span class="menu-title">Daftar User</span>
                </a>
            </li>
        @endif
    </ul>
</div>
