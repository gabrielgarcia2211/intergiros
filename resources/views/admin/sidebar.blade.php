<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">INTERRAPPI<sup> 1.0</sup></div>
    </a>

    <hr class="sidebar-divider my-0">
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="dx-icon-home dx-icon-custom-style"></i>
            <span>Inicio</span></a>
           
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.tasas') }}">
            <i class="dx-icon-menu dx-icon-custom-style"></i>
            <span>Tasas</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>