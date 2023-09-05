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
    <div class="sidebar-header">
        <div class="text">PS</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ request()->segment(1) == 'home' ? 'active' : '' }}">
                <a href="/home" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">Master Document</span>
            </li>
            <li class="{{ request()->segment(1) == 'laporan' ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-book"></i>
                    <span>Laporan</span>
                </a>
                <ul class="sub-menu {{ request()->segment(1) == 'laporan' ? 'expand' : '' }}">
                    <li class="{{ request()->segment(2) == 'logsheet' ? 'active' : '' }}"><a href="{{ route('logsheet.index') }}" class="link"><span>Logsheets</span></a></li>
                    <li class="{{ request()->segment(2) == 'patrol-check' ? 'active' : '' }}"><a href="{{ route('patrol-check.index') }}" class="link"><span>Patrol Check</span></a></li>
                    <li class="{{ request()->segment(2) == 'berita-acara' ? 'active' : '' }}"><a href="{{ route('berita-acara.index') }}" class="link"><span>Berita Acara Shift</span></a></li>
                </ul>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">Management</span>
            </li>
            <li>
                <a href="#" class="main-menu">
                    <i class="ti-files"></i>
                    <span>Document</span>
                </a>
            </li>
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
                </ul>
            </li>
        </ul>
    </div>
</nav>
