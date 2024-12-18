<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try { ace.settings.loadState('sidebar') } catch (e) { }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <a class="btn btn-danger" href="{{ route('login') }}">
                <i class="ace-icon fa fa-sign-out"></i>
            </a>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div>

    <ul class="nav nav-list">
        <li class="{{ Route::is('sna.dashboard') ? 'active' : '' }}">
            <a href="{{ route('sna.dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        <li
            class="dropdown {{ Route::is('instansi.index', 'jenis_alat.index', 'jenis_instansi.index', 'kategori_alat.index') ? 'active open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Master </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="{{ Route::is('instansi.index') ? 'active' : '' }}">
                    <a href="{{ route('instansi.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Instansi
                    </a>
                </li>
                <li class="{{ Route::is('jenis_alat.index') ? 'active' : '' }}">
                    <a href="{{ route('jenis_alat.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Jenis Alat
                    </a>
                </li>
                <li class="{{ Route::is('jenis_instansi.index') ? 'active' : '' }}">
                    <a href="{{ route('jenis_instansi.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Jenis Instansi
                    </a>
                </li>
                <li class="{{ Route::is('kategori_alat.index') ? 'active' : '' }}">
                    <a href="{{ route('kategori_alat.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Kategori Alat
                    </a>
                </li>
                <li class="{{ Route::is('tambah_user.index') ? 'active' : '' }}">
                    <a href="{{ route('tambah_user.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah User
                    </a>
                </li>
            </ul>
        </li>


        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Tables </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <ul class="submenu">
                <li><a href="#"><i class="menu-icon fa fa-caret-right"></i> Simple &amp; Dynamic</a></li>
                <li><a href="#"><i class="menu-icon fa fa-caret-right"></i> jqGrid plugin</a></li>
            </ul>
        </li>
    </ul>

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
            data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>