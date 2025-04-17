<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url('assets/AdminLTE-3.2.0/dist/img/AdminLTELogo.png'); ?>" alt="SINVENTARIS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SINVENTARIS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('assets/AdminLTE-3.2.0/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Naufal Aulia Pratama</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>" class="nav-link <?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('barang'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'barang') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-box"></i>
            <p>Barang</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('kategori'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'kategori') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>Kategori Barang</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('peminjaman'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'peminjaman') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>Peminjaman</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('pengembalian'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'pengembalian') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>Pengembalian</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
