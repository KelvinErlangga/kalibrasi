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

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div>

    <ul class="nav nav-list">
        <li class="active">
            <a href="{{ route('home') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Master </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <ul class="submenu">
                <li><a href="#"><i class="menu-icon fa fa-caret-right"></i> Instansi</a></li>
                <li><a href="#"><i class="menu-icon fa fa-caret-right"></i> Jenis Alat</a></li>
                <li><a href="#"><i class="menu-icon fa fa-caret-right"></i> Jenis Instansi</a></li>
                <li><a href="#"><i class="menu-icon fa fa-caret-right"></i> Kategori Alat</a></li>
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
           data-icon1="ace-icon fa fa-angle-double-left"
           data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
