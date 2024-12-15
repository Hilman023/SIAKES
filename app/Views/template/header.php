<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?> - SIAKES</title>

  <link rel="icon" type="image/x-png" href="<?= base_url(); ?>public/assets/dist/img/siakes.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/dist/css/adminlte.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <?= $this->renderSection('head'); ?>

  <style>
    :root {
      --primary-color: #003FF9;
      --primary-color-hover: rgba(0, 62, 249, 0.83);
      --secondary-color: #FEEFE6;
    }

    .sidebar-dark-primary {
      background-color: var(--primary-color);
    }

    [class*=sidebar-dark-] .sidebar a {
      color: #fff;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
    .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
      background-color: #fff;
      color: var(--primary-color);
    }

    .card-header {
      background-color: var(--primary-color);
      color: #fff;
    }

    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
      color: #fff;
    }

    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active,
    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus,
    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
      /* background-color: rgba(255, 255, 255, .9); */
      color: var(--primary-color);
    }


    .btn-primary,
    .bg-primary {
      background-color: var(--primary-color);
    }

    .text-primary {
      color: var(--primary-color);
    }
  </style>
</head>