<nav class="main-sidebar ps-menu">
    {{-- <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div> --}}
    <div class="sidebar-header" id="wrapper">
            <img src="{{ asset('assets/images/pln.png') }}" alt="">
            <div class="text" style="font-size: 100%" >PLTG SAMBERA</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ request()->segment(1) == '' ? 'active' : '' }}">
                <a href="/" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">Master Laporan</span>
            </li>
            <li class="{{ request()->segment(1) == 'laporan' ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-book"></i>
                    <span>Daily Logsheet</span>
                </a>
                <ul class="sub-menu {{ request()->segment(1) == 'laporan' ? 'expand' : '' }}">
                    <li class="{{ request()->segment(2) == 'logsheet-hmitm1' ? 'active' : '' }}"><a href="{{ route('logsheet-hmitm1.index') }}" class="link"><span>Logsheets hmi tm#1</span></a></li>
                    <li class="{{ request()->segment(2) == 'logsheet-hmitm2' ? 'active' : '' }}"><a href="{{ route('logsheet-hmitm1.index') }}" class="link"><span>Logsheets hmi tm#2</span></a></li>
                    <li class="{{ request()->segment(2) == 'patrol-check' ? 'active' : '' }}"><a href="{{ route('patrol-check.index') }}" class="link"><span>Logsheets Patrol Check</span></a></li>
                </ul>
            </li>
            <li class="{{ request()->segment(1) == 'checklist-mesin' ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-book"></i>
                    <span>Checklist Mesin</span>
                </a>
                <ul class="sub-menu {{ request()->segment(1) == 'checklist-mesin' ? 'expand' : '' }}">
                    <li class="{{ request()->segment(2) == 'start' ? 'active' : '' }}"><a href="{{ route('start.index') }}" class="link"><span>Sebelum Start Mesin</span></a></li>
                    <li class="{{ request()->segment(2) == 'stop' ? 'active' : '' }}"><a href="{{ route('stop.index') }}" class="link"><span>Setelah Stop Mesin</span></a></li>
                </ul>
            </li>
            <li class="{{ request()->segment(1) == 'berita-acara' ? 'active' : '' }}">
                <a href="{{ route('berita-acara.index') }}">
                    <i class="ti-files"></i>
                    <span>Berita Acara</span>
                </a>
            </li>
            @can('read document')
            <li class="menu-category">
                <span class="text-uppercase">Management</span>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-files"></i>
                    <span>Document</span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ request()->segment(2) == 'penyulang-pembangkit' ? 'active' : '' }}"><a href="{{ route('penyulang-pembangkit.index') }}" class="link"><span>Penyulang dan Pembangkit</span></a></li>
                    <li class="{{ request()->segment(2) == 'bsd' ? 'active' : '' }}"><a href="{{ route('bsd.index') }}" class="link"><span>Black Start Diesel</span></a></li>
                    <li class="{{ request()->segment(2) == 'firepump' ? 'active' : '' }}"><a href="{{ route('firepump.index') }}" class="link"><span>Fire Pump</span></a></li>
                </ul>
            </li>
            @endcan
            @can('read roles')
            <li class="menu-category">
                <span class="text-uppercase">Management Pegawai</span>
            </li>
            <li class="{{ request()->segment(1) == 'pegawai' ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-user"></i>
                    <span>Pegawai</span>
                </a>
                <ul class="sub-menu {{ request()->segment(1) == 'pegawai' ? 'expand' : '' }}">
                    <li class="{{ request()->segment(2) == 'roles' ? 'active' : '' }}"><a href="{{ route('roles.index') }}" class="link"><span>Role Pegawai</span></a></li>
                    <li class="{{ request()->segment(2) == 'permissions' ? 'active' : '' }}"><a href="{{ route('permissions.index') }}" class="link"><span>Permissions Pegawai</span></a></li>
                    <li class="{{ request()->segment(2) == 'data' ? 'active' : '' }}"><a href="{{ route('data.index') }}" class="link"><span>Data Pegawai</span></a></li>
                </ul>
            </li>
            @endcan
            @can('read master')
            <li class="menu-category">
                <span class="text-uppercase">Master Data</span>
            </li>
            <li class="{{ request()->segment(1) == 'master' ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-settings"></i>
                    <span>Master</span>
                </a>
                <ul class="sub-menu {{ request()->segment(1) == 'master' ? 'expand' : '' }}">
                    <li class="{{ request()->segment(2) == 'shift' ? 'active' : '' }}"><a href="{{ route('shift.index') }}" class="link"><span>Shift</span></a></li>
                    <li class="{{ request()->segment(2) == 'jenis-logsheet' ? 'active' : '' }}"><a href="{{ route('jenis-logsheet.index') }}" class="link"><span>Jenis Logsheet</span></a></li>
                    <li class="{{ request()->segment(2) == 'parameter-logsheet' ? 'active' : '' }}"><a href="{{ route('parameter-logsheet.index') }}" class="link"><span>Parameter Logsheet</span></a></li>
                </ul>
            </li>
            @endcan
        </ul>
    </div>
</nav>
