<aside class="main-sidebar elevation-4 sidebar-light-primary">
  <!-- Brand Logo -->
  <a href="<?= base_url('') ?>/index3.html" class="brand-link text-sm bg-primary">
    🏫
    <span class="brand-text font-weight-light">SDN Bontoramba</span>
  </a>

  <!-- Sidebar -->
  <div
    class="sidebar os-host os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-theme-dark">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <i class="fas fa-user-alt"></i>
      </div>
      <div class="info">
        <span class="d-block">
          <?= $_SESSION['nama_wali']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?= base_url('WaliPanel'); ?>" class="nav-link">
            <i class="nav-icon fas fa-square-root-alt"></i>
            <p>Hitung</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('WaliPanel'); ?>" class="nav-link">
            <i class="nav-icon fas fa-square-root-alt"></i>
            <p>Tambah Data Uji</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>