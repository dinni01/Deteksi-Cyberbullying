<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
<a href="" class="brand-link">
    <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion
      ="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('datasets.index') }}" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>Dataset</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/model') }}" class="nav-link">
            <i class="nav-icon fas fa-project-diagram"></i>
            <p>Model</p>
          </a>
        </li>
        <li class="nav-item">
          <a href=""  class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Admin</p>
          </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('riwayatdeteksi.index') }}" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Riwayat</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
