<?php

$request = \Config\Services::request();
$segment = $request->uri->getSegment(1);
$segment2 = $request->uri->getSegment(2);

$data_user = getProfile();


?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url(); ?>/dashboard" class="brand-link">
    <img src="<?= base_url(); ?>public/assets/dist/img/siakes.png" alt="SIAKES Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text text-white">SIAKES</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url(); ?>public/assets/uploads/users/<?= $data_user['image']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-capitalize"><?= $data_user['username']; ?> - <?= $data_user['title']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item ">
          <a href="<?= base_url(); ?>dashboard" class="nav-link <?= ($segment == 'dashboard') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if (session()->get('role_id') == 1 || session()->get('role_id') == 2) : ?>

          <li class="nav-item">
            <a href="<?= base_url('transaksi'); ?>" class="nav-link <?= ($segment == 'transaksi') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('pembayaran'); ?>" class="nav-link <?= ($segment == 'pembayaran') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Pembayaran
              </p>
            </a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a href="<?= base_url('rekap_keuangan'); ?>" class="nav-link <?= ($segment == 'rekap_keuangan') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-scroll"></i>
            <p>
              Rekap Keuangan
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('laporan_keuangan'); ?>" class="nav-link <?= ($segment == 'laporan_keuangan') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Laporan Keuangan
            </p>
          </a>
        </li>

        <li class="nav-item  <?= ($segment == 'users' || $segment == 'guru' || $segment == 'siswa') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Kelola Data
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php if (session()->get('role_id') == 1) : ?>

              <li class="nav-item">
                <a href="<?= base_url('users'); ?>" class="nav-link <?= ($segment == 'users') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Kelola Akun Users
                  </p>
                </a>
              </li>

            <?php endif; ?>
            <li class="nav-item">
              <a href="<?= base_url('guru'); ?>" class="nav-link <?= ($segment == 'guru') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Kelola Guru
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('siswa'); ?>" class="nav-link <?= ($segment == 'siswa') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Kelola Siswa
                </p>
              </a>
            </li>
          </ul>
        </li>

        <?php if (session()->get('role_id') == 1 || session()->get('role_id') == 2) : ?>
          <li class="nav-item  <?= ($segment == 'master_kategori' || $segment == 'transaksi_kategori_sub' || $segment == 'transaksi_item') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pengaturan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if (session()->get('role_id') == 1) : ?>

                <li class="nav-item">
                  <a href="<?= base_url('master_kategori'); ?>" class="nav-link <?= ($segment == 'master_kategori') ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Kategori Master
                    </p>
                  </a>
                </li>

              <?php endif; ?>
              <li class="nav-item">
                <a href="<?= base_url('transaksi_kategori_sub'); ?>" class="nav-link <?= ($segment == 'transaksi_kategori_sub') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Kategori Transaksi
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('transaksi_item'); ?>" class="nav-link <?= ($segment == 'transaksi_item') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Item Transaksi
                  </p>
                </a>
              </li>
            </ul>
          </li>

        <?php endif; ?>

        <li class="nav-item  <?= ($segment == 'profile' || $segment == 'change-password') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Akun Saya
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('profile'); ?>" class="nav-link <?= ($segment == 'profile') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Edit Profil
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('change-password'); ?>" class="nav-link <?= ($segment == 'change-password') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Ganti Password
                </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url(); ?>auth/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>