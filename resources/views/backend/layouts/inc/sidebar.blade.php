<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Yönetici Paneli</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
       İçerik Yöneticisi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-eye"></i>
            <span>Projeler</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Proje İşlemleri:</h6>
                <a class="collapse-item" href="{{ route('project.index') }}">Tüm Projeler</a>
                <a class="collapse-item" href="{{ route('project.create') }}">Yeni Proje Olustur</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-inbox"></i>
            <span>Öz Geçmiş işlemleri</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Öz Geçmiş</h6>
                <a class="collapse-item" href="{{ route('resume.index') }}">Tüm Öz geçmiş</a>
                <a class="collapse-item" href="{{ route('resume.create') }}">Yeni Öz geçmiş ekle</a>

            </div>
        </div>
    </li>

    <!-- Heading -->
    @role('Admin')
    <div class="sidebar-heading">
       Sayfa Yönetimi
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sayfalar</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sayfalar</h6>
                <a class="collapse-item" href="{{ route('admin.contact') }}">İletisim</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kullanici.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Kullanıcılar</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.config.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Ayarlar</span></a>
    </li>
    @endrole()




</ul>
<!-- End of Sidebar -->
