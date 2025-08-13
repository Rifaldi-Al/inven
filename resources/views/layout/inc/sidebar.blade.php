<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{ asset('img/sinarmas-removebg-preview.png') }}" alt="" srcset="" style="height: 5vh">
        </div>
        <div class="sidebar-brand-text mx-3">INVENTORI ASET</div>
    </a>


    <hr class="sidebar-divider my-0">


    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <hr class="sidebar-divider">

    {{-- <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Surat
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('bidang.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Bidang</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('jenisbidang.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Jenis Bidang</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('jabatan.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Jabatan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('template_surat.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Template Surat</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>User</span></a>
        </li> -->

        <!-- Nav Item - Pages Collapse Menu -->



        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('surat_masuk.index') }}">
                <i class="fas fa-satellite-dish"></i>
                <span>Monitoring</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('surat_keluar.index') }}">
                <i class="fas fa-boxes-stacked"></i>
                <span>Inventori</span>
            </a>
        </li>
         --}}





    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-envelope-open"></i>
            <span>Surat</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Surat:</h6>
                <a class="collapse-item" href="{{ route('surat_masuk.index') }}">Surat Masuk</a>
                <a class="collapse-item" href="{{ route('surat_keluar.index') }}">Surat Keluar</a>
            </div>
        </div>
    </li> -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMonitoring"
            aria-expanded="true" aria-controls="collapseMonitoring">
            <i class="fas fa-satellite-dish"></i>
            <span>Monitoring</span>
        </a>
        <div id="collapseMonitoring" class="collapse" aria-labelledby="headingMonitoring"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Data Dasar:</h6> --}}
                <a class="collapse-item" href="{{ route('user.index') }}">Monitoring</a>
                <a class="collapse-item" href="{{ route('user.index') }}">Detail Jaringan</a>
                <a class="collapse-item" href="{{ route('inventori.index') }}">Inventori Radio Jaringan</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventori"
            aria-expanded="true" aria-controls="collapseInventori">
            <i class="fas fa-boxes-stacked"></i>
            <span>Inventori</span>
        </a>
        <div id="collapseInventori" class="collapse" aria-labelledby="headingInventori"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Data Dasar:</h6> --}}
                <a class="collapse-item" href="{{ route('pegawai.index') }}">Data Pegawai</a>
                <a class="collapse-item" href="{{ route('aset.index') }}">Inventori Aset Pegawai</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Addons
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Sidebar Toggler (Sidebar) -->
    <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> -->

    <!-- Sidebar Message -->
    <!-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> -->

</ul>
