<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <p>Navigation</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../index.html">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <p>Mater Data</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-buffer menu-icon"></i>
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Data
                            Akun</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('staff.all') }}">Data
                            Staff</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Data
                            Penduduk</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Data
                            Barang</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item sidebar-category">
            <p>Apps</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-arsip" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title">Arsip Surat</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-arsip">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Surat
                            Masuk</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Surat
                            Keluar</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
                <i class="mdi mdi-file-pdf menu-icon"></i>
                <span class="menu-title">Pembuatan Surat</span>
            </a>
        </li>
    </ul>
</nav>
