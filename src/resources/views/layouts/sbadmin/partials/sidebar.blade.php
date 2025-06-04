  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Conteúdo
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Páginas</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="{{ route('admin.paginas.index') }}">Páginas</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Menus:</h6>
            <a class="collapse-item" href="{{ route('admin.menu.index') }}">Menu</a>
            <a class="collapse-item" href="{{ route('admin.menu.create') }}">Novo Menu</a>
        </div>
</li>

<!-- Nav Item - News Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews"
        aria-expanded="true" aria-controls="collapseNews">
        <i class="fas fa-fw fa-folder"></i>
        <span>Notícias</span>
    </a>
    <div id="collapseNews" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Notícias:</h6>
            <a class="collapse-item" href="{{ route('admin.noticias.index') }}">Notícias</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Categorias:</h6>
            <a class="collapse-item" href="{{ route('admin.categorias.index') }}">Categorias</a>
            <a class="collapse-item" href="{{ route('admin.categorias.create') }}">Nova Categoria</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.slider.index') }}">
        <i class="fas fa-fw fa-share"></i>
        <span>Slider</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.editais.index') }}">
        <i class="fas fa-fw fa-archive"></i>
        <span>Editais</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.usuarios.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Usuários</span></a>
</li>




<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->