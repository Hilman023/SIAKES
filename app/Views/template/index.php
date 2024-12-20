<?= $this->include('template/header'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <?= $this->include('template/topbar'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->include('template/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <?= $this->renderSection('content'); ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <span>Sistem Informasi Administrasi Keuangan Sekolah SMK Nurul Gina Abidin <span class="text-primary font-weight-bold">SIAKES</span> | Copyright © <?= copyright('2024'); ?>. All rights reserved </span>
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <?= $this->include('template/footer'); ?>
</body>

</html>