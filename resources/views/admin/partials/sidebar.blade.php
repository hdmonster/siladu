<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-message"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SILADU</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
    <a class="nav-link" href="/admin">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Halaman
  </div>

  <!-- Nav Item - Laporan Aduan -->
  <li class="nav-item {{ Request::is('admin/reports') ? 'active' : ''}}">
    <a class="nav-link" href="/admin/reports">
      <i class="fas fa-fw fa-inbox"></i>
      <span>Laporan Aduan</span></a>
  </li>


  <!-- Nav Item - Galeri -->
  <li class="nav-item {{ Request::is('admin/galleries') ? 'active' : ''}}">
    <a class="nav-link collapsed" href="/admin/galleries" data-toggle="collapse" data-target="#collapseGallery"
      aria-expanded="true" aria-controls="collapseGallery">
      <i class="fas fa-fw fa-image"></i>
      <span>Galeri</span>
    </a>
    <div id="collapseGallery" class="collapse {{ Request::is('admin/galleries*') ? 'show' : ''}}"
      aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Action:</h6>
        <a class="collapse-item" href="#" data-toggle="modal" data-target="#uploadGaleriModal">
          Upload Galeri
        </a>
        <a class="collapse-item {{ Request::is('admin/galleries') ? 'active' : ''}}" href="/admin/galleries">
          Lihat semua
        </a>
      </div>
    </div>
  </li>



  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  @if(auth()->user()->role == 'superadmin')

  <!-- Heading -->
  <div class="sidebar-heading">
    Akun
  </div>

  <!-- Nav Item - Galeri -->
  <li class="nav-item {{ Request::is('admin/users') ? 'active' : ''}}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true"
      aria-controls="collapseAdmin">
      <i class="fas fa-fw fa-user"></i>
      <span>Admin</span>
    </a>
    <div id="collapseAdmin" class="collapse {{ Request::is('admin/users*') ? 'show' : '' }}"
      aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Action:</h6>
        <a class="collapse-item" href="#" data-toggle="modal" data-target="#addUserModal">
          Tambah admin
        </a>
        <a class="collapse-item {{ Request::is('admin/users') ? 'active' : '' }}" href="/admin/users">
          Lihat semua
        </a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  @endif

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Modals -->
@include('admin.components.add-user-modal')

@include('admin.components.upload-galeri-modal')
@include('admin.components.update-galeri-modal')